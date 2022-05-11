<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends MY_Controller {
    
    function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('member_model');
        $this->load->model('package_model');
    }
    
    function success($pkg_id){
        $this->isMemLogged($this->session->mem_type, true, false, array('owner', 'sitter'), false);
        $pkg_id = intval($pkg_id);
        
        if ($pkg_row = $this->package_model->get_row_where(array('id' => $pkg_id, 'type' => $this->session->mem_type))) {

            $pkg_expiry_date = $this->session->paypal_pkg_type=='monthly'?date('Y-m-d', (time()+86400*30)):date('Y-m-d', (time()+86400*365));
            $data = array('mem_package_id' => $pkg_id, 'mem_pkg_type' => $this->session->paypal_pkg_type, 'mem_pkg_expiry_date' => $pkg_expiry_date, 'mem_pkg_status' => 0);

            if ($this->session->mem_type=='sitter') {
                setMsg('success','Your application has been saved successfully!');
                $data['mem_sitter_application'] = 1;
            }
            else
                setMsg('success','You purchased membership successfully!');

            $this->member_model->save($data, $this->session->mem_id);
            $this->session->unset_userdata('paypal_pkg_type');

            redirect('dashboard',"");
            exit;
        }
        else
            show_404();
    }
    
    function notify(){
        
        $raw_post_data = file_get_contents('php://input');
        // pr($raw_post_data );
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
             $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        $req = 'cmd=_notify-validate';
        
        if (function_exists('get_magic_quotes_gpc')) {
                $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }
        if(!empty($this->data['site_settings']->site_paypal_sandox)):
            $ppurl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        else:
            $ppurl = 'https://www.paypal.com/cgi-bin/webscr';
        endif;
        $ch = curl_init($ppurl);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        if ( !($res = curl_exec($ch)) ) {
            error_log("Got " . curl_error($ch) . " when processing IPN data");
            curl_close($ch);
            exit;
        }
        curl_close($ch);
        $resArray = $_POST;
        if (strcmp ($res, "VERIFIED") == 0)
        {
            $filename = 'package-paid-('.date('Y-m-d-His').')';
            $resArray['Status'] = 'VERIFIED';
            $custom = $resArray['custom'];
            $txn_id = $resArray['txn_id'];

            if ($mem_row = $this->member_model->get_row($custom)) {
                $pkg_row = $this->package_model->get_row($mem_row->mem_package_id);

                $price = 0;
                if ($pkg_row->price>0)
                    $price = $pkg_row->price;
                else
                    $price = $pkg_row->{$mem_row->mem_pkg_type.'_price'};
                if ($pkg_row->device_price>0)
                    $price += $pkg_row->device_price;

                $data = array('mem_pkg_status' => 1);
                if (empty($pkg_row->one_time))
                    $data['mem_membership_auto'] = 1;
                if ($pkg_row->type=='sitter' && !empty($pkg_row->membership))
                    $data['mem_membership_pref'] = 1;
                $this->member_model->save($data, $this->session->mem_id);

                $this->load->model('transaction_model');
                $trx_id=$this->transaction_model->save_trx($mem_row->mem_id, $price, $txn_id, null, $pkg_row->title.' membership package', 1);
            }

            // if ($this->donation_email($custom)) {
            //     $row= $this->master->getRow('donations',array('id'=>$custom));
            //     $this->master->save('donations',array('payment_status'=>'1'),'id',$custom);
            //     $project = get_project($row->proj_id);
            //     $donations = project_donations($row->proj_id);
            //     if($project->total_capital == $donations->total_donations){
            //                 $this->finished_donation_email($vals['proj_id']);
            //                 $this->master->save('projects',array('proj_status'=>'0'),'id',$vals['proj_id']);
            //     }
            // }
        }
        else if (strcmp ($res, "INVALID") == 0)
        {
            $filename = 'INVALID ('.date('Y-m-d-His').')';
            $resArray['Status'] = 'INVALID';
        }
        $content = '';
        foreach($resArray as $key => $val):
            $content .= "\r\n";
            $content .= $key." = ".$val;
        endforeach;
        $filecontent = $content;
        $fp = fopen('./assets/paypal/'.$filename.".txt","w");
        fwrite($fp,$filecontent);
        fclose($fp);
    }
    
    function cancel($pkg_id) {
        $this->session->unset_userdata('paypal_pkg_type');
        redirect("pay-package/".$pkg_id,'refresh');
        exit;
    }

    function pay_now($pkg_id){
        $this->isMemLogged($this->session->mem_type, true, false, array('owner', 'sitter'), false);
        $pkg_id = intval($pkg_id);
        if ($pkg_row = $this->package_model->get_row_where(array('id' => $pkg_id, 'type' => $this->session->mem_type))) {
            $post['pkg_type'] = $this->input->post('pkg_type');
            if (!in_array($post['pkg_type'], array('monthly', 'yearly'))) {
                setMsg("error", "Something went wrong!");
                redirect('pay-package/'.$pkg_id);
                exit;
            }

            $price = 0;
            if ($pkg_row->price>0)
                $price = $pkg_row->price;
            if (empty($pkg_row->one_time))
                $price += $pkg_row->{$post['pkg_type'].'_price'};
            if ($pkg_row->device_price>0)
                $price += $pkg_row->device_price;

            $this->session->set_userdata('paypal_pkg_type', $post['pkg_type']);

            $this->data['post'] = array(
                "item_name" => $pkg_row->title,
                "currency" => "USD",
                "amount" => $price,
                "custom" => $this->session->mem_id
            );

            $this->data['setting'] = array(
                "website_name" => $this->data['site_settings']->site_name,
                "url" => site_url(),
                "notify_url" =>site_url("notify"),
                "return_url" => site_url("success/".$pkg_id),
                "cancel_url" => site_url("cancel/".$pkg_id),
                "sandbox" => !empty($this->data['site_settings']->site_paypal_sandox),
                "sandbox_paypal" => $this->data['site_settings']->site_sandbox_paypal,
                "live_paypal" => $this->data['site_settings']->site_live_paypal
            );
            $this->load->view("includes/processing", $this->data);
        }
        else
            show_404();

    }
}