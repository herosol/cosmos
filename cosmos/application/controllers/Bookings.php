<?php

class Bookings extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->isMemLogged($this->session->mem_type);
        $this->load->model('member_model');
        $this->load->model('booking_model');
        $this->load->model('payment_methods_model');
        $this->load->library('my_stripe');
        $this->load->model('transaction_model');
    }

    function index()
    {
        $this->isMemLogged('buyer');
        if($this->input->post()) {
            $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id);
            $res['items'] = "";
            $res['reached'] = true;
            $res['found'] = 1;
            $res['load'] = 1;

            $type = strtolower(trim($this->input->post('store')));
            $res['type'] = $type;
            
            if(!in_array($type, array('all', 'completed', 'pending'))) {
                $res['items'] = '<div class="jobBlk semi color hidden"><ul class="lst"><li>No booking available</li></ul></div>';
                exit(json_encode($res));
            }


            $page = intval($this->input->post('load'));
            $page = $page > 0 ? $page : 1;
            $per_page = 20;
            $total = $this->booking_model->total_type_bookings($type, $condition);
            $total_pages = ceil($total/$per_page);
            $start = ($page-1)*$per_page;

            $res['reached'] = $total_pages > $page ? false : true;

            $bookings = $this->booking_model->get_type_bookings($type, $condition, $start, $per_page);
            if (count($bookings) > 0) {
                $res['found'] = 1;
                $res['load'] = $page+1;

                foreach ($bookings as $key => $booking) {

                    $res['items'] .= 
                    '<div class="jobBlk hidden">
                        <ul class="lst">
                            <li>
                                <div class="icoBlk">
                                    <div class="ico"><img src="'.get_image_src($booking->mem_image, 300, true).'" alt="'.$booking->mem_name.'"></div>
                                    <div class="name">'.$booking->mem_name.' <em>'.$booking->work_type.'</em></div>
                                </div>
                            </li>
                            <li class="price_bold">'.format_amount($booking->amount).'</li>
                            <!--<li class="date">'.format_date($booking->start_date).' <em>&#8594;</em> '.format_date($booking->end_date).'</li>-->
                            <li class="date">'.format_date($booking->start_date).'</li>
                            <li>'.get_confirmed_status($booking).'</li>
                        </ul>';
                        /*if ($type=='pending')
                            $res['items'] .= '<a href="'. site_url('request-detail/'.$booking->encoded_id).'"></a>';
                        else
                            $res['items'] .= '<a href="'. site_url('booking-detail/'.$booking->encoded_id).'"></a>';*/
                            $res['items'] .= '<a href="javascript:void(0)" class="view-detail" data-link="'.($booking->status == 2 ? "booking-detail" : "get-request-detail").'" data-store="'.$booking->encoded_id.'"></a>';
                    $res['items'] .= '</div>';
                }
            }
            else
                $res['items'] = '<div class="jobBlk semi color hidden"><ul class="lst"><li>No booking available</li></ul></div>';
            exit(json_encode($res));
        }
        else
            $this->load->view("buyer/bookings", $this->data); 
    }
    

    function jobs()
    {
        $this->isMemLogged('player');
        if($this->input->post()) {
            $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id);
            $res['items'] = "";
            $res['reached'] = true;
            $res['found'] = 1;
            $res['load'] = 1;

            $type = strtolower(trim($this->input->post('store')));
            $res['type'] = $type;
            
            if(!in_array($type, array('all', 'completed', 'pending'))) {
                $res['items'] = '<div class="jobBlk semi color hidden"><ul class="lst"><li>No booking available</li></ul></div>';
                exit(json_encode($res));
            }

            /*$count_function_name = 'total_'.$type.'_bookings';
            $function_name = 'get_'.$type.'_bookings';*/

            $page = intval($this->input->post('load'));
            $page = $page >0 ? $page : 1;
            $per_page = 20;
            $total = $this->booking_model->total_type_bookings($type, $condition);
            $total_pages = ceil($total/$per_page);
            $start = ($page-1) * $per_page;

            $res['reached'] = $total_pages > $page ? false : true;

            $bookings = $this->booking_model->get_type_bookings($type, $condition, $start, $per_page);
            if (count($bookings) > 0) {
                $res['found'] = 1;
                $res['load'] = $page+1;

                foreach ($bookings as $key => $booking){
                    $res['items'] .= 
                    '<div class="jobBlk hidden">
                        <ul class="lst">
                            <li>
                                <div class="icoBlk">
                                    <div class="ico"><img src="'.get_image_src($booking->mem_image, 300, true).'" alt="'.$booking->mem_name.'"></div>
                                    <div class="name">'.$booking->mem_name.' <em>'.$booking->work_type.'</em></div>
                                </div>
                            </li>
                            <li class="price_bold">'.format_amount($booking->amount).'</li>
                            <!--<li class="date">'.format_date($booking->start_date).' <em>&#8594;</em> '.format_date($booking->end_date).'</li>-->
                            <li class="date">'.format_date($booking->start_date).'</li>
                            <li>'.get_confirmed_status($booking).'</li>
                        </ul>';
                        /*if ($type=='pending')
                            $res['items'] .= '<a href="'. site_url('request-detail/'.$booking->encoded_id).'"></a>';
                        else
                            $res['items'] .= '<a href="'. site_url('booking-detail/'.$booking->encoded_id).'"></a>';*/
                            $res['items'] .= '<a href="javascript:void(0)" class="view-detail" data-link="'.($booking->status == 2 ? "booking-detail" : "get-request-detail").'" data-store="'.$booking->encoded_id.'"></a>';
                    $res['items'] .= '</div>';
                }
            }
            else
                $res['items'] = '<div class="jobBlk semi color hidden"><ul class="lst"><li>No Job available</li></ul></div>';
                // $res['query'] = $this->db->last_query();
            exit(json_encode($res));
        }
        else
            $this->load->view("player/jobs", $this->data); 
    }




    function booking_detail($encoded_id = '')
    {
        $encoded_id = empty($encoded_id) ? $this->input->post('store') : $encoded_id;
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2);
        if($row = $this->booking_model->get_booking($id, $condition)){
            if ($this->session->mem_type == 'buyer' && $row->completed == 1)
                $this->mark_compelte_booking($encoded_id);
            $this->booking_model->save(array($this->session->mem_type.'_noti' => 0), $id);
            $res['data'] = '
            <div class="crosBtn"></div>
            <h2>Booking Detail</h2>
            <ul class="list">
            <li><strong>Booking No:</strong><span>'.num_size($row->id).'</span></li>
            <li><strong>Name:</strong><span>'.$row->mem_name.'</span></li>
            <li><strong>Type of work:</strong><span>'.$row->work_type.'</span></li>
            <li><strong>Date:</strong><span>'.format_date($row->start_date).'</span></li>
            <li><strong>Number of hours:</strong><span>'.hours_format($row->hours).'</span></li>
            <li><strong>Rate:</strong><span>'.format_amount($row->rate).'</span></li>
            <li><strong>Hotel/stay covered:</strong><span>'.($row->hotel_expense == 1 ? 'Yes' : 'No').'</span></li>
            ';
            if (count($row->extras) > 0) {
                $res['data'] .=  '<h4>Extras</h4>';
                foreach ($row->extras as $key => $extra) {
                    $res['data'] .= '<li><strong>'.$extra->title.':</strong><span>'.format_amount($extra->price).'</span></li>';
                }
            }

            $res['data'] .= '<li><strong>Total:</strong><span>'.format_amount($row->amount).'</span></li>';
            if ($this->session->mem_type == 'player')
                $res['data'] .= '<li><strong>Your Earning:</strong><span>'.format_amount($row->player_amount).'</span></li>';
            $res['data'] .= '</ul>';

            if ($row->canceled == 0 && $row->completed == 0) {
               $res['data'] .= '
               <div class="bTn text-center">
               <a href="javascript:void(0)" class="webBtn cnclBtn mActn-btn" data-store="'.$encoded_id.'" data-link="mark-cancel-booking">Cancel Booking <i class="spinner hidden"></i></a>';
                if ($this->session->mem_type == 'buyer')
                    $res['data'] .= '<a href="javascript:void(0)" class="webBtn colorBtn mActn-btn" data-store="'.$encoded_id.'" data-link="mark-complete-booking">Mark complete <i class="spinner hidden"></i></a>';
                else
                    $res['data'] .= '<a href="javascript:void(0)" class="webBtn colorBtn mActn-btn" data-store="'.$encoded_id.'" data-link="mark-complete-booking">Mark complete <i class="spinner hidden"></i></a>';
               $res['data'] .= '</div>';
           }
            if ($row->canceled == 1)
                $res['data'] .= '<div class="alertBlk reject">Booking has been canceled.</div>';
            if ($this->session->mem_type == 'player' && $row->completed == 1)
                $res['data'] .= '<div class="alertBlk accept">You mark this Booking as completed.</div>';
            if ($row->canceled == 0 && $row->completed == 2) {
                $review = get_mem_rating($row->buyer_id, $row->id);
                $review_reply = get_reply($review->id);
                $res['data'] .= '
                <div class="reviewBlk">
                    <div class="review">
                        <div class="icoBlk">
                            <div class="ico"><img src="'.get_image_src($review->mem_image, 300, true).'" alt="'.$review->mem_name.'"></div>
                        </div>
                        <div class="txt">
                            <div class="icoTxt">
                                <div class="title">
                                    <h4>'.$review->mem_name.'</h4>
                                    <div class="date">'.format_date($review->date).'</div>
                                </div>
                                <div class="rateYo" data-rateyo-rating="'.$review->rating.'" data-rateyo-read-only="true"></div>
                            </div>
                            <p>'.$review->comment.'</p>';
                            if ($review_reply)
                                $res['data'] .= '<div class="btnBlk"><h5 class="regular">'. $review_reply->comment.'</h5></div>';
                            elseif (!$review_reply && $this->session->mem_type == 'player')
                                $res['data'] .= '
                                <div class="btnBlk">
                                    <div class="bTn">
                                        <a href="javascript:void(0)" class="webBtn colorBtn smBtn mActn-btn" data-store="'.$encoded_id.'" data-link="respond-box">Respond to Feedback <i class="spinner hidden"></i></a>
                                    </div>
                                </div>';
                        $res['data'] .= '</div>
                    </div>
                </div>';
            }

            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function mark_compelte_booking($encoded_id = '')
    {
        // $this->isMemLogged('buyer');
        $this->data['encoded_id'] = empty($encoded_id) ? $this->input->post('store') : $encoded_id;

        $id = intval(substr(doDecode($this->data['encoded_id']), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2, 'completed<>' => 2, 'canceled' => 0);
        if($row = $this->booking_model->get_booking($id, $condition)) {
            // $this->booking_model->save(array($this->session->mem_type.'_noti' => 0), $id);
            $res['data'] = '<div class="crosBtn"></div>';
            if ($this->session->mem_type == 'player') {
                $this->booking_model->save(['completed' => 1, 'completed_date' => date('Y-m-d H:i:s')], $id);
                $res['data'] .= '
                <h2>Booking Detail</h2>
                <ul class="list">
                <li><strong>Name:</strong><span>'.$row->mem_name.'</span></li>
                <li><strong>Type of work:</strong><span>'.$row->work_type.'</span></li>
                <li><strong>Date:</strong><span>'.format_date($row->start_date).'</span></li>
                <li><strong>Number of hours:</strong><span>'.hours_format($row->hours).'</span></li>
                <li><strong>Rate:</strong><span>'.format_amount($row->rate).'</span></li>
                <li><strong>Hotel/stay covered:</strong><span>'.($row->hotel_expense == 1 ? 'Yes' : 'No').'</span></li>
                ';
                if (count($row->extras) > 0) {
                    $res['data'] .=  '<h4>Extras</h4>';
                    foreach ($row->extras as $key => $extra) {
                        $res['data'] .= '<li><strong>'.$extra->title.':</strong><span>'.format_amount($extra->price).'</span></li>';
                    }
                }
                $res['data'] .= '
                <li><strong>Total:</strong><span>'.format_amount($row->amount).'</span></li>
                <li><strong>Your Earning:</strong><span>'.format_amount($row->player_amount).'</span></li>
                </ul>
                <div class="alertBlk accept">You mark this Booking as completed.</div>
                ';

                $res['status'] = 1;
                exit(json_encode($res));

            }
            $res['data'] = '<h2>'.($this->session->mem_type == 'buyer' ? 'Leave Feedback' : 'Mark Complete').'</h2>';
            if($row->completed == 1) {
                $res['data'] .= '
                <ul class="list">
                <li><strong>Name:</strong><span>'.$row->mem_name.'</span></li>
                <li><strong>Type of work:</strong><span>'.$row->work_type.'</span></li>
                <li><strong>Date:</strong><span>'.format_date($row->start_date).'</span></li>
                <li><strong>Number of hours:</strong><span>'.hours_format($row->hours).'</span></li>
                <li><strong>Rate:</strong><span>'.format_amount($row->rate).'</span></li>
                <li><strong>Hotel/stay covered:</strong><span>'.($row->hotel_expense == 1 ? 'Yes' : 'No').'</span></li>
                ';
                if (count($row->extras) > 0) {
                    $res['data'] .=  '<h4>Extras</h4>';
                    foreach ($row->extras as $key => $extra) {
                        $res['data'] .= '<li><strong>'.$extra->title.':</strong><span>'.format_amount($extra->price).'</span></li>';
                    }
                }
                $res['data'] .= '
                <li><strong>Total:</strong><span>'.format_amount($row->amount).'</span></li>
                </ul>';
            }
            $this->data['row'] = $row;
            $res['data'] .= $this->load->view("buyer/leave-review", $this->data, TRUE); 
            /*$res['data'] .= '
            <form action="'.site_url('complete-booking').'" method="post" autocomplete="off" class="frmAjax">
            <input type="hidden" name="store" value="'.$encoded_id.'">';

            if ($row->completed == 0)
                $res['data'] .= '
            <div class="txtGrp">
                <h4>Times for Bookings</h4>
                <div class="row formRow">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                        <input type="text" id="date" name="date" class="txtBox datepicker" data-date-start-date="0d" placeholder="Date" required="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                        <input type="text" id="start_time" name="start_time" class="txtBox timepicker" placeholder="Start Time" required="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                        <input type="text" id="end_time" name="end_time" class="txtBox timepicker" placeholder="End Time" required="">
                    </div>
                </div>
            </div>';
            if ($this->session->mem_type == 'buyer')
                $res['data'] .= '
            <div class="txtGrp">
            <h4>Leave a rating for your player</h4>
            <div class="row formRow">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                <div class="rateYo" id="rating"></div>
                <input type="hidden" name="rating" value="0">
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xx-12 txtGrp">
                <textarea name="cmnt" id="cmnt" class="txtBox" placeholder="Comment"></textarea>
            </div>
            </div>
            </div>';

            $res['data'] .= '
            <div class="bTn text-center">';
            if ($this->session->mem_type == 'player' || ($this->session->mem_type == 'buyer' && $row->completed != 1))
                $res['data'] .= '
            <a href="javascript:void(0)" class="webBtn  cnclBtn mActn-btn" data-store="'.$encoded_id.'" data-link="booking-detail">Go Back <i class="spinner hidden"></i></a>';
            $res['data'] .= '
            <button type="submit" class="webBtn colorBtn">Submit <i class="spinner hidden"></i></button>
            </div>
            <div class="alertMsg" style="display: none;"></div>
            </form>';
            */
            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function respond_box($encoded_id = '')
    {
        $this->isMemLogged('player');
        $this->data['encoded_id'] = empty($encoded_id) ? $this->input->post('store') : $encoded_id;

        $id = intval(substr(doDecode($this->data['encoded_id']), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2, 'completed' => 2, 'canceled' => 0);
        if($row = $this->booking_model->get_booking($id, $condition)) {
            $review = get_mem_rating($row->buyer_id, $row->id);
            $review_reply = get_reply($review->id);
            if ($review_reply)
                die('access denied');
            // $this->booking_model->save(array($this->session->mem_type.'_noti' => 0), $id);
            $res['data']='<div class="crosBtn"></div>
            <h2>Respond to Feedback</h2>';
            $res['data'] .= $this->load->view("buyer/leave-review", $this->data, TRUE); 
            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function complete_booking()
    {
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_top'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $encoded_id = $this->input->post('store');
            $id = intval(substr(doDecode($encoded_id), 4));
            $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2, 'canceled' => 0);
            if ($this->session->mem_type == 'player')
                $condition['completed'] = 2;
            if(!$row = $this->booking_model->get_booking($id, $condition)) {
                $res['msg'] = showMsg('error', 'Something went worng!');
                exit(json_encode($res));
            }
            if ($this->session->mem_type=='buyer') {
                if ($row->completed == 2) {
                    $res['msg'] = showMsg('error', 'Something went worng!');
                    exit(json_encode($res));
                }
                $this->form_validation->set_rules('rating', 'Rating', 'required|integer', array('integer'=>'Please rate this Booking'));
            }
            $this->form_validation->set_rules('cmnt', 'Comment', 'required', array('required'=>'Please write comment!'));
            
            if($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());

                if ($this->session->mem_type == 'buyer') {
                    // $noti_mem = $this->session->mem_type == 'player' ? 'buyer' : 'player';
                    $booking_vals = array('player_noti' => 1, 'buyer_noti' => 1);
                    if ($post['rating'] > 5 || $post['rating'] < 1) {
                        $res['msg'] = '<div class="alert alert-danger alert-sm"><strong>Error!</strong> Please rate this booking!</div>';
                        exit(json_encode($res));
                    }

                    $save_data = array('from_id' => $this->session->mem_id, 'ref_id' => $id, 'ref_type' => 'booking');

                    if(!$this->master->getRow('reviews', $save_data)) {
                        $save_data['mem_id'] = $row->player_id;
                        $save_data['rating'] = $post['rating'];
                        $save_data['comment'] = $post['cmnt'];


                        $this->master->save('reviews', $save_data);

                        $txt = format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. reviewed you '.$post['rating'].' stars. <a href="javascript:void(0)" class="view-detail" data-store="'.$encoded_id.'" data-link="booking-detail">click here</a> to view booking.';

                        save_notificaiton($row->player_id, $this->session->mem_id, $txt);


                        $txt = 'You reviewed '.$row->mem_name.'. '.$post['rating'].' stars. <a href="javascript:void(0)" class="view-detail" data-store="'.$encoded_id.'" data-link="booking-detail">click here</a> to view booking.';
                        save_notificaiton($this->session->mem_id, $row->player_id, $txt);


                        $percentage_amount = $this->data['site_settings']->site_percentage > 0 ? round(($this->data['site_settings']->site_percentage*$row->amount)/100, 2) : 0;

                        $amount = $row->amount-$percentage_amount;
                        $trx_id = $this->transaction_model->save(array('mem_id' => $row->player_id, 'booking_id' => $row->id, 'amount' => $amount, 'status' => 0));

                        $booking_vals['completed'] = 2;

                        $res['status'] = 1;
                        $res['msg'] = showMsg('success', 'Review has been saved successfully!');
                        $res['frm_reset'] = 1;
                        $res['redirect_url'] = ' ';
                    }
                } elseif($review = get_mem_review($row->buyer_id, $id)) {
                    
                    $save_data = array('from_id' => $this->session->mem_id, 'mem_id' => $this->session->mem_id, 'parent_id' => $review->id, 'ref_id' => $id, 'ref_type' => 'booking');

                    if(!$this->master->getRow('reviews', $save_data)) {
                        $booking_vals = array('buyer_noti' => 1);
                        $save_data['comment'] = $post['cmnt'];

                        $this->master->save('reviews', $save_data);

                        $txt = format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).' respond to your reviewed. <a href="javascript:void(0)" class="view-detail" data-store="'.$encoded_id.'" data-link="booking-detail">click here</a> to view booking.';

                        save_notificaiton($row->buyer_id, $this->session->mem_id, $txt);

                        $res['status'] = 1;
                        $res['msg'] = showMsg('success', 'Review has been saved successfully!');
                        $res['frm_reset'] = 1;
                        $res['redirect_url'] = ' ';
                    }
                }
                if (!empty($booking_vals))
                    $this->booking_model->save($booking_vals, $id);
            }
            exit(json_encode($res));
        }
        die('access denied');
    }

    function mark_cancel_booking()
    {
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2, 'completed' => 0, 'canceled' => 0);
        if($row = $this->booking_model->get_booking($id, $condition)){
            $res['data'] = '
            <div class="crosBtn"></div>
            <h2>Cancel Booking</h2>
            <div class="text-center">
            <p>Are you sure you want to cancel this booking?</p>
            <div class="bTn">
            <a href="javascript:void(0)" class="webBtn cnclBtn mActn-btn" data-store="'.$encoded_id.'" data-link="booking-detail">Go Back <i class="spinner hidden"></i></a>
            <a href="javascript:void(0)" class="webBtn redBtn mActn-btn" data-store="'.$encoded_id.'" data-link="cancel-booking">Confirm <i class="spinner hidden"></i></a>
            </div>
            </div>';
            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }
    
    function cancel_booking()
    {
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2, 'completed' => 0, 'canceled' => 0);
        if($row = $this->booking_model->get_booking($id, $condition)) {

            $noti_mem = $this->session->mem_type == 'player' ? 'buyer' : 'player';
            $this->booking_model->save(array($noti_mem.'_noti' => 1, 'canceled' => 1, 'canceled_by' => $this->session->mem_id, 'final_date' => date('Y-m-d')), $id);

            $txt = 'Your booking with '.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. has been canceled. <a href="javascript:void(0)" class="view-detail" data-store="'.$encoded_id.'" data-link="booking-detail">click here</a> to view.';
            save_notificaiton($row->{$noti_mem.'_id'}, $this->session->mem_id, $txt);

            $res['data'] = $this->booking_detail($encoded_id);
            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function my_players($page = 1)
    {
        $this->isMemLogged('buyer');
        $page = intval($page);
        $per_page = 40;

        $total = $this->booking_model->total_buyer_players();

        $total_pages = ceil($total/$per_page);


        $this->load->library('pagination');
        $this->config->load('pagination');

        $config = $this->config->item('pagination');        
        $config['base_url'] = site_url('my-players');
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config); 
        $this->data['links'] = $this->pagination->create_links();

        $start = ($page-1)*$per_page;

        $this->data['rows'] = $this->booking_model->get_buyer_players('', $start, $per_page, 'desc');
        $this->load->view('account/my-players', $this->data);
    }

    function requests($page = 1)
    {
        $page = $page == 0 ? 1 : intval($page);
        $per_page = 40;

        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status<=' => 1);

        $total = $this->booking_model->total_mem_booking_requests(array($this->session->mem_type.'_id' => $this->session->mem_id, 'status<=' => 1));
        $total_pages = ceil($total/$per_page);
        

        if ($this->session->mem_type == 'player') {
            $this->data['page_title'] = 'Booking Requests';
            $url = 'booking-requests';
        } else {
            $this->data['page_title'] = 'Requests';
            $url = 'requests';
        }
        $this->load->library('pagination');
        $this->config->load('pagination');

        $config = $this->config->item('pagination');        
        $config['base_url'] = site_url($url);
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config); 
        $this->data['links'] = $this->pagination->create_links();

        $start = ($page-1)*$per_page;

        $this->data['rows'] = $this->booking_model->get_mem_requests($condition, $start, $per_page, 'desc');


        $this->load->view("bookings/requests", $this->data); 


        /*
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id);
        if($this->input->post()) {
            $cat_id = intval(substr(doDecode($this->input->post('store')), 4));
            $res['items'] = "";

            $page = intval($this->input->post('load'));
            $page = $page > 0 ? $page : 1;
            $per_page = 20;
            $total = $this->booking_model->total_bookings('', $condition);
            $total_pages = ceil($total/$per_page);
            $start = ($page-1)*$per_page;

            $res['reached'] = $total_pages > $page ? false : true;
            $res['btn'] = '';
            $res['found'] = 0;
            $res['load'] = $this->input->post('load')? $page+1 : 2;

            $bookings = $this->booking_model->get_bookings_by_order($condition,$start,$per_page,$sort_order);
            if (count($bookings) > 0) {
                $res['found']=1;
                if (!$res['reached'])
                    $res['btn'] .= '<div class="loadBtn hidden"><a href="javascript:void(0)" class="webBtn">Load More...</a></div>';
                
                foreach ($bookings as $key => $booking){
                    $res['items'] .= 
                    '<li class="hidden">
                    <div class="iTem">
                    <div class="image" style="background-image: url(\''. get_image_src($booking->thumbnail,300).'\')">
                    <a href="'. booking_url($booking->id,$booking->title).'" class="overlay"></a>
                    </div>
                    <div class="heart">
                    <a href="javascript:void(0)" class="active"><i class="fi-heart"></i><span>'.$booking->likes.'</span></a>
                    </div>
                    <div class="ico"><a href="'. profile_url($booking->mem_id,get_mem_name($booking->mem_id)).'"><img src="'. get_image_src(get_mem_image($booking->mem_id),50,true).'" alt=""></a></div>
                    <div class="cntnt">
                    <h4><a href="'. booking_url($booking->id,$booking->title).'">'. $booking->title.'</a></h4>
                    <div class="rateYo" data-rateyo-rating="'.get_avg_rating($booking->id,'booking').'" data-rateyo-read-only="true"></div>
                    <!--<div class="chBlk">
                    <div class="ch">CH 1</div>
                    <div class="date">5/23</div>-->
                    </div>
                    </div>
                    </div>        
                    </li>';
                }
            }
            else
                $res['items'] = "<li>No booking</li>";
            exit(json_encode($res));
        }
        
        $this->data['page_title'] = $this->session->mem_type=='player'?'Booking Requests':'Requests';
        $this->data['rows'] = $this->booking_model->get_mem_requests($condition,'',18);
        // $this->data['rows'] = $this->booking_model->get_bookings(array($this->session->mem_type.'_id'=>$this->session->mem_id),'',18);
        $this->load->view("bookings/requests", $this->data); */
    }

    function booking_request_detail()
    {
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id);
        if($row = $this->booking_model->get_booking($id, $condition)) {
            if ($row->status != 2)
                $this->booking_model->save(array($this->session->mem_type.'_noti' => 0), $id);
            $res['data'] = '
            <div class="crosBtn"></div>
            <h2>'.($this->session->mem_type == 'buyer' ? 'My Request' : 'Booking Request').'</h2>';
            if ($this->session->mem_type == 'buyer')
                $res['data'] .= '
            <div class="cardBlk blk text-center">
            <div class="icoBlk">
            <div class="ico"><img src="'.get_image_src($row->mem_image, 150, true).'"></div>
            <h4>'.$row->mem_name.'</h4>
            <div class="rating">
            <div class="rateYo" data-rateyo-rating="'.get_avg_mem_rating($row->mem_id).'" data-rateyo-read-only="true"></div>
            <strong>('.count_mem_reviews($row->mem_id).' reviews)</strong>
            </div>
            </div>
            </div>
            <hr>';
            $res['data'] .= '
            <ul class="list">
            <li><strong>Name:</strong><span>'.$row->mem_name.'</span></li>
            <li><strong>Type of work:</strong><span>'.$row->work_type.'</span></li>
            <li><strong>Date:</strong><span>'.format_date($row->start_date).'</span></li>
            <li><strong>Number of hours:</strong><span>'.hours_format($row->hours).'</span></li>
            <li><strong>Rate:</strong><span>'.format_amount($row->rate).'</span></li>
            <li><strong>Hotel/stay covered:</strong><span>'.($row->hotel_expense == 1 ? 'Yes' : 'No').'</span></li>
            ';
            if (count($row->extras) > 0) {
                $res['data'] .=  '<h4>Extras</h4>';
                foreach ($row->extras as $key => $extra) {
                    $res['data'] .= '<li><strong>'.$extra->title.':</strong><span>'.format_amount($extra->price).'</span></li>';
                }
            }

            $res['data'] .= '
            <li><strong>Total:</strong><span>'.format_amount($row->amount).'</span></li>
            </ul>';

            if ($this->session->mem_type == 'player' && $row->status == 0)
                $res['data'] .= '
                <div class="bTn text-center">
                <a href="javascript:void(0)" class="webBtn redBtn actn-btn" data-store="'.$encoded_id.'" data-link="reject-booking-request">Decline <i class="spinner hidden"></i></a>
                <a href="javascript:void(0)" class="webBtn greenBtn actn-btn" data-store="'.$encoded_id.'" data-link="accept-booking-request">Accept <i class="spinner hidden"></i></a>
                </div>';

            if ($this->session->mem_type == 'buyer' && $row->status == 1) {
                $this->load->model('payment_methods_model');
                $credit_cards = $this->payment_methods_model->get_credit_cards($this->sesison->mem_id);
                $res['data'] .= '
                <div class="formRow row svdCards">
                <hr>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 col-xx-12 txtGrp">
                <h4>Payment Method</h4>
                <select id="payment_method" name="payment_method" class="txtBox selectpicker">';
                foreach ($credit_cards as $card_row) {
                    $res['data'] .= '<option value="'.$card_row->encoded_id.'"'.(empty($card_row->default_method)?'':' selected=""').'>● ● ● ● ● '.$card_row->last_digits.'</option>';
                }
                $res['data'] .= '</select>
                </div>
                <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-12 txtGrp">
                <h4>&nbsp;</h4>
                <input type="text" name="promocode" id="promocode" class="txtBox" placeholder="promocode..." maxlength="8">
                </div>-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 col-xx-12 txtGrp">
                <h4>&nbsp;</h4>
                <button type="button" data-store="'.$encoded_id.'" class="webBtn colorBtn bkNow">Book Now <i class="spinner hidden"></i></button>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-12 txtGrp">
                <a href="'.site_url('payment-methods').'" class="color">Manage Payment Method</a>
                </div>
                </div>
                <div class="alertMsg"></div>';
                /*
                <a href="javascript:void(0)" class="color addCard">Add new card</a>
                $res['data'].='<form action="" method="post" autocomplete="off" class="frmCreditCard">
                <input type="hidden" name="payment_type" value="credit-card">
                <hr>
                <h4>Credit card</h4>
                <div class="row formRow">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                <input type="text" name="cardnumber" id="cardnumber" class="txtBox" placeholder="Card Number">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xx-6 txtGrp">
                <input type="text" name="card_holder_name" id="card_holder_name" class="txtBox" placeholder="Card Holder">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                <select class="txtBox selectpicker" name="exp_month" id="exp_month">
                <option value="">Month</option>';
                for($i=1;$i<=12;$i++){
                    $res['data'].='<option value="'.sprintf('%02d', $i).'" '.(sprintf('%02d', $i)==$mem_data->mem_card_exp_month?'selected':'').'>'.sprintf('%02d', $i).'</option>';
                }
                $res['data'].='</select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                <select  name="exp_year" id="exp_year" class="txtBox selectpicker">
                <option value="">Year</option>';
                for($i=date('Y');$i<=date('Y')+10;$i++){
                    $res['data'].='<option value="'.$i.'"'.($i==$mem_data->mem_card_exp_year?' selected':'').'>'.$i.'</option>';
                }
                $res['data'].='</select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-xx-4 txtGrp">
                <input type="text" name="cvc" id="cvc" class="txtBox" placeholder="CVC?">
                </div>
                </div>
                <div class="bTn text-center">
                <button type="button" class="webBtn cnclBtn cnclBtnNCard">Cancel</button>
                <button type="submit" data-store="'.$encoded_id.'" class="webBtn colorBtn">Book Now <i class="spinner hidden"></i></button>
                </div>
                <div class="alertMsg"></div>
                </form>';*/
            }
            elseif ($this->session->mem_type == 'player' && $row->status == 1)
                $res['data'] .= '<div class="alertBlk accept">Request has been accepted!</div>';

            if ($row->status == 2)
                $res['data'] .= '<div class="alertBlk accept">Booking has been confirmed!</div>';
            if ($row->status == 3)
                $res['data'] .= '<div class="alertBlk reject">Request has been Declined.</div>';
            if ($row->canceled == 1)
                $res['data'] .= '<div class="alertBlk reject">Bookings has been Canceled.</div>';
            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function accept_booking_request()
    {
        $this->isMemLogged('player');
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 0);
        if($row = $this->booking_model->get_booking($id, $condition)){

            $this->booking_model->save(array('buyer_noti' => 1, 'status' => 1), $id);

            $txt = format_name($this->data["mem_data"]->mem_fname,$this->data["mem_data"]->mem_lname).'. has accepted your booking request. <a href="javascript:void(0)" class="view-detail" data-store="'.$encoded_id.'" data-link="get-request-detail">click here</a> to book.';
            save_notificaiton($row->buyer_id, $this->session->mem_id, $txt);

            $res['data'] .= '<div class="alertBlk accept">Request has been Accepted.</div>';
            $res['status'] = 1;
            $res['reload'] = 0;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function reject_booking_request()
    {
        $this->isMemLogged('player');
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 0);
        if($row = $this->booking_model->get_booking($id, $condition)){

            $this->booking_model->save(array('buyer_noti' => 1, 'status' => 3), $id);

            $txt = 'Your booking request with '.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. has been declined.';
            save_notificaiton($row->buyer_id, $this->session->mem_id, $txt);

            $res['data'] .= '<div class="alertBlk reject">Request has been Declined.</div>';
            $res['status'] = 1;
            $res['reload'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function chat_booking($requster_id = '')
    {
        $this->isMemLogged('player');

        $requster_id = intval(doDecode($requster_id));
        if ($this->session->mem_type == 'buyer') {
            $player_id = $requster_id;
            $buyer_id = $this->session->mem_id;
        } else {
            $player_id = $this->session->mem_id;
            $buyer_id = $requster_id;
        }

        if($player_row = $this->member_model->get_player($player_id)) {

            if($this->input->post()) {
                $post = html_escape($this->input->post());

                $res = array();
                $res['hide_msg'] = 0;
                $res['scroll_to_msg'] = 1;
                $res['status'] = 0;
                $res['frm_reset'] = 0;
                $res['redirect_url'] = 0;

                $this->form_validation->set_message('integer', 'Please select a valid {field}');
                $this->form_validation->set_rules('work_type', 'Type of work', 'required|in_list[Event Promotion,Convention Appearance,Photoshoot,Other]', array('in_list' => 'Please select a valid {field}'));
                $this->form_validation->set_rules('date', 'Date', 'required|is_min_valid_date', array('required' => 'Please select a {field}'));
                $this->form_validation->set_rules('hours', 'Number of hours', 'required|integer', array('required' => 'Please enter valid {field}', 'integer' => 'Please enter valid {field}'));
                $this->form_validation->set_rules('rate', 'Rate', 'required|numeric', array('required' => 'Please enter valid {field}', 'numeric' => 'Please enter valid {field}'));
                $this->form_validation->set_rules('hotel_expence', 'Hotel Expenses', 'integer', array('integer' => 'Please select a {field}'));
                
                if($this->form_validation->run() === FALSE) {
                    $res['msg'] = validation_errors();
                } else {

                    /*
                    $booking_date_time = db_format_date($post['date']);
                    if (compare_dates($booking_date_time, date('Y-m-d H:i'), 'Y-m-d H:i')) {
                        $res['msg'] = showMsg('error', 'Please select future timing !');
                        exit(json_encode($res));
                    }
                    */


                    if (count($post['title']) != count($post['price'])) {
                        $res['msg'] = showMsg('error', 'Something went wrong. Please try again!');
                        exit(json_encode($res));
                    }

                    
                    $amount = $post['rate']*$post['hours'];
                    $save_data = array('player_id' => $player_id, 'buyer_id' => $buyer_id, 'work_type' => $post['work_type'], 'start_date' => db_format_date($post['date']), 'hours' => $post['hours'], 'rate' => $post['rate'], 'hotel_expense' => intval($post['hotel_expense']), 'player_noti' => 1, 'buyer_noti' => 1, 'date' => date("Y-m-d H:i:s"));

                    $save_data['site_percentage'] = $this->data['site_settings']->site_percentage;

                    $save_data['status'] = $this->session->mem_type == 'buyer' ? 0 : 1;
                    
                    $booking_id = $this->booking_model->save($save_data);
                    if($booking_id == 0) {
                        $res['msg'] = showMsg('error', 'Something went wrong. Please try again!');
                        exit(json_encode($res));
                    }
                    $encoded_id = doEncode('bkg-'.$booking_id);
                    $this->booking_model->save(array('encoded_id' => $encoded_id), $booking_id);
                    if (count($post['title']) > 0 && count($post['price']) > 0) {
                        foreach ($post['title'] as $key => $title) {
                            $this->master->save('booking_extras', array('booking_id' => $booking_id, 'title' => $title, 'price' => $post['price'][$key]));
                        }
                    }

                    if ($this->session->mem_type == 'buyer') {
                        $txt = 'You have a new booking request from '.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. <a href="javascript:void(0)" class="view-detail" data-link="get-request-detail" data-store="'.$encoded_id.'">click here</a> to view detail.';

                        save_notificaiton($player_id, $this->session->mem_id, $txt);

                        $res['msg'] = showMsg('success', 'Booking request has been sent successfully!');
                    } else {
                        $txt = format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'.scheduled a booking with you <a href="javascript:void(0)" class="view-detail" data-link="get-request-detail" data-store="'.$encoded_id.'">click here</a> to view detail.';

                        save_notificaiton($buyer_id, $player_id, $txt);
                        $res['msg'] = showMsg('success','Booking has been scheduled successfully!');
                    }

                    $res['booking'] = $encoded_id;
                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                }
                exit(json_encode($res));
            }
        }
        else
            show_404();
    }

    function book_now()
    {
        $this->isMemLogged('buyer');
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $post = html_escape($this->input->post());

            $this->form_validation->set_rules('store', 'Store', 'required', array('required' => 'Something went wrong!'));
            if ($post['payment_type'] == 'credit-card') {
                $this->form_validation->set_rules('nonce', 'Nonce', 'required', array('required' => "Something went wrong!"));
            }
            else
                $this->form_validation->set_rules('payment_method', 'Payment Method', 'required', array('required' => 'Please Select Pyament Method!'));
            if($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {

                $encoded_id = $post['store'];
                $id = intval(substr(doDecode($encoded_id), 4));
                $condition = array('mem_type<>' => $this->session->mem_type,$this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 1);
                if(!$row = $this->booking_model->get_booking($id, $condition)) {
                    $res['msg'] = showMsg('error', 'Something went worng!');
                    exit(json_encode($res));
                }
                $this->load->model('payment_methods_model');
                if ($post['payment_type'] == 'credit-card') {
                    /*$last_digits = substr($post['cardnumber'], -4);
                    $expiry = get_month_name($post['exp_month']).', '.$post['exp_year'];
                    $save_data = array('mem_id' => $this->session->mem_id, 'last_digits' => $last_digits,'expiry' => $expiry);
                    $card_id = $this->payment_methods_model->save($save_data);
                    $this->payment_methods_model->save(array('encoded_id' => doEncode('pm-'.$card_id)), $card_id);*/
                } else {
                    $method_id = intval(substr(doDecode($post['payment_method']), 3));
                    if(!$method_row = $this->payment_methods_model->get_mem_method($method_id)) {
                        $res['msg'] = showMsg('error', 'Please select valid saved card!');
                        exit(json_encode($res));
                    }

                    $save_data = array('player_noti' => 1, 'status' => 2);
                    $amount = floatval($row->amount);
                    if(!empty($post['promocode'])) {
                        $this->load->model('promocode_model');
                        if(!$promocode_row = $this->promocode_model->is_valid_promocode($post['promocode'])){
                            $res['msg'] = showMsg('error', 'Invalid promo code!');
                            exit(json_encode($res));
                        }
                        $discount = $promocode_row->code_type == 'fixed' ? floatval($promocode_row->code_value) : floatval(round(($amount*$promocode_row->code_value)/100, 2));
                        $amount -= $discount;

                        $save_data['discount'] = $discount;
                        $save_data['promocode'] = $promocode_row->code;
                        $save_data['promocode_id'] = $promocode_row->id;
                    }

                    $charge = $this->my_stripe->charge($this->data['mem_data']->mem_stripe_id, $method_row->method_token, $amount, "Charge for ".$this->data['mem_data']->mem_email);
                    if(empty($charge)) {
                        $res['msg'] = showMsg('error', 'Something went worng please try again later!');
                        exit(json_encode($res));
                    }
                    if(!empty($post['promocode']) && $promocode_row)
                        $this->promocode_model->save(array('status' => 1), $promocode_row->id);

                    $trx_id = $this->transaction_model->save(array('mem_id' => $this->session->mem_id, 'booking_id' => $id, 'amount' => $amount, 'status' => 1, 'note' => "{$row->service} with {$row->mem_name}", 'charge_id' => $charge));
                }
                $this->booking_model->save($save_data, $id);

                $txt = 'Your booking with '.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. has been confirmed! You can view your upcoming jobs in <a href="'.site_url('jobs').'">My Jobs</a>.';
                save_notificaiton($row->player_id, $this->session->mem_id, $txt);
                $txt = 'Booking has been confirmed!';
                save_notificaiton($row->buyer_id, $row->player_id, $txt);

                $res['data'] .= '<div class="alertBlk accept">Booking has been confirmed!</div>';
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }
        else
            $this->load->view("payments/add-payment-method", $this->data);
    }






   /*
    function booking_detail($encoded_id='')
    {
        $this->data['encoded_id'] = empty($encoded_id)?$this->input->post('store'):$encoded_id;
        $id = intval(substr(doDecode($this->data['encoded_id']), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2);
        if($this->data['row'] = $this->booking_model->get_booking($id, $condition)) {
            $this->data['row']->images = $this->master->getRows('gallery', array('ref_id' => $id, 'ref_type' => 'booking'));

            $this->booking_model->save(array($this->session->mem_type.'_noti' => 0), $id);
            if ($this->session->mem_type=='buyer')
                $this->load->view("buyer/booking-detail", $this->data);
            else
                $this->load->view("player/job-detail", $this->data); 
        }
        else
            show_404();
    }

    function on_location()
    {
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, 'player_id' => $this->session->mem_id, 'b.status' => 2, 'b.canceled' => 0, 'b.completed' => 0, 'b.on_location' => 0);
        $res = array('status' => 0);
        if($booking = $this->booking_model->get_booking($id, $condition)) {
            $this->booking_model->save(array('buyer_noti' => 1, 'on_location' => 1, 'location_time' => date('Y-m-d H:i:s')), $id);

            $txt = 'Pet player '.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. reached at location for '.$booking->service.' <a href="'.site_url('booking-detail/'.$encoded_id).'">View Booking</a>';
            save_notificaiton($booking->buyer_id, $this->session->mem_id, $txt);

            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function review_box()
    {
        $this->data['encoded_id'] = $this->input->post('store');
        $id = intval(substr(doDecode($this->data['encoded_id']), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2, 'b.canceled' => 0, 'b.completed>' => 0, 'b.on_location' => 1);
        $res = array('status' => 0);
        if($booking = $this->booking_model->get_booking($id, $condition)) {
            if($this->session->mem_type=='buyer') {
                if ($booking->completed==1)
                    $res['data'] = $this->load->view('buyer/leave-review', $this->data, TRUE);
                
                else {
                    $review = get_mem_review($this->session->mem_id, $id);
                    $review_reply = get_reply($review->id);
                    $res['data'] = '<div class="reviewBlk">
                            <div class="review">
                                <div class="icoBlk">
                                    <div class="ico"><img src="'.get_image_src($review->mem_image, 300, true).'" alt="'.$review->mem_name.'"></div>
                                </div>
                                <div class="txt">
                                    <div class="icoTxt">
                                        <div class="title">
                                            <h4>'.$review->mem_name.'</h4>
                                            <div class="date">'. format_date($review->date).'</div>
                                        </div>
                                        <div class="rateYo" data-rateyo-rating="4" data-rateyo-read-only="true"></div>
                                    </div>
                                    <p>'.$review->comment.'</p>';
                                    if ($review_reply)
                                    $res['data'] .= '<div class="btnBlk">
                                        <h5 class="regular">'.$review_reply->comment.'</h5>
                                    </div>';
                                $res['data'] .= '</div>
                            </div>
                        </div>';
                }
            } else {
                $review = get_mem_review($booking->buyer_id, $id);
                $review_reply = get_reply($review->id);
                if (!$review_reply)
                    $res['data'] = $this->load->view('buyer/leave-review', $this->data, TRUE);
                else {
                    $res['data'] = '<div class="reviewBlk">
                            <div class="review">
                                <div class="icoBlk">
                                    <div class="ico"><img src="'.get_image_src($review->mem_image, 300, true).'" alt="'.$review->mem_name.'"></div>
                                </div>
                                <div class="txt">
                                    <div class="icoTxt">
                                        <div class="title">
                                            <h4>'.$review->mem_name.'</h4>
                                            <div class="date">'. format_date($review->date).'</div>
                                        </div>
                                        <div class="rateYo" data-rateyo-rating="4" data-rateyo-read-only="true"></div>
                                    </div>
                                    <p>'.$review->comment.'</p>
                                    <div class="btnBlk">
                                        <h5 class="regular">'.$review_reply->comment.'</h5>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            }
            $res['status'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function mark_complete_booking()
    {
        $this->isMemLogged('player');
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_top'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $encoded_id = $this->input->post('store');
            $id = intval(substr(doDecode($encoded_id),4));
            $condition = array('mem_type<>' => $this->session->mem_type, 'player_id' => $this->session->mem_id, 'b.status' => 2, 'completed' => 0, 'canceled' => 0, 'on_location' => 1);
            if(!$booking = $this->booking_model->get_booking($id, $condition)){
                $res['msg'] = showMsg('error', 'Something went worng!');
                exit(json_encode($res));
            }

            

            $this->form_validation->set_rules('pee', 'Pee', 'required');
            $this->form_validation->set_rules('poo', 'Poo', 'required');
            $this->form_validation->set_rules('food', 'Food', 'required');
            $this->form_validation->set_rules('water', 'Water', 'required');
            $this->form_validation->set_rules('dog_intraction', 'Dog Intraction', 'required');
            $this->form_validation->set_rules('treat_breaks', 'Treat Breaks', 'required');
            $this->form_validation->set_rules('play_time', 'Play Time', 'required');
            $this->form_validation->set_rules('walk_distance', 'Walk Distance', 'required');
            $this->form_validation->set_rules('walk_time', 'Walk Time', 'required');
            // $this->form_validation->set_rules('pee', 'Pee', 'required|integer', array('integer'=>'Please rate this Booking'));
            $this->form_validation->set_rules('additional_comment', 'Additional Comment', 'required');

            if($this->form_validation->run()===FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $post = html_escape($this->input->post());
                

                $booking_vals = array('pee' => $post['pee'], 'poo' => $post['poo'], 'food' => $post['food'], 'water' => $post['water'], 'dog_intraction' => $post['dog_intraction'], 'treat_breaks' => $post['treat_breaks'], 'play_time' => $post['play_time'], 'walk_distance' => $post['walk_distance'], 'walk_time' => $post['walk_time'], 'image' => $post['image'], 'additional_comment' => $post['additional_comment'], 'buyer_noti' => 1, 'completed' => 1);
                
                $this->booking_model->save($booking_vals, $id);

                $new_images = $this->master->getRows('gallery', array('ref_id' => null, 'ref_type' => 'booking'));
                foreach ($new_images as $key => $img) {
                    if(in_array($img->image, $post['images'])){
                        $image_data = array('ref_id' => $id);
                        $this->master->save('gallery', $image_data, 'id', $img->id);
                    }
                }

                $txt=format_name($this->data["mem_data"]->mem_fname,$this->data["mem_data"]->mem_lname).'. marked as done for '.$booking->service.'\'s job. <a href="'.site_url('booking-detail/'.$encoded_id).'">click here</a> to view booking';

                save_notificaiton($booking->buyer_id, $this->session->mem_id, $txt);


                // $txt='Leave a review for your experience with '.format_name($this->data["mem_data"]->mem_fname,$this->data["mem_data"]->mem_lname).' <a href="javascript:void(0)" class="view-detail" data-store="'.$encoded_id.'" data-link="review-box">click here</a>';
                $txt='Leave a review for your experience with '.format_name($this->data["mem_data"]->mem_fname,$this->data["mem_data"]->mem_lname).' <a href="'.site_url('booking-detail/'.$encoded_id).'">click here</a>';
                save_notificaiton($booking->buyer_id, $this->session->mem_id, $txt);
                $res['msg'] = showMsg('success', 'You mark the appointment completed, Please wait!');
                $res['status'] = 1;
                $res['redirect_url'] = ' ';
            }
            exit(json_encode($res));
        }
        die('access denied');
    }

    function complete_booking()
    {
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_top'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $encoded_id = $this->input->post('store');
            $id = intval(substr(doDecode($encoded_id),4));
            $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 2, 'completed>' => 0, 'canceled' => 0, 'on_location' => 1);
            if(!$row = $this->booking_model->get_booking($id,$condition)){
                $res['msg'] = showMsg('error', 'Something went worng!');
                exit(json_encode($res));
            }
            if ($this->session->mem_type=='buyer') {
                if ($row->completed==2) {
                    $res['msg'] = showMsg('error', 'Something went worng!');
                    exit(json_encode($res));
                }
                $this->form_validation->set_rules('rating', 'Rating', 'required|integer', array('integer'=>'Please rate this Booking'));
            }
            $this->form_validation->set_rules('cmnt', 'Comment', 'required', array('required'=>'Please write comment!'));
            
            if($this->form_validation->run()===FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $post = html_escape($this->input->post());
                if ($this->session->mem_type=='buyer') {
                    $noti_mem = $this->session->mem_type=='player'?'buyer':'player';
                    $booking_vals = array('player_noti' => 1, 'buyer_noti' => 1);
                    if ($post['rating']>5 || $post['rating']<0.1) {
                        $res['msg'] = '<div class="alert alert-danger alert-sm"><strong>Error!</strong> Please rate this booking!</div>';
                        exit(json_encode($res));
                    }

                    $save_data = array('from_id' => $this->session->mem_id, 'ref_id'=>$id, 'ref_type'=>'booking');

                    if(!$this->master->getRow('reviews', $save_data)){
                        $save_data['mem_id'] = $row->player_id;
                        $save_data['rating'] = $post['rating'];
                        $save_data['comment'] = $post['cmnt'];


                        $this->master->save('reviews',$save_data);

                        $txt = format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. reviewed you '.$post['rating'].' stars. <a href="'.site_url('job-detail/'.$encoded_id).'">click here</a> to respond to review of client.';
                        // $txt = format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. reviewed you '.$post['rating'].' stars. <a href="javascript:void(0)" class="view-detail" data-store="'.$encoded_id.'" data-link="review-box">click here</a> to respond to review of client.';

                        save_notificaiton($row->player_id, $this->session->mem_id, $txt);


                        $txt = 'You reviewed '.$row->mem_name.'. '.$post['rating'].' stars. <a href="'.site_url('booking-detail/'.$encoded_id).'" >click here</a> to view booking.';
                        save_notificaiton($this->session->mem_id, $row->player_id, $txt);

                        $this->load->model('transaction_model');

                        $amount = calc_booking_total($row, 'player', true);
                        $trx_id = $this->transaction_model->save(array('mem_id' => $row->player_id, 'booking_id' => $row->id, 'amount' => $amount, 'status' => 0));

                        $booking_vals['completed'] = 2;

                        $res['status'] = 1;
                        $res['msg'] = showMsg('success', 'Review has been saved successfully!');
                        $res['frm_reset'] = 1;
                        $res['redirect_url'] = ' ';
                    }
                } elseif($review = get_mem_review($row->buyer_id, $id)) {
                    $booking_vals = array('buyer_noti' => 1);
                    
                    $save_data = array('from_id' => $this->session->mem_id, 'mem_id' => $this->session->mem_id, 'parent_id' => $review->id, 'ref_id' => $id, 'ref_type' => 'booking');

                    if(!$this->master->getRow('reviews', $save_data)){;
                        $save_data['comment'] = $post['cmnt'];

                        $this->master->save('reviews', $save_data);

                        $txt = format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).' respond to your reviewed <a href="'.site_url('booking-detail/'.$encoded_id).'">click here</a> to view.';
                        // $txt = format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).' respond to your reviewed <a href="javascript:void(0)" class="view-detail" data-store="'.$encoded_id.'" data-link="review-box">click here</a> to view.';

                        save_notificaiton($row->buyer_id, $this->session->mem_id, $txt);

                        $res['status'] = 1;
                        $res['msg'] = showMsg('success', 'Review has been saved successfully!');
                        $res['frm_reset'] = 1;
                        $res['redirect_url'] = ' ';
                    }
                }
                if (!empty($booking_vals))
                    $this->booking_model->save($booking_vals, $id);
            }
            exit(json_encode($res));
        }
        die('access denied');
    }

    function my_players($page = 1)
    {
        $this->isMemLogged('buyer');
        $page = intval($page);
        $per_page = 40;

        $total = $this->booking_model->total_buyer_players();

        $total_pages = ceil($total/$per_page);


        $this->load->library('pagination');
        $this->config->load('pagination');

        $config = $this->config->item('pagination');        
        $config['base_url'] = site_url('my-players');
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $this->pagination->initialize($config); 
        $this->data['links'] = $this->pagination->create_links();

        $start = ($page-1)*$per_page;

        $this->data['rows'] = $this->booking_model->get_buyer_players('', $start, $per_page, 'desc');
        $this->load->view('account/my-players', $this->data);
    }

    function redeem_code()
    {
        $res['status'] = 0;
        if($this->input->post()){
            $post = html_escape($this->input->post());
            $this->load->model('promocode_model');
            if(!$promocode_row=$this->promocode_model->is_valid_promocode($post['code']))
                exit(json_encode($res));
            $res['status']=1;
            $res['amount'] = $promocode_row->amount;
            $res['code_type'] = $promocode_row->code_type;
            $res['code'] = $promocode_row->code;
        }
        exit(json_encode($res));
    }

    function booking_request($encoded_id)
    {
        $this->data['encoded_id'] = $encoded_id;
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id);
        if($this->data['row'] = $this->booking_model->get_booking($id, $condition)) {
            // pr($this->data['row']);
            if ($this->session->mem_type=='player')
                $this->load->view('player/request-detail',$this->data);
            else{
                $this->data['cards'] = $this->payment_methods_model->get_credit_cards($this->sesison->mem_id);;
                $this->load->view('buyer/booking-request', $this->data);
            }
        }
        else
            show_404();
    }

    function accept_booking_request()
    {
        $this->isMemLogged('player');
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 0);
        if($row = $this->booking_model->get_booking($id, $condition)) {

            $this->booking_model->save(array('buyer_noti' => 1, 'status'=>1), $id);
            $txt = format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. has accepted your '.$row->service.' booking request. <a href="'.site_url('request-detail/'.$encoded_id).'">click here</a> to book.';
            save_notificaiton($row->buyer_id, $this->session->mem_id, $txt);

            $res['data'].='<div class="alertDiv accept">Request has been Accepted.</div>';
            $res['status'] = 1;
            $res['reload'] = 0;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function reject_booking_request()
    {
        $this->isMemLogged('player');
        $encoded_id = $this->input->post('store');
        $id = intval(substr(doDecode($encoded_id), 4));
        $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 0);
        if($row = $this->booking_model->get_booking($id, $condition)) {

            $this->booking_model->save(array('buyer_noti' => 1, 'status' => 3), $id);

            $txt='Your '.$row->service.' booking request with '.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. has been declined.';
            save_notificaiton($row->buyer_id, $this->session->mem_id, $txt);

            $res['data'].='<div class="alertDiv reject">Request has been Declined.</div>';
            $res['status'] = 1;
            $res['reload'] = 1;
            exit(json_encode($res));
        }
        die('access denied');
    }

    function book_now($player_id = '')
    {
        $this->isMemLogged('buyer');
        $this->data['encoded_id'] = $player_id;
        if ($this->data['mem_data']->mem_pkg_status==2) {
            steMsg('warning', 'Please select membership to proceed!');
            redirect('membership', 'refresh');
            exit();
        }
        $player_id = intval(doDecode($player_id));
        if($player_row = $this->member_model->get_player($player_id)){
            $this->data['services'] = $this->service_model->get_mem_services($player_row->mem_id);
            if($this->input->post()){
                $post = html_escape($this->input->post());
                $res = array();
                $res['hide_msg'] = 0;
                $res['scroll_to_msg'] = 1;
                $res['status'] = 0;
                $res['frm_reset'] = 0;
                $res['redirect_url'] = 0;

                $this->form_validation->set_message('integer', 'Please select a valid {field}');
                $this->form_validation->set_rules('service', 'service', 'required|integer', array('required' => 'Something went wrong please try again later', 'integer' => 'Something went wrong please try again later'));
                // $this->form_validation->set_rules('zip', 'Zip Code', 'required');
                switch ($post['service']) {
                    case 1:
                        $this->form_validation->set_rules('dropoff_date', 'Drop off Date', 'required|is_min_valid_date');
                        $this->form_validation->set_rules('dropoff_from_time1', 'Drop off From Time', 'required');
                        $this->form_validation->set_rules('dropoff_to_time1', 'Drop off To Time', 'required');
                        $this->form_validation->set_rules('pickup_date', 'Pick Up Date', 'required|is_min_valid_date');
                        $this->form_validation->set_rules('pickup_from_time1', 'Pick Up From Time', 'required');
                        $this->form_validation->set_rules('pickup_to_time1', 'Pick Up To Time', 'required');
                        break;
                    case 2:
                        $this->form_validation->set_rules('start_date', 'Start Date', 'required|is_min_valid_date');
                        $this->form_validation->set_rules('dropoff_from_time2', 'Drop off From Time', 'required');
                        $this->form_validation->set_rules('dropoff_to_time2', 'Drop off To Time', 'required');

                        $this->form_validation->set_rules('end_date', 'End Date', 'required|is_min_valid_date');
                        $this->form_validation->set_rules('pickup_from_time2', 'Pick Up From Time', 'required');
                        $this->form_validation->set_rules('pickup_to_time2', 'Pick Up To Time', 'required');
                        break;
                    case 3:
                        $this->form_validation->set_rules('days_type', 'Day Type', 'required|in_list[one-time,repeat]' , array('required' => 'Something went wrong!', 'in_list' => 'Something went wrong!'));
                        
                        if ($post['days_type']=='one-time') {
                            $this->form_validation->set_rules('dates', 'Dates', 'required', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('times[]', 'Vists', 'required', array('required' => 'Please select {field}!'));

                            $dates = @explode(', ', $post['dates']);
                            if (count($post['times'])!=count($dates)) {
                                $res['msg'] .= showMsg('error', 'Please select at-least one visit for each date');
                            }
                        } else {
                            $this->form_validation->set_rules('days', 'days', 'required|is_in_string', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('times[]', 'Vists', 'required', array('required' => 'Please select {field}!'));
                            $days = @explode(',', $post['days']);

                            if (count($post['times'])!=count($days)) {
                                $res['msg'] .= showMsg('error', 'Please select at-least one visit for each day');
                            }
                        }
                        break;
                    case 4:
                        $this->form_validation->set_rules('days_type', 'Day Type', 'required|in_list[one-time,repeat]' , array('required' => 'Something went wrong!', 'in_list' => 'Something went wrong!'));
                        if ($post['days_type']=='one-time') {
                            $this->form_validation->set_rules('dates', 'Dates', 'required', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('dropoff_times[]', 'Drop off Time', 'required', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('pickup_times[]', 'Pick Up Time', 'required', array('required' => 'Please select {field}!'));

                            $dates = @explode(', ', $post['dates']);
                            if (count($post['pickup_times'])!=count($post['dropoff_times']) || count($post['pickup_times'])!=count($dates)) {
                                $res['msg'] .= showMsg('error', 'Please select Drop Off Time and Pickup Time for each date');
                            }
                        } else {
                            $this->form_validation->set_rules('days', 'days', 'required|is_in_string', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('dropoff_times[]', 'Drop off Time', 'required', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('pickup_times[]', 'Pick Up Time', 'required', array('required' => 'Please select {field}!'));
                            $days = @explode(',', $post['days']);

                            if (count($post['pickup_times'])!=count($post['dropoff_times']) || count($post['pickup_times'])!=count($days)) {
                                $res['msg'] .= showMsg('error', 'Please select Drop Off Time and Pickup Time for each day');
                            }
                        }
                        break;
                    case 5:
                        $this->form_validation->set_rules('days_type', 'Day Type', 'required|in_list[one-time,repeat]' , array('required' => 'Something went wrong!', 'in_list' => 'Something went wrong!'));
                        if ($post['days_type']=='one-time') {
                            $this->form_validation->set_rules('dates', 'Dates', 'required', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('dropoff_times[]', 'Drop off Time', 'required', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('pickup_times[]', 'Pick Up Time', 'required', array('required' => 'Please select {field}!'));

                            $dates = @explode(', ', $post['dates']);
                            if (count($post['pickup_times'])!=count($post['dropoff_times']) || count($post['pickup_times'])!=count($dates)) {
                                $res['msg'] .= showMsg('error', 'Please select Drop Off Time and Pickup Time for each date');
                            }
                        } else {
                            $this->form_validation->set_rules('days', 'days', 'required|is_in_string', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('dropoff_times[]', 'Drop off Time', 'required', array('required' => 'Please select {field}!'));
                            $this->form_validation->set_rules('pickup_times[]', 'Pick Up Time', 'required', array('required' => 'Please select {field}!'));
                            $days = @explode(',', $post['days']);

                            if (count($post['pickup_times'])!=count($post['dropoff_times']) || count($post['pickup_times'])!=count($days)) {
                                $res['msg'] .= showMsg('error', 'Please select Drop Off Time and Pickup Time for each day');
                            }
                        }
                        break;
                }

                $this->form_validation->set_rules('pets', 'Pets', 'required', array('required' => 'Please select a {field}'));
                $this->form_validation->set_rules('detail', 'little info', 'required');

                if($this->form_validation->run()===FALSE)
                    $res['msg'] .= validation_errors();
                    
                if(!$service_row = $this->service_model->get_mem_service($player_id, $post['service']))
                    $res['msg'] .= showMsg('error', 'Please select a valid service');

                $pets = @explode(',', $post['pets']);
                $puppies = $cats = $cats = 0;
                if (count($pets) > 0) {
                    foreach ($pets as $key => $pet) {
                        if(!$pet_row = $this->pet_model->get_row_where(array('mem_id' => $this->session->mem_id, 'id' => $pet))) {
                            $res['msg'] .= showMsg('error', 'Invalid pets, Please select valid pets');
                            break;
                        }

                        if($pet_row->pet_type=='dog' && empty($pet_row->age_year) && !empty($pet_row->age_month))
                            $puppies++;
                        else if($pet_row->pet_type=='cat')
                            $cats++;
                        else
                            $dogs++;
                    }
                }

                if (!empty($res['msg']))
                    exit(json_encode($res));

                $dates_row = $this->master->fetch_row("SELECT GROUP_CONCAT(CONCAT(month, '/', date, '/', YEAR(CURDATE()))) as dates FROM `tbl_holidays` where month >= MONTH(CURDATE())");
                $holiday_dates = $dates_row->dates!=''?explode(',', $dates_row->dates):array();

                $save_data = array('player_id' => $player_id, 'buyer_id' => $this->session->mem_id, 'service_id' => $post['service'], 'pets' => $post['pets'], 'puppies' => $puppies, 'dogs' => $dogs, 'cats' => $cats, 'detail' => $post['detail'], 'player_noti' => 1, 'date' => date("Y-m-d H:i:s"));

                $save_data['site_percentage'] = $this->data['site_settings']->site_percentage;
                $save_data['site_commission'] = $this->data['site_settings']->site_commission;
                $save_data['rate'] = $service_row->price;
                $save_data['cat_care_rate'] = $service_row->cat_care_rate;
                $save_data['additional_dog_rate'] = $service_row->additional_dog_rate_plus;
                $save_data['puppy_rate'] = $service_row->puppy_rate;
                $save_data['cat_rate'] = $service_row->cat_care_rate;
                $save_data['additional_cat_rate'] = $service_row->additional_cat_rate_plus;
                $save_data['holiday_rate'] = $service_row->holiday_rate;
                $save_data['extended_stay_rate'] = $service_row->extended_stay_rate;


                if (!empty($post['pickdrop_extra']))
                    $save_data['pickup_extra'] = $service_row->pick_drop_rate_plus;
                if (!empty($post['bathgroom_extra']) && empty($service_row->bathing_is_free)) {
                    $save_data['bathing_extra'] = $service_row->bathing_rate_plus;
                }
                if (!empty($post['playdate_extra']) && $this->data['services'][count($this->data['services'])-1]->id == 5) {
                    $save_data['play_dates_exta'] = $this->data['services'][count($this->data['services'])-1]->price;
                }
                if (!empty($post['sixty_minut_extra']))
                    $save_data['sixty_minuts_extra'] = $service_row->sixty_minute_rate_plus;
                $save_data['receive_photos'] = $post['photos'];

                $save_data['holidays'] = '';
                $save_data['num_holidays'] = $save_data['num_stays'] = 0;
                switch ($post['service']) {
                    case 1:
                        $save_data['start_date'] = $post['dropoff_date'];
                        $save_data['dropoff_from_time'] = $post['dropoff_from_time1'];
                        $save_data['dropoff_to_time'] = $post['dropoff_to_time1'];

                        $save_data['end_date'] = $post['pickup_date'];
                        $save_data['pickup_from_time'] = $post['pickup_from_time1'];
                        $save_data['pickup_to_time'] = $post['pickup_to_time1'];

                        $save_data['num_stays'] = get_dates_days($post['dropoff_date'], $post['pickup_date']);

                        $between_dates = get_between_dates($save_data['start_date'], $save_data['end_date']);
                        foreach ($between_dates as $key => $date) {
                            if (in_array($date, $holiday_dates)) {
                                $save_data['num_holidays']++;
                                $save_data['holidays'] .= $date.',';
                            }
                        }
                        $save_data['holidays'] = rtrim($save_data['holidays'], ',');

                        $total_stays = $save_data['num_stays']-$save_data['num_holidays'];
                        if ($total_stays>$service_row->extended_stay_days) {
                            $save_data['extended_stays'] = $total_stays-$service_row->extended_stay_days;
                        }

                        break;
                    case 2:
                        $save_data['start_date'] = $post['start_date'];
                        $save_data['dropoff_from_time'] = $post['dropoff_from_time2'];
                        $save_data['dropoff_to_time'] = $post['dropoff_to_time2'];

                        $save_data['end_date'] = $post['end_date'];
                        $save_data['pickup_from_time'] = $post['pickup_from_time2'];
                        $save_data['pickup_to_time'] = $post['pickup_to_time2'];

                        $save_data['num_stays'] = get_dates_days($post['start_date'], $post['end_date']);

                        $between_dates = get_between_dates($save_data['start_date'], $save_data['end_date']);
                        foreach ($between_dates as $key => $date) {
                            if (in_array($date, $holiday_dates)) {
                                $save_data['num_holidays']++;
                                $save_data['holidays'] .= $date.',';
                            }
                        }
                        $save_data['holidays'] = rtrim($save_data['holidays'], ',');

                        $total_stays = $save_data['num_stays']-$save_data['num_holidays'];
                        if ($total_stays>$service_row->extended_stay_days) {
                            $save_data['extended_stays'] = $total_stays-$service_row->extended_stay_days;
                        }

                        break;
                    case 3:
                        $save_data['days_type'] = $post['days_type'];
                        $save_data['visits'] = json_encode($post['times']);

                        if ($post['days_type']=='one-time') {
                            $save_data['start_date'] = $dates[0];
                            $save_data['dates'] = $post['dates'];
                            foreach ($dates as $key => $date) {
                                foreach ($post['times'][$key] as $tkey => $time) {
                                    $save_data['num_stays'] += count($time[$tkey]);
                                }
                                if (in_array($date, $holiday_dates)) {
                                    foreach ($post['times'][$key] as $tkey => $time) {
                                        $save_data['num_holidays'] += count($time[$tkey]);
                                    }
                                    $save_data['holidays'] .= $date.',';
                                }
                            }
                            $save_data['holidays'] = rtrim($save_data['holidays'], ',');
                        } else {
                            $save_data['days'] = $post['days'];
                            $days = @explode(',', $post['days']);
                            foreach ($days as $key => $days) {
                                foreach ($post['times'][$key] as $tkey => $time) {
                                    $save_data['num_stays'] += count($time[$tkey]);
                                }
                            }
                        }
                        $total_stays = $save_data['num_stays']-$save_data['num_holidays'];
                        if ($total_stays>$service_row->extended_stay_days) {
                            $save_data['extended_stays'] = $total_stays-$service_row->extended_stay_days;
                        }
                        break;
                    case 4:
                        $save_data['days_type'] = $post['days_type'];
                        $save_data['dropoff_times'] = json_encode($post['dropoff_times']);
                        $save_data['pickup_times'] = json_encode($post['pickup_times']);

                        if ($post['days_type']=='one-time') {
                            $save_data['start_date'] = $dates[0];
                            $save_data['dates'] = $post['dates'];
                            foreach ($dates as $key => $date) {
                                $save_data['num_stays'] ++;
                                if (in_array($date, $holiday_dates)) {
                                    $save_data['num_holidays']++;
                                    $save_data['holidays'] .= $date.',';
                                }
                            }
                            $save_data['holidays'] = rtrim($save_data['holidays'], ',');
                        } else {
                            $save_data['days'] = $post['days'];
                            $days = @explode(',', $post['days']);
                            foreach ($days as $key => $days) {
                                $save_data['num_stays'] ++;
                            }
                        }
                        break;
                    case 5:
                        $save_data['days_type'] = $post['days_type'];
                        $save_data['dropoff_times'] = json_encode($post['dropoff_times']);
                        $save_data['pickup_times'] = json_encode($post['pickup_times']);

                        if ($post['days_type']=='one-time') {
                            $save_data['start_date'] = $dates[0];
                            $save_data['dates'] = $post['dates'];
                            foreach ($dates as $key => $date) {
                                $save_data['num_stays'] ++;
                                if (in_array($date, $holiday_dates)) {
                                    $save_data['num_holidays']++;
                                    $save_data['holidays'] .= $date.',';
                                }
                            }
                            $save_data['holidays'] = rtrim($save_data['holidays'], ',');
                        } else {
                            $save_data['days'] = $post['days'];
                            $days = @explode(',', $post['days']);
                            foreach ($days as $key => $days) {
                                $save_data['num_stays'] ++;
                            }
                        }
                        break;
                }
                    
                $booking_id = $this->booking_model->save($save_data);
                $encoded_id = doEncode('bkg-'.$booking_id);
                $this->booking_model->save(array('encoded_id' => $encoded_id),$booking_id);

                $txt = 'You have a new '.$service_row->title.' booking request from '.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. <a href="'.site_url('request-detail//'.$encoded_id).'">click here</a> to view detail.';
                save_notificaiton($player_id, $this->session->mem_id, $txt);

                $res['msg'] = showMsg('success', 'Booking request has been sent successfully!');
                $res['redirect_url'] = site_url('dashboard');
                $res['status'] = 1;
                $res['frm_reset'] = 1;
                exit(json_encode($res));
            }else{
                $this->data['row'] = $player_row;
                $this->data['help_questions'] = $this->master->getRows("tbl_help", array("is_book_now" => 1), 0, 2);

                $this->data['policies'] = array();
                $policies = $this->master->getRows("policies");
                foreach ($policies as $key => $policy) {
                    $this->data['policies'][$policy->title] = $policy->detail;
                }

                $player_days = $this->master->fetch_row("select group_concat(day) as days from tbl_player_timings where mem_id=$player_id and available=0");

                $dates_row = $this->master->fetch_row("SELECT GROUP_CONCAT(CONCAT(YEAR(CURDATE()),'-',month,'-', date)) as dates FROM `tbl_holidays` where month >= MONTH(CURDATE())");
                $this->data['dates'] = $dates_row->dates!=''?explode(',', $dates_row->dates):array();
                if(!empty($player_days->days)) {
                    $player_days->days = @explode(',', $player_days->days);
                    $not_avail_days = '';
                    foreach ($player_days->days as $key => $day) {
                        $not_avail_days.=date('w', strtotime($day)).',';
                    }
                    $this->data['not_avail_days'] = $not_avail_days;
                }
                
                $this->load->model('package_model');
                $this->data['pkg_row'] = $this->package_model->get_row_where(array('membership' => 1, 'id' => $this->data['row']->mem_package_id));

                $this->data['pets'] = $this->pet_model->get_mem_pets(array("p.mem_id" => $this->session->mem_id), '', '', 'asc', 'p.name');
                $this->load->model('breed_model');
                $this->data['pet_breeds'] = $this->breed_model->get_rows();

                $this->data['mem_reviews'] = get_mem_reviews($player_id);
                $this->data['avg_mem_rating'] = get_avg_mem_rating($player_id);
                $this->data['review_count'] = count($this->data['mem_reviews']);

                $this->load->view("buyer/book-now", $this->data);
            }
        }
        else
            show_404();
    }

    function confirm_booking()
    {
        $this->isMemLogged('buyer');
        if ($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $post = html_escape($this->input->post());

            $this->form_validation->set_rules('store', 'Store', 'required', array('required'=>'Something went wrong!'));
            if (empty($post['card'])){
                $this->form_validation->set_rules('nonce', 'Nonce', 'required', array('required' => "Something went wrong!"));
            }
            else
                $this->form_validation->set_rules('card', 'Card', 'required', array('required' => 'Please Select Save Card!'));
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('city', 'State', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('zip', 'Zip Code', 'required');
            $this->form_validation->set_rules('confirm', 'Confirm', 'required|in_list[true]', array('in_list' => 'Please accept our terms of conditions and privacy policy'));
            if($this->form_validation->run()===FALSE)
            {
                $res['msg'] = validation_errors();
            }else{

                $encoded_id = $post['store'];
                $id = intval(substr(doDecode($encoded_id),4));
                $condition = array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id, 'b.status' => 1);
                if(!$row = $this->booking_model->get_booking($id, $condition)){
                    $res['msg'] = showMsg('error', 'Something went worng!');
                    exit(json_encode($res));
                }
                $this->load->model('payment_methods_model');
                if (empty($post['card'])){
                    if(!$payment_method=$this->my_stripe->create_payment_method($this->data['mem_data']->mem_stripe_id, $post['nonce'])){
                        $res['msg'] =showMsg("error", "Something went wrong, Please try again latter!");
                        exit(json_encode($res));
                    }

                    $last_digits = $payment_method->last4;
                    $method_token = $payment_method->id;
                    $expiry = get_month_name($payment_method->exp_month).', '.$payment_method->exp_year;
                    $image = str_replace(' ', '-', strtolower($payment_method->brand)).'.png';

                    $save_data = array('mem_id' => $this->session->mem_id, 'last_digits' => $last_digits, 'expiry' => $expiry, 'method_token' => $method_token, 'image' => $image);
                
                    $method_id = $this->payment_methods_model->save($save_data);
                    $this->payment_methods_model->save(array('encoded_id' => doEncode('pm-'.$method_id)), $method_id);
                }
                else
                    $method_id = intval(substr(doDecode($post['card']), 3));


                if(!$method_row = $this->payment_methods_model->get_mem_method($method_id)) {
                    $res['msg']=showMsg('error', 'Please select valid saved card!');
                    exit(json_encode($res));
                }

                $save_data = array('player_noti' => 1, 'status' => 2, 'bill_country' => $post['country'], 'bill_address' => $post['address'], 'bill_apt' => $post['apt'], 'bill_city' => $post['city'], 'bill_state' => $post['state'], 'bill_zip' => $post['zip']);
                $amount = calc_booking_total($row, 'buyer', true);
                $this->load->model('promocode_model');
                if(!empty($post['promocode'])){
                    if(!$promocode_row=$this->promocode_model->is_valid_promocode($post['promocode'])) {
                        $res['msg'] = showMsg('error', 'Invalid promo code!');
                        exit(json_encode($res));
                    }
                    $discount = $promocode_row->code_type=='fixed'?floatval($promocode_row->amount):floatval(round(($amount*$promocode_row->amount)/100,2));
                    $amount-=$discount;

                    $save_data['discount_amount'] = $discount;
                    $save_data['discount_code'] = $promocode_row->code;
                }

                $charge = $this->my_stripe->charge($this->data['mem_data']->mem_stripe_id, $method_row->method_token, $amount, "Charge for booking id ".$row->id);
                if(empty($charge)){
                    $res['msg']=showMsg('error', 'Something went worng please try again later!');
                    exit(json_encode($res));
                }

                $this->load->model('transaction_model');
                $trx_id = $this->transaction_model->save(array('mem_id' => $this->session->mem_id, 'booking_id' => $id, 'amount' => $amount, 'status' => 1, 'note' => "{$row->service} with {$row->mem_name}", 'charge_id' => $charge));
                if(!empty($post['promocode']) && $promocode_row)
                    $this->promocode_model->update_code_used($promocode_row->id);

                $this->booking_model->save($save_data, $id);
                $txt = 'Your '.$row->service.' with '.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'. has been confirmed! You can view your upcoming job in <a href="'.site_url('jobs').'">My Jobs</a>.';
                save_notificaiton($row->player_id, $this->session->mem_id, $txt);
                $txt = 'Pet has been booked!';
                save_notificaiton($row->buyer_id, $row->player_id, $txt);

                $res['msg'] = showMsg('success', "Booking has been Confirmed!");
                $res['status'] = 1;
                $res['redirect_url'] = ' ';
            }
            exit(json_encode($res));
        }
        die('access denied!');
    }
    */
}
?>