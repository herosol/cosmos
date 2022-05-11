<?php

class Messages extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->isMemLogged($this->session->mem_type);
        $this->load->model('member_model');
        $this->load->model('chat_model');
    }

    function msg()
    {
        $this->load->view("account/messages", $this->data);
    }

    function index($id = '')
    {
        $chat_row = NULL;
        $this->data['msg_header'] = $this->chat_model->get_mem_msgs_list($this->session->mem_id);
        $mem_id = intval(doDecode($id));
        if($mem_id != $this->session->mem_id){
            if($id != '' && !$this->data['sender_row'] = $this->member_model->getMember($mem_id)) {
                show_404();
            }
            if($id == '') {
                $mem_id = $this->session->mem_id == $this->data['msg_header'][0]->mem_one ? $this->data['msg_header'][0]->mem_two : $this->data['msg_header'][0]->mem_one;
                $this->data['sender_row'] = $this->member_model->getMember($mem_id);
                $this->chat_model->mark_seen_all($this->data['msg_header'][0]->id);
                $this->data['msgs_rows'] = $this->chat_model->get_chat_msgs($this->data['msg_header'][0]->id);
            } else {
                $this->data['is_push'] = $id;
                if ($this->data['sender_row']->mem_type==$this->session->mem_type) {
                    redirect('dashboard', 'refresh');
                    exit;
                }
                $chat_row = $this->chat_model->have_chat($mem_id);
                $chat_id = ($chat_row && $id != '') ? $chat_row->id : 0;
                $this->chat_model->mark_seen_all($chat_id);
                $this->data['msgs_rows'] = $this->chat_model->get_chat_msgs($chat_id);
            }

            $this->data['encoded_id'] = doEncode($this->data['sender_row']->mem_id);
            $this->load->view("account/messages", $this->data);
        }
        else
            redirect('messages');
    }

    function send_msg()
    {
        $vals = html_escape($this->input->post());
        $mem_id = intval(doDecode($vals['store']));
        if($this->input->post() && $this->member_model->getMember($mem_id)){
            $res = array();
            $res['status'] = 0;

            if(($vals['msg'] != '' || count($vals['attachs']) > 0)) {

                $msg_data['sender_id'] = $this->session->mem_id;
                $msg_data['msg'] = $vals['msg'];
                $msg_data['status'] = 'new';
                $msg_data['time'] = date("Y-m-d H:i:s");
                $msg_data['no_deleted'] = $mem_id.','.$this->session->mem_id;

                if($chat_row = $this->chat_model->have_chat($mem_id)) {
                    $msg_data['chat_id'] = $this->chat_model->save(array('time' => $msg_data['time']), $chat_row->id);
                } else {
                    $msg_data['chat_id'] = $this->chat_model->save(array('mem_one' => $this->session->mem_id, 'mem_two' => $mem_id, 'time' => $msg_data['time']));
                }
                $msg_id = $this->chat_model->save_msg($msg_data);

                $attachs = array();
                $attach_data = array('msg_id' => $msg_id);
                if(count($vals['attachs']) > 0 && $vals['attachs'][0] != '') {
                    foreach ($vals['attachs'] as $key => $file) {
                        if($file == '') continue;
                        $file_names = @explode(',', $file);

                        if (!empty($file_names) && count($file_names) == 2) {
                            $attach_data['attachment'] = $file_names[0];
                            $attach_data['att_name'] = $file_names[1];
                            $this->chat_model->save_attachment($attach_data);
                            $attachs[] = $attach_data;
                        } else {
                            $this->remove_attachments($msg_id);
                            $this->master->delete('chat_msgs', 'id', $msg_id);
                            $this->master->delete('chat_attachments', 'msg_id', $msg_id);

                            $res['msg'] = 'Error in uploading!';
                            exit(json_encode($res));
                        }
                    }
                }
                $res['msg'] = '<div class="buble me"><div class="ico"><a href="'. profile_url($this->data['mem_data']->mem_id, format_name($this->data['mem_data']->mem_fname, $this->data['mem_data']->mem_lname)).'"><img src="'.get_image_src($this->data['mem_data']->mem_image, 50, true).'" alt=""></a></div><div class="cntnt"><div class="time">'.format_date($msg_data['time'], 'h:i a - F d, Y').'</div>'.nl2br($msg_data['msg']);

                if(count($attachs) > 0) {
                    $res['msg'] .= '<div class="atch">';
                    foreach($attachs as $index => $attch) {
                        $res['msg'] .= '<span><a href="'.SITE_VPATH.'attachments/'.$attch['attachment'].'" target="_blank"><i class="fi-link"></i>  '.$attch['att_name'].'</a></span> ';
                    }
                    $res['msg'] .= '</div>';
                }

                $res['msg'] .= '</div></div>';
                $res['time'] = 'just now';
                $res['sidemsg'] = $msg_data['msg'] == '' && count($attachs) > 0 ? '<i class="fa fa-paperclip"></i> Attachment' : $msg_data['msg'];
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }
        die('access denied!');
    }

    function send_noti_msg()
    {
        $this->load->model('booking_model');
        $post = html_escape($this->input->post());
        $mem_id = intval(doDecode($post['store']));

        $encoded_id = $post['booking'];
        $booking_id = intval(substr(doDecode($encoded_id), 4));
        if ($this->session->mem_type == 'buyer') {
            $buyer_id = $this->session->mem_id;
            $player_id = $mem_id;
        } else {
            $buyer_id = $mem_id;
            $player_id = $this->session->mem_id;
        }
        $condition = array('mem_type<>' => $this->session->mem_type, 'buyer_id' => $buyer_id, 'player_id' => $player_id, 'b.status' => 1);

        if($this->input->post() && $this->member_model->getMember($mem_id) && $row = $this->booking_model->get_booking($booking_id, $condition)){
            $res = array();
            $res['status'] = 0;

            $msg_data['sender_id'] = $this->session->mem_id;
            $msg_data['msg'] = '';
            $msg_data['msg_type'] = 'booking';
            $msg_data['status'] = 'new';
            $msg_data['time'] = date("Y-m-d H:i:s");
            $msg_data['no_deleted'] = $mem_id.','.$this->session->mem_id;

            if($chat_row = $this->chat_model->have_chat($mem_id)) {
                $msg_data['chat_id'] = $this->chat_model->save(array('time' => $msg_data['time']), $chat_row->id);
            }else{
                $msg_data['chat_id'] = $this->chat_model->save(array('mem_one' => $this->session->mem_id, 'mem_two' => $mem_id, 'time' => $msg_data['time']));
            }
            $msg_id = $this->chat_model->save_msg($msg_data);

            $txt = '';
            if($row->status == 0) {
                $get_player_details = $this->member_model->get_row($player_id, 'mem_id');
                $format_name = format_name($get_player_details->mem_fname, $get_player_details->mem_lname);
                $txt = '<a href="javascript:void(0)" class="blk bookingLnk view-detail" data-link="get-request-detail" data-image="'.$get_player_details->mem_image.'" data-name="'.$format_name.'" data-mem="'.$get_player_details->mem_id.'" data-store="'.$encoded_id.'"><strong>'.format_name($this->data['mem_data']->mem_fname, $this->data['mem_data']->mem_lname).'</strong> scheduled a booking<span class="date">click to view</span></a>';
                $this->chat_model->save_chat_booking(array('mem_id' => $mem_id, 'msg_id' => $msg_id, 'txt' => $txt));
                
                $txt = '<a href="javascript:void(0)" class="blk bookingLnk view-detail" data-link="get-request-detail" data-image="'.$get_player_details->mem_image.'" data-name="'.$format_name.'" data-mem="'.$get_player_details->mem_id.'" data-store="'.$encoded_id.'">You requested a booking<span class="date">click to view</span></a>';
                $this->chat_model->save_chat_booking(array('mem_id' => $this->session->mem_id, 'msg_id' => $msg_id, 'txt' => $txt));
                $res['msg'] = $txt;
            }else{
                if ($this->session->mem_type == 'player' && $post['type'] == 'tt') {
                    $txt = '<a href="javascript:void(0)" class="blk bookingLnk view-detail" data-link="get-request-detail" data-store="'.$encoded_id.'"><strong>'.format_name($this->data['mem_data']->mem_fname, $this->data['mem_data']->mem_lname).'</strong> scheduled a booking for you<span class="date">click to view</span></a>';
                    $this->chat_model->save_chat_booking(array('mem_id' => $mem_id, 'msg_id' => $msg_id, 'txt' => $txt));

                    $txt='<a href="javascript:void(0)" class="blk bookingLnk view-detail" data-link="get-request-detail" data-store="'.$encoded_id.'">You schedule a booking<span class="date">click to view</span></a>';
                    $this->chat_model->save_chat_booking(array('mem_id' => $this->session->mem_id, 'msg_id' => $msg_id, 'txt' => $txt));
                    $res['msg'] = $txt;
                } else {
                    $txt = '<a href="javascript:void(0)" class="blk bookingLnk view-detail" data-store="'.$encoded_id.'" data-link="get-request-detail"><strong>'.format_name($this->data["mem_data"]->mem_fname, $this->data["mem_data"]->mem_lname).'</strong> Accepted your request!<span class="date">click to book booking</span></a>';
                    $this->chat_model->save_chat_booking(array('mem_id' => $row->buyer_id, 'msg_id' => $msg_id, 'txt' => $txt));
                }
            }
            
            $res['status'] = 1;
            exit(json_encode($res));
        }
        print_query();
        die('access denied!');
    }

    function get_chat_msgs()
    {
        $vals = html_escape($this->input->post());
        $mem_id = intval(doDecode($vals['store']));
        if($mem_row = $this->member_model->getMember($mem_id)){
            $res = array();
            $res['status'] = 1;

            if($chat_row = $this->chat_model->have_chat($mem_id)){

                $msgs = $this->chat_model->get_new_msgs($chat_row->id);
                foreach ($msgs as $msg_row) {
                    $this->chat_model->mark_seen($msg_row->id);
                    if($msg_row->msg_type == 'booking') {
                        $chat_booking = $this->chat_model->get_chat_booking($msg_row->id, $this->session->mem_id);
                        $res['msg'] .= $chat_booking->txt;
                        continue;
                    }

                    $attachments = $this->chat_model->get_attachments($msg_row->id);

                    $res['msg'].='<div class="buble you"><div class="ico"><a href="'. profile_url($mem_row->mem_id, $mem_row->mem_fname.' '.$mem_row->mem_lname).'"><img src="'.get_image_src($mem_row->mem_image, 50, true).'" alt=""></a></div><div class="cntnt"><div class="time">'.format_date($msg_row->time, 'h:i a - F d, Y').'</div>'.nl2br($msg_row->msg);

                    if(count($attachments)>0){
                        $res['msg'] .= '<div class="atch">';
                        foreach($attachments as $index => $attch){
                            $res['msg'] .= '<span><a href="'.SITE_VPATH.'attachments/'.$attch->attachment.'" target="_blank"><i class="fi-link"></i>  '.$attch->att_name.'</a></span> ';
                        }
                        $res['msg'] .= '</div>';
                    }

                    $res['msg'] .= '</div></div>';
                }
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }
        die('access denied!');
    }

    function remove_attachments($msg_id)
    {
        if($rows = $this->chat_model->get_attachments($msg_id)) {
            /*foreach ($rows as $key => $row) {
                curl_call(SCONTENT_SITE.'ajax/remove_file', "image=".$row->attachment."&pk_key=".doEncode($this->data['mem_data']->mem_token));
            }*/
            foreach ($rows as $key => $row) {
                $attach_arr[] = $row->attachment;
            }
            $query = http_build_query(array('attachs' => $attach_arr));
            return curl_call(SCONTENT_SITE.'ajax/remove_attachments',$query."&pk_key=".doEncode($this->data['mem_data']->mem_token));
        }
        else
            show_404();
    }
}

?>