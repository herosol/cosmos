<?php

class Index extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
    }

    function index()
    {
        $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'home'));
        $this->data['site_content'] = unserialize($this->data['site_content']->code);
        
        $this->load->model('character_model');
        $this->data['characters'] = $this->character_model->get_rows();

        $this->data['players'] = $this->member_model->get_rows(array('mem_type' => 'player', 'mem_featured' => 1, 'mem_verified' => 1, 'mem_status' => 1, 'mem_player_verified' => 1), '', 10);

        // $this->data['testimonials'] = $this->master->getRows('testimonials', array('type' => 'buyer'));
        $this->data['cities'] = $this->master->getRows('cities');
        $this->load->view("pages/index", $this->data);
    }

    function login()
    {
        $this->MemLogged();
        if($this->input->post()) {
            $res = array();
            $res['frm_reset'] = 0;
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['redirect_url'] = 0;
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $data = $this->input->post();

                $row = $this->member_model->authenticate($data['email'], $data['password']);
                if (count($row) > 0) {
                    if($row->mem_status== 0){
                        $res['msg'] = showMsg('error', 'Your account has been blocked!');
                        exit(json_encode($res));
                    }

                    /*if($row->mem_verified== 0){
                        $res['msg'] = showMsg('error', 'Please verify email to access your account!');
                        exit(json_encode($res));
                    }
                    */
                    $remember_token = '';
                    if(isset($data['remeberMe'])){
                        $remember_token = doEncode('member-'.$row->mem_id);
                        $cookie= array('name'   => 'remember', 'value'  => $remember_token, 'expire' => (86400*7));
                        $this->input->set_cookie($cookie);
                    }

                    $this->member_model->update_last_login($row->mem_id, $remember_token);
                    $this->session->set_userdata('mem_id', $row->mem_id);
                    $this->session->set_userdata('mem_type', $row->mem_type);

                    // $url = $this->session->mem_type == 'buyer' ? 'account-settings' : 'dashboard';
                    
                    if ($row->mem_verified == 0)
                        $url = site_url('email-verification');
                    elseif ($row->mem_phone_verified == 0)
                        $url = site_url('phone-verification');
                    elseif (!empty($this->session->redirect_url)){
                        $url = $this->session->redirect_url;
                        $this->session->unset_userdata('redirect_url');
                    }
                    else
                        $url = site_url('dashboard');

                    $res['redirect_url'] = $url;

                    $res['msg'] = showMsg('success', 'Login successful! Please wait.');

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Invalid email or password');
                }
            }
            exit(json_encode($res));
        }else{
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'login'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/login", $this->data);
         }
    }

    function register($ref_code = '')
    {
        $this->MemLogged();
        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['frm_reset'] = 0;
            $res['status'] = 0;

            $this->form_validation->set_rules('fname', 'First Name', 'required');
            $this->form_validation->set_rules('lname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('zip', 'Zip Code', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required|integer');
            $this->form_validation->set_rules('hear_about', 'How did you hear from us?', 'required');
            if ($this->input->post('hear_about') == 'Other')
                $this->form_validation->set_rules('other_reason', 'Specify other reason', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('confirm', 'Confirm', 'required', array('required' => 'Please accept our terms and conditions'));
            if($this->form_validation->run() === FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $post = html_escape($this->input->post());
                $mem_row = $this->member_model->emailExists($post['email']);
                if (count($mem_row) == '0')
                {
                    if($this->member_model->phoneExists($post['phone'])){
                        $res['msg'] = showMsg('error', 'Phone Already In Use!');
                        exit(json_encode($res));
                    }

                    $rando = doEncode(rand(99, 999).'-'.$post['email']);
                    $rando = strlen($rando) > 225 ? substr($rando, 0, 225) : $rando;

                    $mem_referral_code = randCode(6);
                    while ( true) {
                        if (!$this->member_model->get_row($mem_referral_code, 'mem_referral_code'))
                            break;
                        $mem_referral_code = randCode(6);
                    }
                    $hear_about = $post['hear_about'] == 'Other' ? $post['other_reason'] : $post['hear_about'];
                    $save_data = array('mem_fname' => ucfirst($post['fname']), 'mem_lname' => ucfirst($post['lname']), 'mem_email' => $post['email']/*, 'mem_phone' => $post['phone']*/, 'mem_pswd' => doEncode($post['password']), 'mem_code' => $rando, 'mem_type' => 'buyer', 'mem_hear_about' => $hear_about, 'mem_zip' => $post['zip'], 'mem_country_id' => intval($post['country']), 'mem_status' => 1, 'mem_last_login' => date('Y-m-d h:i:s'), 'mem_referral_code' => $mem_referral_code);

                    

                    if(!empty($post['zip'])) {
                        $coordinates = get_location_detail($post['zip']);
                        $save_data['mem_map_lat'] = $coordinates->Latitude;
                        $save_data['mem_map_lng'] = $coordinates->Longitude;
                    }

                    $this->load->library('my_stripe');
                    $save_data['mem_stripe_id'] = $this->my_stripe->save_customer(array('name' => ucfirst($post['fname']).' '.ucfirst($post['lname']), 'email' => $post['email'], 'phone' => $post['phone'], "description" => $this->data['site_settings']->site_name." Customer ".ucfirst($post['fname']).' '.ucfirst($post['lname'])));

                    $mem_id = $this->member_model->save($save_data);
                    $this->session->set_userdata('mem_id', $mem_id);
                    $this->session->set_userdata('mem_type', 'buyer');

                    if($ref_row = $this->member_model->get_row($ref_code,'mem_referral_code')){

                        $ref_signup_data = array('mem_id' => $ref_row->mem_id, 'ref_mem_id' => $this->session->mem_id, 'reward' => 0);
                        $this->master->save("ref_signups", $ref_signup_data);

                        $txt = "Your friend ".ucfirst($post['fname'])." ".ucfirst($post['lname'])." signed up with your referral link. You will be rewarded after they complete their first booking";
                        save_notificaiton($ref_row->mem_id, $this->session->mem_id, $txt);
                    }

                    $res['msg'] = showMsg('success', getSiteText('alert', 'registration'));

                    $verify_link = site_url('verification/' .$rando);
                    $mem_data = array('name' => ucfirst($post['fname']).' '.ucfirst($post['lname']), "email" => $post['email'], "link" => $verify_link);
                    $this->send_site_email($mem_data, 'signup');

                    // $this->send_signup_email($mem_id);

                    $res['redirect_url'] = site_url('email-verification');
                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'E-mail Address Already In Use!');
                }
            }
            exit(json_encode($res));
        }else{
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'signup'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/register", $this->data);
        }
    }

    function player_register($ref_code = '')
    {
        $this->MemLogged();
        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['frm_reset'] = 0;
            $res['status'] = 0;

            $this->form_validation->set_rules('nickname', 'Nickname', 'required|alpha');
            $this->form_validation->set_rules('fname', 'First Name', 'alpha');
            $this->form_validation->set_rules('lname', 'Last Name', 'alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('zip', 'Zip Code', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required|integer');
            $this->form_validation->set_rules('hear_about', 'How did you hear from us?', 'required');
            if ($this->input->post('hear_about') == 'Other')
                $this->form_validation->set_rules('other_reason', 'Specify other reason', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('confirm', 'Confirm', 'required', array('required' => 'Please accept our terms and conditions'));
                $post = html_escape($this->input->post());
                if(!empty($post['country']) && !$this->master->getRow('countries', array('id' => intval($post['country'])))) {
                    $res['msg'] = showMsg('error', 'Please select a valid Country!');
                    exit(json_encode($res));
                }
                $mem_row = $this->member_model->emailExists($post['email']);
                if (count($mem_row) == '0')
                {
                    if($this->member_model->phoneExists($post['phone'])){
                        $res['msg'] = showMsg('error', 'Phone Already In Use!');
                        exit(json_encode($res));
                    }
                    $rando = doEncode(rand(99,999).'-'.$post['email']);
                    $rando = strlen($rando)>225?substr($rando, 0, 225):$rando;

                    $mem_referral_code = randCode(6);
                    while ( true) {
                        if (!$this->member_model->get_row($mem_referral_code, 'mem_referral_code'))
                            break;
                        $mem_referral_code = randCode(6);
                    }
                    
                    $hear_about = $post['hear_about'] == 'Other' ? $post['other_reason'] : $post['hear_about'];
                    $arr = array('mem_profile_heading' => $post['nickname'], 'mem_fname' => ucfirst($post['fname']), 'mem_lname' => ucfirst($post['lname']), 'mem_email' => $post['email']/*, 'mem_phone' => $post['phone']*/, 'mem_pswd' => doEncode($post['password']), 'mem_code' => $rando, 'mem_type' => 'player', 'mem_hear_about' => $hear_about, 'mem_zip' => $post['zip'], 'mem_country_id' => intval($post['country']), 'mem_status' => 1, 'mem_last_login' => date('Y-m-d h:i:s'), 'mem_referral_code' => $mem_referral_code);
                    if(!empty($post['zip'])) {
                        $coordinates = get_location_detail($post['zip']);
                        $arr['mem_map_lat'] = $coordinates->Latitude;
                        $arr['mem_map_lng'] = $coordinates->Longitude;
                    }

                    $this->load->library('my_stripe');
                    $arr['mem_stripe_id'] = $this->my_stripe->save_customer(array('name' => ucfirst($post['fname']).' '.ucfirst($post['lname']), 'email' => $post['email'], 'phone' => $post['phone'], "description" => $this->data['site_settings']->site_name." Customer ".ucfirst($post['fname']).' '.ucfirst($post['lname'])));

                    $mem_id = $this->member_model->save($arr);
                    $this->session->set_userdata('mem_id', $mem_id);
                    $this->session->set_userdata('mem_type', 'player');

                    if($ref_row = $this->member_model->get_row($ref_code, 'mem_referral_code')){

                        $ref_signup_data = array('mem_id' => $ref_row->mem_id, 'ref_mem_id' => $this->session->mem_id, 'reward' => 0);
                        $this->master->save("ref_signups", $ref_signup_data);

                        $txt="Your friend ".ucfirst($post['fname'])." ".ucfirst($post['lname'])." signed up with your referral link. You will be rewarded after they complete their first lesson";
                        save_notificaiton($ref_row->mem_id, $this->session->mem_id, $txt);
                    }

                    $res['msg'] = showMsg('success', getSiteText('alert', 'registration'));

                    $verify_link = site_url('verification/' .$rando);
                    $mem_data = array('name' => ucfirst($post['fname']).' '.ucfirst($post['lname']), "email" => $post['email'], "link" => $verify_link);
                    $this->send_site_email($mem_data, 'signup');

                    // $this->send_signup_email($mem_id);

                    $res['redirect_url'] = site_url('email-verification');
                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'E-mail Address Already In Use!');
                }
            exit(json_encode($res));
        } else {
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'player_signup'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/register-player", $this->data);
        }
    }

    function pay_package($id = 0)
    {
        $this->isMemLogged($this->session->mem_type, true, false, array('buyer', 'player'), false);
        /*
        if($this->data['mem_data']->mem_player_application>0){
            redirect('dashboard');
            exit;
        }
        */
        $id = intval($id);
        $this->load->model('package_model');
        $this->load->model('payment_methods_model');
        if ($this->data['pkg_row'] = $this->package_model->get_row_where(array('id' => $id, 'type' => $this->session->mem_type))) {
            $this->load->library('my_stripe');
            if ($this->input->post()) {
                $res = array();
                $res['hide_msg'] = 0;
                $res['scroll_to_msg'] = 1;
                $res['status'] = 0;
                $res['frm_reset'] = 0;
                $res['redirect_url'] = 0;
                $post = html_escape($this->input->post());
                if (empty($this->data['pkg_row']->one_time))
                    $this->form_validation->set_rules('pkg_type', 'Type', 'required|in_list[monthly,yearly]', array('required' => "Something went wrong!", 'in_list' => "Something went wrong!"));
                $this->form_validation->set_rules('nonce', 'Nonce', 'required', array('required' => "Something went wrong!"));
                $this->form_validation->set_rules('confirm', 'Confirm', 'required', array('required' => 'Please accept our terms and conditions'));

                if($this->form_validation->run() === FALSE)
                {
                    $res['msg'] = validation_errors();
                }else{

                    $price = 0;
                    if ($this->data['pkg_row']->price>0)
                        $price = $this->data['pkg_row']->price;
                    /*if (empty($pkg_row->one_time))
                        $price += $this->data['pkg_row']->{$post['pkg_type'].'_price'};*/
                    if ($this->data['pkg_row']->device_price>0)
                        $price += $this->data['pkg_row']->device_price;

                    $data = array('mem_package_id' => $id, 'mem_pkg_type' => NULL, 'mem_pkg_expiry_date' => NULL, 'mem_pkg_status' => 1, 'mem_membership_pref' => 0, 'mem_membership_auto' => 0);
                    if (empty($this->data['pkg_row']->one_time)){
                        $data['mem_membership_auto'] = 1;
                        $data['mem_pkg_type'] = $post['pkg_type'];
                        $data['mem_pkg_expiry_date'] = $post['pkg_type']=='monthly'?date('Y-m-d', (time()+86400*30)):date('Y-m-d', (time()+86400*365));
                    }
                    if ($this->data['pkg_row']->type=='player' && !empty($this->data['pkg_row']->membership))
                        $data['mem_membership_pref'] = 1;

                    // $data['mem_stripe_id'] = $this->my_stripe->save_customer(array('name' => ucfirst($this->data['mem_data']->mem_fname).' '.ucfirst($this->data['mem_data']->mem_lname), 'email' => $this->data['mem_data']->mem_email, 'phone' => $this->data['mem_data']->mem_phone, "description" => $this->data['site_settings']->site_name." Customer ".ucfirst($this->data['mem_data']->mem_fname).' '.ucfirst($this->data['mem_data']->mem_lname)));

                    if(!$payment_method = $this->my_stripe->create_payment_method($this->data['mem_data']->mem_stripe_id, $this->input->post('nonce'))){
                        $res['msg'] = showMsg("error", "Something went wrong, Please try again latter!");
                        exit(json_encode($res));
                    }

                    $last_digits = $payment_method->last4;
                    $method_token = $payment_method->id;
                    $expiry = get_month_name($payment_method->exp_month).', '.$payment_method->exp_year;
                    $image = str_replace(' ', '-', strtolower($payment_method->brand)).'.png';

                    $save_data = array('mem_id' => $this->session->mem_id, 'last_digits' => $last_digits, 'expiry' => $expiry, 'method_token' => $method_token, 'image' => $image, 'default_method' =>1);

                    if($this->payment_methods_model->get_default_method()){
                        $this->my_stripe->make_defualt_payment_method($this->data['mem_data']->mem_stripe_id, $method_token);
                        $this->payment_methods_model->save(array('default_method' => 0),$this->session->mem_id, 'mem_id');
                    }
                    $id = $this->payment_methods_model->save($save_data);
                    $this->payment_methods_model->save(array('encoded_id' => doEncode('pm-'.$id)), $id);

                    $subscription_id = $this->my_stripe->subscrib_customer($this->data['mem_data']->mem_stripe_id, $this->data['pkg_row']->{$post['pkg_type'].'_subscription_id'});
                    if(empty($subscription_id)){
                        $res['msg'] =showMsg('error', 'Something went worng, Please try again later!');
                        exit(json_encode($res));
                    }
                    $data['mem_subscription_id'] = $subscription_id;

                    $charge_id = $this->my_stripe->charge($this->data['mem_data']->mem_stripe_id, $method_token, $price, "Stripe Charge for ".$this->data['mem_data']->mem_email);
                    if(empty($charge_id)){
                        $res['msg'] =showMsg('error', 'Something went worng, Please try again later!');
                        exit(json_encode($res));
                    }

                    $this->load->model('transaction_model');
                    $trx_id=$this->transaction_model->save_trx($this->session->mem_id, ($price+$this->data['pkg_row']->{$post['pkg_type'].'_price'}), $charge_id, null, $this->data['pkg_row']->title.' membership package', 1);
                    
                    if ($this->session->mem_type=='player') {
                        $res['msg'] = showMsg('success','Your application has been saved successfully!');
                        $data['mem_player_application'] = 1;
                        // $this->member_model->save(array('mem_player_application' => 1),$this->session->mem_id);
                    }
                    else
                        $res['msg'] = showMsg('success','You purchased membership successfully!');

                    $this->member_model->save($data, $this->session->mem_id);
                    
                    $res['redirect_url'] = site_url('dashboard');
                    $res['status'] = 1;
                    $res['hide_msg'] = 1;
                }
                exit(json_encode($res));
            }
            else{
                // $this->member_model->save(array('mem_package_id' => $id),$this->session->mem_id);
                $this->load->view("account/credit-card", $this->data);
            }
        }
        else
            show_404();
    }

    function become_player()
    {
        $this->isMemLogged('player', true, false);
        $this->load->model('character_model');
        if($this->data['mem_data']->mem_player_application > 0 ) {
            redirect('dashboard');
            exit;
        }

        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $res['msg'] = '';

            $post = html_escape($this->input->post());

            $this->form_validation->set_message('integer', 'Please select a valid {field}');
            $this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('profile_heading', 'Profile Nickname', 'required');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
            $this->form_validation->set_rules('rate', 'Rate', 'required|numeric', array('numeric' => '{field} should be numeric'));
            
            /*
                $this->form_validation->set_rules('ssn', 'Social Security Number', 'required');
                $this->form_validation->set_rules('dln', 'Driver’s License Number', 'required');
                $this->form_validation->set_rules('travel_radius', 'Maximum travel distance', 'required|numeric');
                $this->form_validation->set_rules('state', 'State', 'required', array('required' => 'Please select a {field}'));
            */

            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('city', 'City or State', 'required');
            $this->form_validation->set_rules('zip', 'Zip Code', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required|integer');
            $this->form_validation->set_rules('availability[]', 'Areas of Availability', 'required');
            $this->form_validation->set_rules('profile_bio', 'Profile Bio', 'required');
            $this->form_validation->set_rules('fb_link', 'Facebook', 'valid_url');
            $this->form_validation->set_rules('instagram_link', 'Instagram', 'valid_url');
            
            $this->form_validation->set_rules('characters[]', 'Characters', 'required|integer');
                    
            $this->form_validation->set_rules('images[]', 'Image', 'required', array('required' => 'Please Select at-least one {field}'));

            if($this->form_validation->run() === FALSE)
                $res['msg'] = validation_errors();
                    
            if(!empty($post['country']) && !$this->master->getRow('countries', array('id' => intval($post['country']))))
                $res['msg'] .= showMsg('error', 'Please select a valid Country!');
            if (!empty($post['email']) && $this->member_model->emailExists($post['email'], $this->session->mem_id))
                $res['msg'] .= showMsg('error', 'Email already in use, Please try another!');

            if (!empty($res['msg']))
                exit(json_encode($res));

            foreach ($post['characters'] as $key => $character) {
                if(!$char_row = $this->character_model->get_row($character)) {
                    $res['msg'] = showMsg('error', 'Please select a valid character!');
                    exit(json_encode($res));
                }

                if (count($post['images'][$character]) < 1 || $post['images'][$character][0] == '') {
                    $res['msg'] = showMsg('error', 'Please upload images for '.$char_row->title);
                    exit(json_encode($res));
                }
            }

            $characters = @implode(',', $post['characters']);
            $availability = @implode(',', $post['availability']);
                
            $data = array('mem_fname' => ucfirst($post['fname']), 'mem_lname' => ucfirst($post['lname'])/*, 'mem_email' => $post['email']*/, 'mem_profile_heading' => ucfirst($post['profile_heading']), 'mem_dob' => db_format_date($post['dob']), 'mem_rate' => floatval($post['rate']), 'mem_address1' => $post['address'], 'mem_city' => $post['city'], 'mem_zip' => $post['zip'], 'mem_country_id' => intval($post['country']), 'mem_about' => $this->input->post('profile_bio'), 'mem_characters' => $characters, 'mem_availability' => $availability, 'mem_player_application' => 1, 'mem_fb_link' => $post['fb_link'], 'mem_instagram_link' => $post['instagram_link']);

            if(!empty($post['zip']) && $this->data['mem_data']->mem_zip != $post['zip']) {
                $coordinates = get_location_detail($post['zip']);
                $data['mem_map_lat'] = $coordinates->Latitude;
                $data['mem_map_lng'] = $coordinates->Longitude;
            }

            /*
            if(!empty($post['email']) && $this->data['mem_data']->mem_email != $post['email']){
                $rando = doEncode($this->session->mem_id.'-'.$post['email']).rand(99, 999);
                $data['mem_code'] = $rando;
                $data['mem_verified'] = 0;

                $verify_link = site_url('verification/' .$rando);

                $mem_data = array('name' => ucwords($post['fname'].' '.$post['lname']), "email" => $post['email'], "link" => $verify_link);
                $this->send_site_email($mem_data, 'change_email');
                setMsg('info',getSiteText('alert', 'verify_email'));
                $res['redirect_url'] = site_url('email-verification');
            }
            if ($this->member_model->phoneExists($post['phone'], $this->session->mem_id)) {
                $res['msg'] = showMsg('error', 'Phone already in use, Please try another!');
                exit(json_encode($res));
            }
            if (empty($this->data['mem_data']->mem_phone_verified)){
                $res['msg'] = showMsg('error', 'Please verify your Phone!');
                exit(json_encode($res));
            }
            */
            foreach ($post['characters'] as $key => $character) {
                $images = $this->master->getRows('gallery', array('ref_id' => $character, 'ref_type' => 'character', 'mem_id' => $this->session->mem_id));
                foreach ($images as $key => $img) {
                    if(!in_array($img->image, $post['images'][$character])) {
                        $this->master->delete('gallery', 'id' , $img->id);
                        remove_vfile($img->image);
                        continue;
                    }
                    if ($key==0)
                        $this->master->save('gallery', array('main' => 1), 'id', $img->id);
                }
            }

            /*$new_images = $this->master->getRows('gallery', array('ref_id' => null, 'ref_type' => 'character'));
            $mem_images = $this->master->getRows('gallery', array('ref_id' => $this->session->mem_id, 'ref_type' => 'character'));
            if (count($post['images']) < 1 || $post['images'][0] == '' || count($mem_images) < 1) {
                $res['msg'] = showMsg('error', 'Please select images!');
                exit(json_encode($res));
            }
            foreach ($new_images as $key => $img) {
                if(in_array($img->image, $post['images']))
                    $this->master->save('gallery', array('ref_id' => $this->session->mem_id), 'id', $img->id);
            }
            foreach ($mem_images as $key => $img) {
                if(!in_array($img->image, $post['images'])) {
                    $this->master->delete('gallery', 'id' , $img->id);
                    remove_vfile($img->image);
                }
            }*/
            
            /*
            $new_images = $this->master->getRows('gallery', array('ref_id' => null, 'ref_type' => 'member'));
            foreach ($new_images as $key => $img) {
                if(in_array($img->image, $post['images'])){
                    $image_data = array('ref_id' => $this->session->mem_id);
                    $this->master->save('gallery', $image_data, 'id', $img->id);
                }
            }
            $image_rows = $this->master->getRows('gallery', array('ref_id' => $this->session->mem_id, 'ref_type' => 'member'));

            if (count($post['images'])<1 || $post['images'][0] =='' || count($image_rows)<1) {
                $res['msg'] = showMsg('error', 'Please select images!');
                exit(json_encode($res));
            }
            foreach ($image_rows as $key => $img) {
                if(!in_array($img->image, $post['images'])) {
                    $this->master->delete('gallery', 'id' , $img->id);
                    remove_vfile($img->image);
                }
            }
            */

            /*

            if ($_FILES['image']['name'] != "") {
                $image = upload_vfile('image');
                if (!empty($image['file_name'])) 
                    $data['mem_image'] =$image['file_name'];
            }

            if($this->data['mem_data']->mem_email!=$post['email']){
                $rando=doEncode($this->session->mem_id.'-'.$post['email']);
                $data['mem_code'] = $rando;
                $data['mem_verified'] = 0;

                $verify_link = site_url('verification/' .$rando);

                $mem_data = array('name'=>ucwords($post['fname'].' '.$post['lname']),"email"=>$post['email'],"link"=>$verify_link);
                $this->send_site_email($mem_data,'change_email');
                setMsg('info',getSiteText('alert','verify_email'));
            }*/

            $this->member_model->save($data, $this->session->mem_id);

            $res['redirect_url'] = site_url('dashboard');
            $res['msg'] = showMsg('success','Your became a player application sent successfully. Wait for Approval');
            $res['status'] = 1;
            $res['hide_msg'] = 0;
            exit(json_encode($res));
        } else {
            $this->data['characters'] = $this->character_model->get_rows();
            // $this->data['mem_data']->images = $this->master->getRows('gallery', array('ref_id' => $this->session->mem_id, 'ref_type' => 'character'));
            $this->load->view("player/become-player", $this->data);
        }
    }

    function become_pet_player()
    {
        $this->MemLogged();
        $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'become_cosplayer'));
        $this->data['site_content'] = unserialize($this->data['site_content']->code);

        $this->data['testimonials'] = $this->master->getRows('testimonials', array('type' => 'player'));
        $this->load->view("player/become-cosplayer", $this->data);
    }

    function logout()
    {
        $this->session->unset_userdata('mem_id');
        $this->session->unset_userdata('mem_type');
        $this->session->unset_userdata('redirect_url');
        $this->load->helper('cookie');
        delete_cookie('remember');
        redirect('login', 'refresh');
        exit;
    }

    function forgot()
    {
        $this->MemLogged();
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
                $res['status'] = 0;
            } else {
                $post = $this->input->post();
                if ($mem = $this->member_model->forgotEmailExists($post['email'])) {
                    // $settings = $this->data['site_settings'];
                    $rando=doEncode(randCode(rand(15, 20)));
                    $this->master->save('members', array('mem_code' => $rando), 'mem_id', $mem->mem_id);

                    $reset_link = site_url('reset/' . $rando);
                    $mem_data = array('name' => $mem->mem_fname.' '.$mem->mem_lname, "email" => $mem->mem_email, "link" => $reset_link);
                    $this->send_site_email($mem_data, 'forgot_password');

                    /*$reset_link = site_url('reset/' . $rando);
                    $msg_body = "
                    <h4 style='text-align:left;padding:0px 20px;margin-bottom:0px;'>Dear " . $mem->mem_fname . ' ' . $mem->mem_lname . ",</h4>
                    <p style='text-align:left;padding:5px 20px;'>" . getSiteText('email', 'forgot_password') . "</p>
                    <p style='text-align:left;padding:5px 20px;'><a href='$reset_link'>$reset_link</a></p>";

                    $emailto = $mem->mem_email;
                    $subject = $settings->site_name." - ".getSiteText('email', 'forgot_password','subject');
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html;charset=utf-8\r\n";
                    $headers .= "From: " . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";
                    $headers .= "Reply-To: '" . $settings->site_name . " <" . $settings->site_email . ">" . "\r\n";

                    $this->data['email_body'] = $msg_body;
                    $this->data['email_subject'] = $subject;
                    $ebody = $this->load->view('includes/email_template', $this->data, TRUE);
                    @mail($emailto, $subject, $ebody, $headers);*/

                    $res['msg'] = showMsg('success','We’ve sent a reset password link to the email address you entered to reset your password. If you don’t see the email, check your spam folder or email!');


                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'No such email address exists. Please try again!');
                    $res['status'] = 0;
                }
            }
            exit(json_encode($res));
        } else {
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'forgot'));
            $this->data['site_content'] = unserialize($this->data['site_content']->code);
            $this->load->view("account/forgot-password", $this->data);
        }
    }

    function reset_password()
    {
        $reset_id = intval($this->session->userdata('reset_id'));
        if ($row = $this->member_model->getMember($reset_id)) {
            if ($this->input->post()) {
                $res = array();
                $res['hide_msg'] = 0;
                $res['scroll_to_msg'] = 0;
                $res['status'] = 0;
                $res['frm_reset'] = 0;
                $res['redirect_url'] = 0;

                $reset_id = intval($this->session->userdata('reset_id'));
                if ($row = $this->member_model->getMember($reset_id)) {
                    $this->form_validation->set_rules('pswd', 'New Password', 'required');
                    $this->form_validation->set_rules('cpswd', 'Confirm Password', 'required|matches[pswd]');
                    if($this->form_validation->run() === FALSE) {
                        $res['msg'] = validation_errors();
                    }else{

                        $post = html_escape($this->input->post());

                        $this->member_model->save(array('mem_pswd' => doEncode($post['pswd'])), $reset_id);
                        $this->session->unset_userdata('reset_id');
                        $res['msg'] = showMsg('success', 'You have successfully reset your password!');

                        $res['redirect_url'] = site_url('login');
                        $res['status'] = 1;
                        $res['frm_reset'] = 1;
                        $res['hide_msg'] = 1;
                    }
                } else {
                    $res['msg'] = showMsg('error', 'Something is wrong, try again later!');
                }
                exit(json_encode($res));
            } else {
                $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'reset'));
                $this->data['site_content'] = unserialize($this->data['site_content']->code);
                $this->load->view("account/reset-password", $this->data);
            }
        } else {
            redirect('', 'refresh');
            exit;
        }
    }

    function reset($vcode)
    {
        if ($row = $this->member_model->getMemCode($vcode)) {
            $this->member_model->save(array('mem_code' => ''), $row->mem_id);
            $this->session->set_userdata('reset_id', $row->mem_id);
            redirect('reset-password', 'refresh');
            exit;
        } else {
            redirect('', 'refresh');
            exit;
        }
    }

    function verification($vcode = '')
    {
        // $this->MemLogged();
        if ($row = $this->member_model->getMemCode($vcode, intval($this->session->mem_id))) {
            if ($this->session->has_userdata('mem_id') && $this->session->mem_id != $row->mem_id) {
                setMsg('info', 'You are already logged in with different email!');
                redirect('dashboard', 'refresh');
                exit;
            }
            $this->member_model->save(array('mem_verified' => 1, 'mem_code' => ''), $row->mem_id);
            
            // $redirect_url = $this->session->mem_type == 'buyer' ? 'account-settings' : 'dashboard';
            setMsg('success', 'Your account has been successfully verified!');
            redirect('dashboard', 'refresh');
            exit;
        } else {
            redirect('', 'refresh');
            exit;
        }
    }
    
    function search()
    {
        $this->load->model('character_model');
        $this->load->model('service_model');
        if ($this->input->post('cmd') != '' && $post = $this->input->post()) {
            // exit(json_encode($post));
            header('Content-Type: application/json');
            $rows = $this->member_model->search_members($post);
            $output = array();
            
            $output['test'] = $this->db->last_query();
            $output['rows'] = $rows;
            $output['post'] = $post;
            
            if (count($rows) > 0) {
                foreach ($rows as $key => $row) {
                    $srNo = $key+1;
                    $output['player'][$key] = '
                    <div class="col">
                        <div class="srchItm">
                            <div class="icoBlk">
                                <div class="ico"><img src="'.get_image_src($row->mem_image, '150', true).'" alt="'.format_name($row->mem_fname, $row->mem_lname).'" title="'.format_name($row->mem_fname, $row->mem_lname).'"></div>
                                <div class="rateBlk">
                                    <div class="rating"><div class="rateYo" data-rateyo-rating="'.round($row->mem_avg_rating, 1).'"></div><!-- <strong>('.count_mem_reviews($row->mem_id).' reviews)</strong>--></div>
                                </div>
                            </div>
                            <div class="txt">
                                <h2>'.format_name($row->mem_fname, $row->mem_lname).'</h2>
                                <div class="slogan">'.$row->mem_profile_heading.'</div>
                                <div class="locate">'.$row->mem_city.', '.$row->mem_state.', '.$row->mem_zip.'</div>
                                '.(($this->session->mem_type != 'player') ? favorite_btn($row->mem_id, 'player') : '').'
                                <div class="price"><em>'.$row->mem_rate.'</em><small>/hour</small></div>
                            </div>
                            <a href="'.profile_url($row->mem_id, $row->mem_fname.' '.$row->mem_lname).'" target="_blank"></a>
                        </div>
                    </div>';
                    $output['locations'][$key] = (array(format_name($row->mem_fname, $row->mem_lname), $row->mem_map_lat, $row->mem_map_lng, $row->mem_id, '', strval($srNo)));
                }
            } else {
                $output['no_result'] = '<div class="col empty"><div class=""><div class="txt"><p>No result found.</p></div></div></div>';
            }
            exit(json_encode($output));
        } else {
            $this->data['post'] = $this->input->post();
            $this->data['city'] = $this->input->get('city');
            if (!empty($this->data['city'])) {
                $coordinates = get_location_detail($this->data['city']);
                $this->data['city_lat'] = $coordinates->Latitude;
                $this->data['city_lng'] = $coordinates->Longitude;
            }
            // pr($this->data['post']);
            $this->data['max_price'] = $this->member_model->get_max_rate();
            // $this->data['max_distance'] = $this->member_model->get_max_distance();
            $this->data['characters'] = $this->character_model->get_rows();
            $this->load->view('pages/search', $this->data);
            // $this->load->view('pages/search', $this->data);
        }
    }
    
    function search_jobs()
    {
        $this->isMemLogged('player');
        if ($post = $this->input->post()) {
            $output = array();
            $output['lstData'] = array();
            $output['paging'] = '';
            $output['total'] = 0;
            $output['per_page'] = 15;
            // $output['post'] = $post;
            // exit(json_encode($post));
            $this->load->model('job_model');
            $rows = $this->job_model->search_job($post);
            // $output['query'] = $this->db->last_query();
            if (count($rows) > 0) {
                $output['total'] = count($rows);
                foreach ($rows as $row) {

                    $output['lstData'][] = '
                    <li>
                        <div class="innerJobList">
                            <div class="ico"><img src="'.get_image_src($row->mem_image,'150',true).'">
                                <h4>'.format_name($row->mem_fname,$row->mem_lname).'</h4>
                            </div>
                            <div class="job-meta">
                              <div class="title">
                                 <h4><a href="'.site_url('job-detail/'.$row->encoded_id).'">
                                    '.$row->title.'</a>
                                 </h4>
                                 <p>'.short_text($row->detail).'</p>
                              </div>
                              <div class="meta-info d-flex">
                                 <p><i class="fa fa-map-marker" aria-hidden="true"></i>'.$row->city.', '.$row->state.', '.$row->zip.'</p>
                                 <p><i class="fa fa-briefcase" aria-hidden="true"></i>'.$row->subject.'</p>
                                 <p><i class="fa fa-money" aria-hidden="true"></i>'.format_amount($row->budget).'</p>

                              </div>
                            </div>
                            <div class="_jobDetail">
                                <p><i class="fi-clock" aria-hidden="true"></i>'.time_ago($row->date).'</p>
                              <a class="time-btn1 time-btn" href="'.site_url('job-detail/'.$row->encoded_id).'">View Details</a>
                            </div>
                        </div>
                    </li>';
                }
                $pagesHtml = '';
                $total = intval($output['total']);
                $per_page = $output['per_page'];
                $pages = ceil($total / $per_page);
                if (intval($pages) > 1):
                    for ($i = 1; $i <= intval($pages); $i++):
                        $pagesHtml .= '<li><a ' . (($i == 1) ? 'class="active"' : '') . ' data-page="' . $i . '" href="javascript:void();">' . $i . '</a></li>';
                    endfor;
                endif;
                $output['paging'] = ($pagesHtml) ? '<ul id="searchPaging" class="pagination">' . $pagesHtml . '</ul>' : '';
            }
            exit(json_encode($output));
        }else{
            /*$this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'search'));
            $this->data['site_content'] =unserialize($this->data['site_content']->code);*/
            $this->data['grade_levels'] = $this->master->getRows('job_grade_levels');
            $this->load->view('jobs/search', $this->data);
        }
    }

    function profile($encoded_id, $slug)
    {
        $id = intval(doDecode($encoded_id));
        if($this->data['row'] = $this->member_model->get_player($id)) {
            $this->load->model('character_model');

            $this->data['characters'] = $this->character_model->get_member_characters($id);
            foreach ($this->data['characters'] as $key => $char) {
                $char->images = $this->character_model->get_character_images($id, $char->id);
                $this->data['characters'][$key] = $char;
            }
            $this->data['mem_reviews'] = get_mem_reviews($id);
            $this->data['avg_mem_rating'] = get_avg_mem_rating($id);
            $this->data['review_count'] = count($this->data['mem_reviews']);
            $this->data['encoded_id'] = $encoded_id;
            $this->load->view('account/profile', $this->data);
        }
        else
            show_404();
    }

    public function facebook_login()
    {
        include_once APPPATH . "libraries/Facebook/autoload.php";
        $fb = new Facebook\Facebook(array(
        'app_id' => '1621516391231142', // Replace {app-id} with your app id
        'app_secret' => '700dbe7cbdfe2ab506e58ce1e4afee53',
        'default_graph_version' => 'v2.9'
        ));

        $helper = $fb->getRedirectLoginHelper();
        $permissions = array('email'); // Optional permissions
        $loginUrl = $helper->getLoginUrl(base_url('ajax/fb_callback'), $permissions);
        $fb_login_url = ($loginUrl);
        redirect($fb_login_url, 'refresh');
        exit;
    }

    public function google_login()
    {
        include_once APPPATH . "libraries/Google/autoload.php";
        $client_id = '64946543542-d5qjd9vp2f71qrd62p13l1ftbeon40dg.apps.googleusercontent.com';
        $client_secret = 'h3Fkf00VUVHvSAMf4aLFhefG';
        $redirect_uri = base_url('google-callback');
        $client = new Google_Client();
        $client->setClientId($client_id);
        $client->setClientSecret($client_secret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("email");
        $client->addScope("profile");
        $authUrl = $client->createAuthUrl();

        redirect(urldecode($authUrl), 'refresh');
    }

    public function twitter_login()
    {
       /*include_once APPPATH . "libraries/Twitter/OAuth.php";
       include_once APPPATH . "libraries/Twitter/twitteroauth.php";

       $client_id = '  ihs0ekv7iq91XlLbvACwod4jA';
       $client_secret = 'N0JnOSSL8BYH8a5ISPHp0YMSHatZFLa3TZfLcBfySTjetG6a0r';
       $redirect_uri = site_url('ajax/twitter_callback');

       $connection = new TwitterOAuth($client_id, $client_secret);

       $request_token = $connection->getRequestToken($redirect_uri); 
       pr($request_token);

       
       $this->session->set_userdata('oauth_token',$request_token['oauth_token']);
       $this->session->set_userdata('oauth_token_secret',$request_token['oauth_token_secret']);

       $authUrl = $connection->getAuthorizeURL($request_token['oauth_token']);
       redirect(urldecode($authUrl), 'refresh');
       exit;*/

       include_once APPPATH . "libraries/Twitter/autoload.php";
        // use Abraham\TwitterOAuth\TwitterOAuth;
       $client_id = '  ihs0ekv7iq91XlLbvACwod4jA';
       $client_secret = 'N0JnOSSL8BYH8a5ISPHp0YMSHatZFLa3TZfLcBfySTjetG6a0r';
       $redirect_uri = site_url('ajax/twitter_callback');

       $connection = new Abraham\TwitterOAuth\TwitterOAuth($client_id, $client_secret);
       $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => $redirect_uri));
       pr($request_token);
       $this->session->set_userdata('oauth_token',$request_token['oauth_token']);
       $this->session->set_userdata('oauth_token_secret',$request_token['oauth_token_secret']);
       $authUrl = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
       redirect(urldecode($authUrl), 'refresh');
       exit;
    }
    
    function job_detail()
    {
        $this->load->view("player/job-detail", $this->data);
    }
}

?>