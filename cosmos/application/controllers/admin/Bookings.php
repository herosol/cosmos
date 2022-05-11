<?php

class Bookings extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        $this->load->model('booking_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/bookings';

        $this->data['rows'] = $this->booking_model->get_admin_bookings(array(), '', '', 'desc');
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }

    function detail($id = 0)
    {
        $id = intval($id);
        if($this->data['row'] = $this->booking_model->get_admin_booking($id)) {
            if($this->input->post()) {
                $res = array();
                $res['hide_msg'] = 0;
                $res['scroll_top'] = 0;
                $res['status'] = 0;
                $res['frm_reset'] = 0;
                $res['redirect_url'] = 0;

                if($this->data['row']->completed == 2) {
                    $this->form_validation->set_rules('rating', 'Rating', 'required|integer', array('integer' => 'Please rate this Booking'));
                    $this->form_validation->set_rules('comment', 'Comment', 'required', array('required' => 'Please write comment!'));
                }
                
                if($this->form_validation->run() === FALSE) {
                    $res['msg'] = validation_errors();
                } else {
                    $post = html_escape($this->input->post());

                    /*$booking_vals = array('final_date' => db_format_date($post['date']), 'final_start_time' => get_full_time($post['start_time']), 'final_end_time' => get_full_time($post['end_time']));

                    $this->booking_model->save($booking_vals,$id);
                    $res['msg'] = showMsg('success', 'Booking has been marked completed successfully!');*/
                    
                    if($this->data['row']->completed == 2) {
                        if($post['rating'] > 5 || $post['rating'] < 0.1) {
                            $res['msg'] = '<div class="alert alert-danger alert-sm"><strong>Error!</strong> Please rate this booking!</div>';
                            exit(json_encode($res));
                        }
                        
                        $save_data=array('ref_id' => $id, 'ref_type' => 'booking');

                        if($this->master->getRow('reviews', $save_data)){;
                            $save_data['rating'] = $post['rating'];
                            $save_data['comment'] = $post['comment'];


                            $this->master->save('reviews', $save_data, 'ref_id', $id);

                            $res['status'] = 1;
                            $res['msg'] = showMsg('success', 'Review has been saved successfully!');

                        }
                    }
                }
                exit(json_encode($res));
            } else {
                $this->data['pageView'] = ADMIN.'/bookings';
                // $this->data['row']->images = $this->master->getRows('gallery', array('ref_id' => $id, 'ref_type' => 'booking'));
                // $this->data['row']->pet_rows = $this->booking_model->get_booking_pets($id);

                $this->data['member'] = $this->master->getRow('members', array('mem_id' => $this->data['row']->player_id));
                if($this->data['row']->canceled == 1)
                    $this->data['canceled_by'] = $this->master->getRow('members', array('mem_id' => $this->data['row']->canceled_by));
                $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
            }
        }
        else
            show_404();
    }

    function booking_request_detail()
    {
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => 'student');
        if($row = $this->booking_model->get_booking($id, $condition)) {
            $res['data'] = '
            <div class="crosBtn"></div>
            <h3>Booking Request</h3>';
            $res['data'] .= '
            <ul class="list">
            <li><strong>Name:</strong><span>'.$row->mem_name.'</span></li>
            <li><strong>Subject:</strong><span>'.$row->subject.'</span></li>
            <li><strong>Date:</strong><span>'.format_date($row->booking_date_time).'</span></li>
            <li><strong>Start Time:</strong><span>'.format_date($row->booking_date_time,'h:i A').'</span></li>
            <li><strong>Hours:</strong><span>'.hours_format($row->hours).'</span></li>
            <li><strong>Total:</strong><span>$'.num($row->amount).'</span></li>';
            if ($row->promocode != '')
                $res['data'] .= '<li><strong>Discount:</strong>$'.num($row->discount).'&emsp; <small>('.$row->promocode.')</small></li>';
            if ($row->completed == 2)
                $res['data'] .= '<li><strong>Status:</strong><span>Complete</span></li>';
            $res['data'] .= '<li><strong>Booking Type:</strong><span>'.$row->booking_type.'</span></li>';
            $res['data'] .= '<li><strong>Location:</strong><span>'.$row->address.'</span></li>';

            $res['data'] .= '
            <li><strong>Message:</strong><span>'.$row->detail.'</span></li>
            </ul>';

            if ($row->status == 1 && $row->canceled != 1)
                $res['data'] .= '<div class="alertMsg"><div class="alert alert-success">Request has been accepted!</div><div class="clearfix"></div></div>';
            elseif ($row->status == 2)
                $res['data'] .= '<div class="alertMsg"><div class="alert alert-success">Booking has been booked!</div><div class="clearfix"></div></div>';
            elseif ($row->status == 3)
                $res['data'] .= '<div class="alertMsg"><div class="alert alert-danger">Request has been Declined.</div><div class="clearfix"></div></div>';
            if ($row->canceled == 1)
                $res['data'] .= '<div class="alertMsg"><div class="alert alert-danger">Bookings has been Canceled.</div><div class="clearfix"></div></div>';
            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

}

?>