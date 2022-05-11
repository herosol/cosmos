<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use Twilio\Rest\Client;
class Account extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
        // $this->load->model('package_model');
    }

    function dashboard()
    {
        $this->isMemLogged($this->session->mem_type);
        // $this->data['pkg_row'] = $this->package_model->get_row($this->data['mem_data']->mem_package_id);
        $this->load->model('booking_model');
        $this->load->model('transaction_model');
        $this->data['bookings'] = $this->booking_model->get_type_bookings('dashboard', array('mem_type<>' => $this->session->mem_type, $this->session->mem_type.'_id' => $this->session->mem_id));
        if($this->session->mem_type == 'buyer') {
            $this->data['total_completed_vacays'] = $this->booking_model->total_type_bookings('completed', array('player_id' => $this->session->mem_id, 'm.mem_type' => 'buyer'));
            $this->data['total_spending'] = $this->transaction_model->get_total_spending($this->session->mem_id);
            $this->load->view("buyer/dashboard", $this->data);
        } else {
            $this->data['avg_mem_rating'] = get_avg_mem_rating($this->session->mem_id);
            $this->data['review_count'] = count_mem_reviews($this->session->mem_id);

            // $this->data['pkg_row'] = $this->package_model->get_row_where(array('membership' => 1, 'id' => $this->data['mem_data']->mem_package_id));
            // pr($this->data['pkg_row']);

            $this->data['total_completed_vacays'] = $this->booking_model->total_type_bookings('completed', array('player_id' => $this->session->mem_id, 'm.mem_type' => 'player'));
            $this->data['total_earning'] = $this->transaction_model->get_total_earnings($this->session->mem_id);
            $this->load->view("player/dashboard", $this->data);
        }
    }

    function become_pet_buyer()
    {
        $this->isMemLogged('buyer', true, false, array('buyer'), false);
        if($this->data['mem_data']->mem_become_buyer > 0) {
            redirect('dashboard');
            exit;
        }
        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $res['msg'] = '';

            $this->form_validation->set_message('integer', 'Please select a valid {field}');

            $this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('address1', 'Address 1', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required|integer');
            $this->form_validation->set_rules('state', 'State', 'required', array('required' => 'Please select a {field}'));
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('zip', 'Zip Code', 'required');

            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('contact_name', 'Contact Name', 'required');
            $this->form_validation->set_rules('contact_phone', 'Contact Phone', 'required');

            $post = html_escape($this->input->post());
            if($this->form_validation->run()===FALSE)
                $res['msg'] = validation_errors();

            if(!empty($post['state']) && !$this->master->getRow('states', array('code' => $post['state'])))
                $res['msg'] .= showMsg('error', 'Please select a valid State!');
            if (!empty($post['email']) && $this->member_model->emailExists($post['email'],$this->session->mem_id))
                $res['msg'] .= showMsg('error', 'Email already in use, Please try another!');
            if (!empty($post['phone']) && $this->member_model->phoneExists($post['phone'], $this->session->mem_id))
                $res['msg'] .= showMsg('error', 'Phone already in use, Please try another!');
            if (empty($this->data['mem_data']->mem_phone_verified))
                $res['msg'] .= showMsg('error', 'Please verify your Phone!');

            if (!empty($res['msg']))
                exit(json_encode($res));

            if(!empty($post['zip']) && $this->data['mem_data']->mem_zip != $post['zip']) {
                $coordinates = get_location_detail($post['zip']);
                $data['mem_map_lat'] = $coordinates->Latitude;
                $data['mem_map_lng'] = $coordinates->Longitude;
            }

            /*
            if(!empty($post['email']) && $this->data['mem_data']->mem_email!=$post['email']){
                $rando=doEncode($this->session->mem_id.'-'.$post['email']).rand(99,999);
                $data['mem_code'] = $rando;
                $data['mem_verified'] = 0;

                $verify_link = site_url('verification/' .$rando);

                $mem_data = array('name'=>ucwords($post['fname'].' '.$post['lname']),"email"=>$post['email'],"link"=>$verify_link);
                $this->send_site_email($mem_data, 'change_email');
                setMsg('info',getSiteText('alert', 'verify_email'));
                $res['redirect_url'] = site_url('email-verification');
            }
            */

            $data = array('mem_fname' => ucfirst($post['fname']), 'mem_lname' => ucfirst($post['lname']), 'mem_company' => $post['company'], 'mem_state' => $post['state'], 'mem_city' => ucwords($post['city']), 'mem_zip' => $post['zip'], 'mem_address1' => $post['address1'], 'mem_address2' => $post['address2'], 'mem_contact_name' => ucfirst($post['contact_name']), 'mem_contact_phone' => $post['contact_phone'], 'mem_become_buyer' => 1);



            $this->load->library('my_stripe');
            $this->my_stripe->save_customer(array('name' => ucfirst($post['fname']).' '.ucfirst($post['lname']), 'email' => $post['email'], 'phone' => $this->data['mem_data']->mem_phone, 'description' => $this->data['site_settings']->site_name." Customer ".ucfirst($post['fname']).' '.ucfirst($post['lname'])), $this->data['mem_data']->mem_stripe_id);

            if(!empty($post['zip']) && $this->data['mem_data']->mem_zip != $post['zip'] && $this->session->mem_type==='player') {
                $coordinates = get_location_detail($post['zip']);
                $data['mem_map_lat'] = $coordinates->Latitude;
                $data['mem_map_lng'] = $coordinates->Longitude;
            }
            $this->member_model->save($data, $this->session->mem_id);

            $res['msg'] = showMsg('success', 'Profile saved successfully!');
            $res['redirect_url'] = site_url("membership");
            $res['status'] = 1;
            $res['hide_msg'] = 1;
            exit(json_encode($res));
        }
        else
            $this->load->view("buyer/buyer-signup", $this->data);
    }

    function membership() {
        // $this->isMemLogged('buyer', true, true, array('buyer'), false);
        $this->isMemLogged($this->session->mem_type, true, false, array('buyer', 'player'), false);
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'membership'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);

        // $this->data['packages'] = $this->package_model->get_rows(array('type' => $this->session->mem_type));
        $view = $this->session->mem_type=='player'?'player/become-player':"buyer/membership";
        $this->load->view($view, $this->data);
    }

    function cancel_membership()
    {
        $this->isMemLogged($this->session->mem_type);
        $this->member_model->save(array('mem_membership_auto' => 0), $this->session->mem_id);
        $this->load->library('my_stripe');
        $this->my_stripe->subscription_cancel($this->data['mem_data']->mem_subscription_id);
        exit('1');
    }
    
    function account_settings()
    {
        $this->isMemLogged($this->session->mem_type);
        $this->load->model('character_model');
        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $post = html_escape($this->input->post());

            $this->form_validation->set_message('integer', 'Please select a valid {field}');
            $this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
            $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

            if ($this->session->mem_type=='player') {
                $this->form_validation->set_rules('profile_heading', 'Nickname', 'required|alpha');
                $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
                $this->form_validation->set_rules('rate', 'Rate', 'required|numeric', array('numeric' => '{field} should be numeric'));
                $this->form_validation->set_rules('availability[]', 'Areas of Availability', 'required');
                $this->form_validation->set_rules('profile_bio', 'Profile Bio', 'required');
                $this->form_validation->set_rules('fb_link', 'Facebook', 'valid_url');
                $this->form_validation->set_rules('instagram_link', 'Instagram', 'valid_url');

                $this->form_validation->set_rules('characters[]', 'Characters', 'required|integer');
                $this->form_validation->set_rules('images[]', 'Image', 'required', array('required' => 'Please Select at-least one {field}'));
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
            }
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('city', 'City or State', 'required');
            $this->form_validation->set_rules('zip', 'Zip Code', 'required');
            $this->form_validation->set_rules('country', 'Country', 'required|integer');


            if($this->form_validation->run() === FALSE)
                $res['msg'] = validation_errors();
                    
            if(!empty($post['country']) && !$this->master->getRow('countries', array('id' => intval($post['country']))))
                $res['msg'] .= showMsg('error', 'Please select a valid Country!');
            if (!empty($post['email']) && $this->member_model->emailExists($post['email'], $this->session->mem_id))
                $res['msg'] .= showMsg('error', 'Email already in use, Please try another!');

            if (!empty($res['msg']))
                exit(json_encode($res));

            $data = array('mem_fname' => ucfirst($post['fname']), 'mem_lname' => ucfirst($post['lname']), 'mem_company' => $post['company'], 'mem_address1' => $post['address'], 'mem_city' => $post['city'], 'mem_zip' => $post['zip'], 'mem_country_id' => intval($post['country']));

            if ($this->session->mem_type == 'player') {
                $data = array('mem_fname' => ucfirst($post['fname']), 'mem_lname' => ucfirst($post['lname']), 'mem_profile_heading' => ucfirst($post['profile_heading']), 'mem_dob' => db_format_date($post['dob']), 'mem_rate' => floatval($post['rate']), 'mem_address1' => $post['address'], 'mem_city' => $post['city'], 'mem_zip' => $post['zip'], 'mem_country_id' => intval($post['country']), 'mem_about' => $this->input->post('profile_bio'), 'mem_characters' => $characters, 'mem_availability' => $availability, 'mem_fb_link' => $post['fb_link'], 'mem_instagram_link' => $post['instagram_link']);

                $this->master->update('gallery', array('main' => 0), array('mem_id' => $this->session->mem_id, 'ref_type' => 'character'));
                foreach ($post['characters'] as $key => $character) {
                    $images = $this->master->getRows('gallery', array('ref_id' => $character, 'ref_type' => 'character', 'mem_id' => $this->session->mem_id));
                    $counter = 0;
                    foreach ($images as $key1 => $img) {
                        if(!in_array($img->image, $post['images'][$character])) {
                            $this->master->delete('gallery', 'id' , $img->id);
                            remove_vfile($img->image);
                            continue;
                        }
                        if ($counter === 0)
                            $this->master->save('gallery', array('main' => 1), 'id', $img->id);
                        $counter++;
                    }
                }

            }
            $this->load->library('my_stripe');
            $this->my_stripe->save_customer(array('name' => ucfirst($post['fname']).' '.ucfirst($post['lname']), 'email' => $post['email'], 'phone' => $this->data['mem_data']->mem_phone, 'description' => $this->data['site_settings']->site_name." Customer ".ucfirst($post['fname']).' '.ucfirst($post['lname'])), $this->data['mem_data']->mem_stripe_id);
            if(!empty($post['zip']) && $this->data['mem_data']->mem_zip != $post['zip']) {
                $coordinates = get_location_detail($post['zip']);
                $data['mem_map_lat'] = $coordinates->Latitude;
                $data['mem_map_lng'] = $coordinates->Longitude;
            }
            if(!empty($post['email']) && $this->data['mem_data']->mem_email != $post['email']){
                $rando = doEncode($this->session->mem_id.'-'.$post['email']);
                $data['mem_email'] = $post['email'];
                $data['mem_code'] = $rando;
                $data['mem_verified'] = 0;

                $verify_link = site_url('verification/' .$rando);

                $mem_data= array('name' => ucwords($post['fname'].' '.$post['lname']), "email" => $post['email'],"link" => $verify_link);
                $this->send_site_email($mem_data, 'change_email');
                $res['redirect_url'] = ' ';
                setMsg('info', getSiteText('alert', 'verify_email'));
            }

            $this->member_model->save($data, $this->session->mem_id);

            $res['msg'] = showMsg('success', 'Profile update successfully!');
            $res['status'] = 1;
            $res['hide_msg'] = 1;
            exit(json_encode($res));
        }
        else{
            if($this->session->mem_type == 'player'){
                // $this->data['mem_data']->images = $this->master->getRows('gallery', array('ref_id' => $this->session->mem_id, 'ref_type' => 'member', 'admin' => 0));
                // $this->data['characters1'] = $this->character_model->get_member_characters($this->session->mem_id);
                $this->data['characters'] = $this->character_model->get_rows();
                $this->data['mem_characters'] = @explode(',', $this->data['mem_data']->mem_characters);
                foreach ($this->data['mem_characters'] as $key => $char_id) {
                    $this->data['character_images'][$char_id] = $this->character_model->get_character_images($this->session->mem_id, $char_id);
                }
            }
            $this->load->view($this->session->mem_type."/profile-settings", $this->data);
        }
    }

    function additional_info()
    {
        $this->isMemLogged('player');
        if($this->input->post()){
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $this->form_validation->set_message('integer', 'Please select a valid {field}');
            $this->form_validation->set_rules('has_home', 'Has House', 'integer');
            $this->form_validation->set_rules('has_fenced_yard', 'Has fenced yard', 'integer');
            $this->form_validation->set_rules('allow_furniture', 'Dogs allowed on furniture', 'integer');
            $this->form_validation->set_rules('allow_bed', 'Dogs allowed on bed', 'integer');
            $this->form_validation->set_rules('non_smoke_house', 'Non-smoking home', 'integer');

            $this->form_validation->set_rules('not_dog', "Doesn't own a dog", 'integer');
            $this->form_validation->set_rules('not_cat', "Doesn't own a cat", 'integer');
            $this->form_validation->set_rules('one_client', "Accepts only one client at a time", 'integer');
            $this->form_validation->set_rules('caged_pet', "Does not own caged pets", 'integer');
            
            $this->form_validation->set_rules('puppy_care', "Puppy care", 'integer');
            $this->form_validation->set_rules('cat_care', "Cat care", 'integer');
            $this->form_validation->set_rules('play_dates', "Play Dates", 'integer');
            $this->form_validation->set_rules('first_aid_certified', "Dog first-aid certified", 'integer');
            $this->form_validation->set_rules('apse_member', "APSE member", 'integer');
            $this->form_validation->set_rules('petsit_member', "PetsitUSA member", 'integer');
            $this->form_validation->set_rules('volunteer_member', "Volunteer / Donor", 'integer');

            $this->form_validation->set_rules('children', 'Children in the home', 'required');
                
            if($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                /*if(!in_array($post['has_home'],array(0, 1, null))) {
                    $res['msg'] = showMsg('error','Please select valid Has house');
                    exit(json_encode($res));
                }
                if(!in_array($post['allow_bed'],array(0, 1, null))) {
                    $res['msg'] = showMsg('error','Please select valid Has fenced yard');
                    exit(json_encode($res));
                }
                if(!in_array($post['allow_furniture'],array(0, 1, null))) {
                    $res['msg'] = showMsg('error','Please select valid Dogs allowed on furniture');
                    exit(json_encode($res));
                }
                if(!in_array($post['allow_bed'],array(0, 1, null))) {
                    $res['msg'] = showMsg('error','Please select valid Dogs allowed on bed');
                    exit(json_encode($res));
                }
                if(!in_array($post['non_smoke_house'],array(0, 1, null))) {
                    $res['msg'] = showMsg('error','Please select valid Non-smoking home');
                    exit(json_encode($res));
                }

                if(!in_array($post['children'],array('0-5', '6-12', 'No'))) {
                    $res['msg'] = showMsg('error','Please select valid home type!');
                    exit(json_encode($res));
                }
                if(!in_array($post['cat'],array(0, 1, null))) {
                    $res['msg'] = showMsg('error','Please select valid option from Have any cat?');
                    exit(json_encode($res));
                }
                if(!in_array($post['caged_pet'],array(0, 1, null))) {
                    $res['msg'] = showMsg('error','Please select valid option from Caged pets?');
                    exit(json_encode($res));
                }*/
                

                $data = array('mem_has_home' => intval($post['has_home']), 'mem_has_fenced_yard' => intval($post['has_fenced_yard']), 'mem_allow_furniture' => intval($post['allow_furniture']), 'mem_allow_bed' => intval($post['allow_bed']), 'mem_non_smoke_house' => intval($post['non_smoke_house']), 'mem_not_dog' => intval($post['not_dog']), 'mem_not_cat' => intval($post['not_cat']), 'mem_one_client' => intval($post['one_client']), 'mem_caged_pet' => intval($post['caged_pet']), 'mem_children' => $post['children'], 'mem_puppy_care' => intval($post['puppy_care']), 'mem_cat_care' => intval($post['cat_care']), 'mem_play_dates' => intval($post['play_dates']), 'mem_first_aid_certified' => intval($post['first_aid_certified']), 'mem_apse_member' => intval($post['apse_member']), 'mem_petsit_member' => intval($post['petsit_member']), 'mem_volunteer_member' => intval($post['volunteer_member']));

                $this->member_model->save($data, $this->session->mem_id);
                $res['msg'] = showMsg('success', 'Additional Info updated successfully!');
                $res['status'] = 1;
                $res['hide_msg'] = 1;
            }
            exit(json_encode($res));
        }
        else
            show_404();
    }

    function gallery()
    {
        $this->isMemLogged('player');
        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_message('integer', 'Please select a valid {field}');
            $this->form_validation->set_rules('images[]', 'Image', 'required', array('required' => 'Please Select at-least one {field}'));
                
            if($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                
                $new_images = $this->master->getRows('gallery', array('ref_id' => null, 'ref_type' => 'member'));
                $mem_images = $this->master->getRows('gallery', array('ref_id' => $this->session->mem_id, 'ref_type' => 'member'));
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
                }

                $res['msg'] = showMsg('success', 'Gallery images have been saved successfully!');
                $res['status'] = 1;
                $res['hide_msg'] = 1;
            }
            exit(json_encode($res));
        }
        else
            show_404();
    }

    function availability()
    {
        $this->isMemLogged('player');
        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;
            $post = html_escape($this->input->post());

            if(count($post['days'])!=count($post['start_time']) || count($post['start_time'])!=count($post['end_time']))
            {
                $res['msg'] = showMsg('error', 'Inconsistent data of availability!');
                exit(json_encode($res));
            }
            $this->master->delete('player_timings', 'mem_id',$this->session->mem_id);
            $week_days = get_week_days();
            foreach ($week_days as $day_key=> $day) {
                $available = $post['days'][$day_key] != '' ? 1 : 0;
                $start_time = $post['start_time'][$day_key] ? get_full_time($post['start_time'][$day_key]) : '';
                $end_time = $post['end_time'][$day_key] ? get_full_time($post['end_time'][$day_key]) : '';
                $this->master->save('player_timings', array('mem_id' => $this->session->mem_id, 'day' => $day, 'start_time' => $start_time, 'end_time' => $end_time, 'available' => $available));
            }
            $res['msg'] = showMsg('success', 'Availability updated successfully!');
            $res['status'] = 1;
            $res['hide_msg'] = 1;
            exit(json_encode($res));
        }
        else
            show_404();
    }

    function change_pswd()
    {
        $this->isMemLogged($this->session->mem_type);
        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('pswd', 'Current Password', 'required');
            $this->form_validation->set_rules('npswd', 'New Password', 'required');
            $this->form_validation->set_rules('cpswd', 'Confirm Password', 'required|matches[npswd]');
            if($this->form_validation->run() === FALSE) {
                $res['msg'] = validation_errors();
            } else {
                $post = html_escape($this->input->post());
                $row = $this->member_model->oldPswdCheck($this->data['mem_data']->mem_id, $post['pswd']);
                if (count($row) > 0) {
                    $ary = array('mem_pswd' => doEncode($post['npswd']));
                    $this->member_model->save($ary, $this->data['mem_data']->mem_id);
                    $res['msg'] = showMsg('success', 'Password successfully updated!');

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Old Password Does Not Match!');
                }
            }
            exit(json_encode($res));
        }
    }

    function services()
    {
        $this->isMemLogged('player');
        $this->load->model('service_model');
        $this->load->model('question_model');
        if($this->input->post()) {
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_rules('services[]','Services','required|integer');
            $this->form_validation->set_rules('prices[]','Prices','required|numeric',array('numeric'=>'{field} should be numeric'));

            $this->form_validation->set_rules('host_dog_size', 'What size dogs will you host in your home?', 'required');
            $this->form_validation->set_rules('host_cat', 'Do you want to host cats?', 'required|in_list[0,1]', array('in_list' => 'Please select valid option for Do you want to host cats?'));
            $this->form_validation->set_rules('host_puppy_under_one', 'Do you want to host puppies under 1 year old?', 'required|in_list[0,1]', array('in_list' => 'Please select valid option for Do you want to host puppies under 1 year old?'));
            $this->form_validation->set_rules('different_families_dog', 'Do you plan to host dogs from different families at the same time?', 'required|in_list[0,1]', array('in_list' => 'Please select valid option for Do you plan to host dogs from different families at the same time?'));
            $this->form_validation->set_rules('accept_dog_size', 'What size dogs do you accept?', 'required');
            $this->form_validation->set_rules('accept_cat', 'Do you accept cats?', 'required|in_list[0,1]', array('in_list' => 'Please select valid option for Do you accept cats?'));
            $this->form_validation->set_rules('accept_puppy_under_one', 'Do you accept puppies under 1 year old?', 'required|in_list[0,1]', array('in_list' => 'Please select valid option for Do you accept puppies under 1 year old?'));

            $this->form_validation->set_rules('home_type', 'Home Type', 'required');
            $this->form_validation->set_rules('have_yard', 'Have Yard', 'required');
            $this->form_validation->set_rules('smoke', 'Does anyone smoke?', 'required');
            $this->form_validation->set_rules('children', 'Children in home?', 'required');
            $this->form_validation->set_rules('cat', 'Have any cat?', 'required');
            $this->form_validation->set_rules('caged_pet', 'Caged pets?', 'required');
            $this->form_validation->set_rules('allow_furniture', 'Allowed on furniture?', 'required');
            $this->form_validation->set_rules('allow_bed', 'Allowed on bed?', 'required');

            $this->form_validation->set_rules('stay_activities', 'What sort of activities will a dog enjoy on a stay with you?', 'required');
            $this->form_validation->set_rules('breed_prefrences', 'What would you like to know about a dog before sitting him or her? Do you have any breed preferences?', 'required');
            $this->form_validation->set_rules('dog_first_aid', 'Do you know dog first aid and/or CPR?', 'required|integer');
            $this->form_validation->set_rules('oral_medication', 'Can you administer oral medication to dogs?', 'required|integer');
            $this->form_validation->set_rules('injected_medication', 'Can you administer oral medication to dogs?', 'required|integer');

            $this->form_validation->set_rules('senior_dog_care', "Do you have experience taking care of senior dogs?", 'required|integer');
            $this->form_validation->set_rules('special_need_dog', "Do you have experience taking care of special needs dogs?", 'required|integer');
            $this->form_validation->set_rules('daily_exercise', "Can you provide daily exercise for high-energy dogs?", 'required|integer');
            $this->form_validation->set_rules('week_longer_stay', "Are you willing to accept stays longer than one week?", 'required|integer');

            if($this->form_validation->run()===FALSE)
                $res['msg'] = validation_errors();

            $post = html_escape($this->input->post());

            if(count($post['services'])<1 && count($post['prices'])<1)
                $res['msg'] .= showMsg('error','Please select at-least one Service!');

            if(count($post['services'])!=count($post['prices']))
                $res['msg'] .= showMsg('error','Inconsistent data of services and prices!');

            foreach ($post['services'] as $key => $service) {
                if (!$this->service_model->get_row($service)) {
                    $res['msg'] .= showMsg('error','Please select valid service');
                    break;
                }
            }
            if (!empty($res['msg']))
                exit(json_encode($res));

            $this->master->delete('mem_services','mem_id',$this->session->mem_id);
            foreach ($post['services'] as $key => $service) {
                $data = array('mem_id' => $this->session->mem_id, 'service_id' => $service, 'price' => $post['prices'][$key]);
                switch ($service) {
                    case 1:
                        $data['service_for'] = $post['service_for1'];
                        $data['available_spaces'] = intval($post['available_spaces1']);
                        $data['full_time_home'] = intval($post['full_time_home1']);
                        $data['potty_break'] = $post['potty_break1'];
                        $data['flex_availability'] = intval($post['flex_availability1']);
                        $data['cancellation_policy'] = $post['cancellation_policy1'];
                        $data['additional_services'] = !empty($post['adition_svc1'])?1:0;
                        if ($data['additional_services']) {
                            $data['holiday_rate'] = $post['holiday_rate1'];
                            $data['additional_dog_rate_plus'] = $post['additional_dog_rate1'];

                            $data['extended_stay_rate'] = $post['extended_stay_rate1'];
                            $data['extended_stay_days'] = $post['extended_stay_days1'];

                            $data['puppy_rate'] = $post['puppy_rate1'];

                            $data['bathing_rate_plus'] = $post['bathing_rate1'];
                            $data['bathing_is_free'] = $post['bathing_is_free1'];

                            $data['pick_drop_rate_plus'] = $post['pick_drop_rate1'];
                            $data['cat_care_rate'] = $post['cat_care_rate1'];
                            $data['additional_cat_rate_plus'] = $post['additional_cat_rate1'];
                        }
                        break;
                    case 2:
                        $data['service_for'] = $post['service_for2'];
                        $data['travel_radius'] = floatval($post['travel_radius2']);
                        $data['full_time_home'] = intval($post['full_time_home2']);
                        /*$data['per_day_visits'] = intval($post['per_day_visits2']);
                        $data['per_day_walks'] = intval($post['per_day_walks2']);
                        $data['dog_walk_time'] = $post['dog_walk_time2'];
                        $data['available_times'] = $post['available_times2'];*/
                        $data['potty_break'] = $post['potty_break2'];
                        $data['cancellation_policy'] = $post['cancellation_policy2'];
                        $data['additional_services'] = !empty($post['adition_svc2'])?1:0;
                        if ($data['additional_services']) {
                            $data['holiday_rate'] = $post['holiday_rate2'];
                            $data['additional_dog_rate_plus'] = $post['additional_dog_rate2'];
                            $data['extended_stay_rate'] = $post['extended_stay_rate2'];
                            $data['extended_stay_days'] = $post['extended_stay_days2'];
                            $data['puppy_rate'] = $post['puppy_rate2'];
                            $data['bathing_rate_plus'] = $post['bathing_rate2'];
                            $data['bathing_is_free'] = $post['bathing_is_free2'];
                            $data['cat_care_rate'] = $post['cat_care_rate2'];
                            $data['additional_cat_rate_plus'] = $post['additional_cat_rate2'];
                        }
                        
                        break;
                    case 3:
                        $data['service_for'] = $post['service_for3'];
                        $data['travel_radius'] = floatval($post['travel_radius3']);
                        $data['per_day_visits'] = intval($post['per_day_visits3']);
                        $data['per_day_walks'] = intval($post['per_day_walks3']);
                        /*$data['staying_at_client'] = intval($post['staying_at_client3']);
                        $data['dog_walk_time'] = $post['dog_walk_time3'];
                        $data['potty_break'] = $post['potty_break3'];*/
                        $data['available_times'] = $post['available_times3'];
                        $data['cancellation_policy'] = $post['cancellation_policy3'];
                        $data['additional_services'] = !empty($post['adition_svc3'])?1:0;
                        if ($data['additional_services']) {
                            $data['sixty_minute_rate_plus'] = $post['sixty_minute_rate3'];
                            $data['holiday_rate'] = $post['holiday_rate3'];
                            $data['additional_dog_rate_plus'] = $post['additional_dog_rate3'];
                            $data['extended_stay_rate'] = $post['extended_stay_rate3'];
                            $data['extended_stay_days'] = $post['extended_stay_days3'];
                            $data['puppy_rate'] = $post['puppy_rate3'];
                            $data['bathing_rate_plus'] = $post['bathing_rate3'];
                            $data['bathing_is_free'] = $post['bathing_is_free3'];
                            $data['cat_care_rate'] = $post['cat_care_rate3'];
                            $data['additional_cat_rate_plus'] = $post['additional_cat_rate3'];
                        }
                        break;
                    case 4:
                        /*$data['dog_size'] = $post['dog_size4'];
                        $data['host_cat'] = intval($post['host_cat4']);
                        $data['host_puppy_under_one'] = intval($post['host_puppy_under_one4']);
                        $data['neutered_dog'] = intval($post['neutered_dog4']);
                        $data['crate_trained'] = intval($post['crate_trained4']);*/

                        $data['service_for'] = $post['service_for4'];
                        $data['available_spaces'] = intval($post['available_spaces4']);
                        $data['full_time_home'] = intval($post['full_time_home4']);
                        $data['potty_break'] = $post['potty_break4'];
                        $data['cancellation_policy'] = $post['cancellation_policy4'];
                        $data['additional_services'] = !empty($post['adition_svc4'])?1:0;
                        if ($data['additional_services']) {
                            $data['holiday_rate'] = $post['holiday_rate4'];
                            $data['additional_dog_rate_plus'] = $post['additional_dog_rate4'];
                            $data['puppy_rate'] = $post['puppy_rate4'];
                            $data['bathing_rate_plus'] = $post['bathing_rate4'];
                            $data['bathing_is_free'] = $post['bathing_is_free4'];
                            // $data['pick_drop_rate_plus'] = $post['pick_drop_rate4'];
                        }
                        break;
                    case 5:
                        /*$data['dog_size'] = $post['dog_size5'];
                        $data['accept_cat'] = intval($post['accept_cat5']);
                        $data['host_puppy_under_one'] = intval($post['host_puppy_under_one5']);*/
                        $data['travel_radius'] = floatval($post['travel_radius5']);
                        $data['available_times'] = $post['available_times5'];
                        $data['cancellation_policy'] = $post['cancellation_policy5'];
                        $data['additional_services'] = !empty($post['adition_svc5'])?1:0;
                        if ($data['additional_services']) {
                            $data['holiday_rate'] = $post['holiday_rate5'];
                            $data['additional_dog_rate_plus'] = $post['additional_dog_rate5'];
                            $data['puppy_rate'] = $post['puppy_rate5'];
                            $data['bathing_rate_plus'] = $post['bathing_rate5'];
                            $data['bathing_is_free'] = $post['bathing_is_free5'];
                            // $data['pick_drop_rate_plus'] = $post['pick_drop_rate5'];
                        }
                        
                        break;
                }
                $this->master->save('mem_services', $data);
            }

            $data = array('mem_host_dog_size' => $post['host_dog_size'], 'mem_host_cat' => intval($post['host_cat']), 'mem_host_puppy_under_one' => intval($post['host_puppy_under_one']), 'mem_different_families_dog' => intval($post['different_families_dog']), 'mem_accept_dog_size' => $post['accept_dog_size'], 'mem_accept_cat' => intval($post['accept_cat']), 'mem_accept_puppy_under_one' => intval($post['accept_puppy_under_one']),

                'mem_home_type' => $post['home_type'], 'mem_have_yard' => $post['have_yard'], 'mem_non_smoke_house' => intval($post['smoke']), 'mem_children' => $post['children'], 'mem_not_cat' => intval($post['cat']), 'mem_caged_pet' => intval($post['caged_pet']), 'mem_allow_furniture' => intval($post['allow_furniture']), 'mem_allow_bed' => intval($post['allow_bed']),

                'mem_stay_activities' => $post['stay_activities'], 'mem_breed_prefrences' => $post['breed_prefrences'], 'mem_dog_first_aid' => intval($post['dog_first_aid']), 'mem_oral_medication' => intval($post['oral_medication']), 'mem_injected_medication' => intval($post['injected_medication']), 'mem_senior_dog_care' => intval($post['senior_dog_care']), 'mem_special_need_dog' => intval($post['special_need_dog']), 'mem_daily_exercise' => intval($post['daily_exercise']), 'mem_week_longer_stay' => intval($post['week_longer_stay']));
            $this->member_model->save($data, $this->session->mem_id);

                $res['msg'] = showMsg('success', 'Services have been saved successfully!');
                $res['status'] = 1;
            exit(json_encode($res));
        }
        else{
            $this->data['why_questions'] = $this->question_model->get_rows(array('type' => 'why'));
            $this->data['income_questions'] = $this->question_model->get_rows(array('type' => 'income'));

            $this->data['services'] = $this->service_model->get_rows();
            $this->data['policies'] = $this->master->getRows("policies");
            $this->load->view('player/services',$this->data);
        }
    }

    function calendar() {
        $this->isMemLogged('player');
        $this->load->view('player/calendar',$this->data);
    }

    function invite_friend() {
        $this->isMemLogged($this->session->mem_type);
        if($this->input->post()){
            $res=array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('emails', 'Email', 'required');
            if($this->form_validation->run() === FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $post = html_escape($this->input->post());
                $emails=@explode(', ', $post['emails']);
                            // exit(json_encode($emails));
                if (count($emails) > 0) {
                    foreach ($emails as $key => $email) {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
                            $res['msg'] = showMsg('error', 'Please enter valid comma separated emails');
                            exit(json_encode($res));
                        }
                    }
                    $new_count=0;
                    foreach ($emails as $key => $email) {

                        $ref_code=$this->data['mem_data']->mem_referral_code;
                        $referral_signup_link = site_url(($this->session->mem_type=='player'?'rts':'rs').'/'.$mem_data->mem_referral_code);

                        $mem_data= array('name' => ucfirst($this->data['mem_data']->mem_fname).' '.ucfirst($this->data['mem_data']->mem_lname),"email"=>$email,"link"=>$referral_signup_link);

                        if(send_site_email($mem_data, 'invite_friend'))
                            $new_count++;
                    }
                    $s=$new_count>1?'s':'';
                    $res['msg'] = showMsg('success',"Email has been sent to your friend$s !");
                    

                    $res['frm_reset'] = 1;
                    $res['status'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Please enter emails!');
                }
            }
            exit(json_encode($res));
        }
        else
            $this->load->view('account/invite-friend',$this->data);
    }

    function profile() {
        $this->load->view('account/profile', $this->data);
    }
    /*function profile() {
        if($this->session->mem_type=='player'){

            $this->data['row'] = $this->data['mem_data'];

            $this->data['row']->images = $this->master->getRows('gallery', array('ref_id' => $this->data['row']->mem_id, 'ref_type' => 'member'));
            
            $this->load->model('package_model');
            $this->data['pkg_row'] = $this->package_model->get_row($this->data['row']->mem_package_id);

            $this->load->model('service_model');
            $this->data['services'] = $this->service_model->get_mem_services($this->data['row']->mem_id);

            $this->data['player_timings']=$this->master->getRows('player_timings',array('mem_id' => $this->session->mem_id));
            $this->data['mem_reviews'] = get_mem_reviews($id);
            $this->data['avg_mem_rating'] = get_avg_mem_rating($id);
            $this->data['review_count'] = count($this->data['mem_reviews']);
            $this->data['encoded_id'] = $encoded_id;
            $this->load->view('account/profile', $this->data);
        }
        else
            show_404();
    }*/

    function report_profile() {

        list($type,$id)=explode('-', doDecode($this->input->post('store')));
        $id=intval($id);
        if($id<1 || $type!='profile' || !$row=$this->member_model->getMember($id,array('mem_status' => 1, 'mem_verified' => 1)))
            die('access denied!');

        $res=array();
        $res['hide_msg'] = 1;
        $res['scroll_to_msg'] = 1;
        $res['status'] = 0;
        $res['frm_reset'] = 1;
        $res['redirect_url'] = 0;

        $this->form_validation->set_rules('reason', 'Reason', 'required');
        if($this->form_validation->run() === FALSE)
        {
            $res['msg'] = validation_errors();
        }else{
            $post=html_escape($this->input->post());
            $this->master->save('reports',array('mem_id' => $this->session->mem_id, 'profile_id' => $id, 'reason' => $post['reason']));
            $res['msg']=showMsg('success', 'Profile reported successfully!');
            $res['status'] = 1;
        }
        exit(json_encode($res));
    }

    function change_phone() {
        $this->isMemLogged($this->session->mem_type);
        if($this->input->post()){
            $res=array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('phone', 'Phone', 'required');
            // $this->form_validation->set_rules('phone', 'Phone', 'required|integer|min_length[10]|max_length[10]',array('integer' => 'Please enter valid US phone number', 'min_length' => 'Please enter valid US phone number', 'max_length' => 'Please enter valid US phone number'));
            if($this->form_validation->run() === FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $post = html_escape($this->input->post());
                /*if($post['phone']==$this->data['mem_data']->mem_phone){
                    $res['msg'] = showMsg('error', 'Please change Phone Number to updated!');
                    exit(json_encode($res));
                }*/
                if($this->member_model->phoneExists($post['phone'],$this->session->mem_id)){
                    $res['msg'] = showMsg('error', 'Phone Already In Use!');
                    exit(json_encode($res));
                }
                $ary = array('mem_phone' => trim($post['phone']));
                if (!empty($post['phone'])) {
                    $this->verify_phone_code();
                }elseif($post['phone']!=$this->data['mem_data']->mem_phone){
                    $ary['mem_phone_verified'] = 0;
                    $res['redirect_url'] = ' ';
                }

                $this->member_model->save($ary, $this->session->mem_id);
                $res['msg'] = showMsg('success', 'Phone number successfully updated!');
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }
    }

    function verify_phone() {
        $this->isMemLogged($this->session->mem_type);
        if($this->input->post()){
            $res=array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('code[]', 'code', 'required|integer');
            if($this->form_validation->run() === FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $post = html_escape($this->input->post());
                $code=implode('', $post['code']);
                if(!$this->member_model->getMember($this->session->mem_id,array('mem_phone_code' => $code))){
                    $res['msg'] = showMsg('error', 'Invalid code!');
                    exit(json_encode($res));
                }

                $mem_data = array('mem_phone_code' => '', 'mem_phone_verified' => 1);
                $this->member_model->save($mem_data, $this->session->mem_id);
                $res['msg'] = showMsg('success', 'Phone Number verified successfully!');
                $res['status'] = 1;
                $res['redirect_url'] = ' ';
            }
            exit(json_encode($res));
        }
            die('access denied!');
    }

    function verify_phone_code() {
        $this->isMemLogged($this->session->mem_type, true, false, array('buyer', 'player'), false);
        /*
        if($this->data['mem_data']->mem_phone_verified==1){
            redirect('dashboard');
            exit;
        }
        */
        
        if($this->input->post()){
            $res = array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $post['phone'] = $this->input->post('phone');
            $mem_row = $this->member_model->get_row($this->session->mem_id);
            if(!empty($mem_row->mem_phone) || !empty($post['phone']) )
            {
                if (!empty($post['phone']) && $this->member_model->phoneExists($post['phone'], $this->session->mem_id)) {
                    $res['msg'] = showMsg('error', 'Phone already in use, Please try another!');
                    exit(json_encode($res));
                }
                $mem_phone = empty($post['phone'])?$mem_row->mem_phone:$post['phone'];
                $mem_phone = str_replace(array('-',',',' ','(',')'), '', $mem_phone);
                $code=rand(111111, 999999);
                // if ($_SERVER['HTTP_HOST'] != 'localhost') {
                    $client = new Client(TWILIO_SID, TWILIO_TOEKN);
                    try {
                        $client->messages
                        ->create(
                            '+1'.$mem_phone,
                            array(
                                "from" => TWILIO_NUMBER,
                                "body" => $code." is your PFSC code. Don't share this code with others"
                            )
                        );
                    } catch (Exception $e) {
                        $res['msg'] = showMsg('error',$e->getMessage());
                        $res['status'] = 0;
                        exit(json_encode($res));
                    }
                // }

                // send_twilio_msg($mem_row->mem_phone,$code." is your PFSC code. Don't share this code with others");

                $ary = array('mem_phone_code' => $code);

                $this->member_model->save($ary, $this->session->mem_id);
                $res['status'] = 1;
            }
            exit(json_encode($res));
        }
        die('access denied!');
    }
    
    function phone_verification() {
        $this->isMemLogged($this->session->mem_type, true, false, array('buyer', 'player'), false);
        // $this->isMemLogged($this->session->mem_type);
        /*if($this->data['mem_data']->mem_phone_verified==1){
            $url=$this->session->mem_type=='buyer'?'account-settings':'dashboard';
            redirect('dashboard');
            exit;
        }*/
        if($this->input->post()){
            $res=array();
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 1;
            $res['redirect_url'] = 0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;

            $this->form_validation->set_rules('code[]', 'code', 'required|integer');
            if ((empty($this->data['mem_data']->mem_become_buyer) && $this->session->mem_type=='buyer') || (empty($this->data['mem_data']->mem_player_application) && $this->session->mem_type=='player'))
                $this->form_validation->set_rules('phone', 'Phone', 'required', array('required' => 'Something went wrong!'));
            if($this->form_validation->run() === FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $post = html_escape($this->input->post());
                $code=implode('', $post['code']);
                if(!$this->member_model->getMember($this->session->mem_id,array('mem_phone_code' => $code))){
                    $res['msg'] = showMsg('error', 'Invalid code!');
                    exit(json_encode($res));
                }

                $mem_data = array('mem_phone_code' => NUll, 'mem_phone_verified' => 1);
                if ((empty($this->data['mem_data']->mem_become_buyer) && $this->session->mem_type=='buyer') || (empty($this->data['mem_data']->mem_player_application) && $this->session->mem_type=='player'))
                    $mem_data['mem_phone'] = $post['phone'];
                else
                    $res['redirect_url'] = 'dashboard';
                $this->member_model->save($mem_data, $this->session->mem_id);
                $res['msg'] = showMsg('success', 'Phone Number verified successfully!');
                $res['status'] = 1;
                $res['frm_reset'] = 1;
                // $res['redirect_url'] = $this->session->mem_type=='player' && $this->session->mem_player_verified==0 && $this->session->mem_player_verified==0 && $this->session->mem_player_application==0?'become-a-player':' '
            }
            exit(json_encode($res));
        }else{
            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'phone_verify'));
            $this->data['site_content'] =unserialize($this->data['site_content']->code);
            $this->load->view("account/verify-phone", $this->data);
        }
    }

    function email_verification() {
        $verification_check=$this->data['mem_data']->mem_verified==0?false:true;
        $this->isMemLogged($this->session->mem_type,$verification_check,false);
        if($this->data['mem_data']->mem_verified==1){
            // $url=$this->session->mem_type=='buyer'?'account-settings':'dashboard';
            redirect('dashboard');
            exit;
        }

        if($this->input->post()){
            $res=array();
            $res['frm_reset'] = 0;
            $res['hide_msg'] = 0;
            $res['scroll_to_msg'] = 0;
            $res['status'] = 0;
            $res['redirect_url'] = 0;
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            if($this->form_validation->run() === FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $post = html_escape($this->input->post());

                if (!$this->member_model->emailExists($post['email'],$this->session->mem_id))
                {
                    // $rando=doEncode(rand(111111, 999999));
                    $rando=doEncode($this->session->mem_id.'-'.$post['email']);
                    $rando=strlen($rando)>225?substr($rando, 0,225):$rando;

                    $this->member_model->save(array('mem_code' => $rando, 'mem_email' => $post['email'], 'mem_verified' => 0),$this->session->mem_id);
                    $verify_link = site_url('verification/' .$rando);

                    $mem_data= array('name' => $this->data['mem_data']->mem_fname.' '.$this->data['mem_data']->mem_lname,"email"=>$post['email'],"link"=>$verify_link);
                    $this->send_site_email($mem_data, 'change_email');

                    $res['redirect_url']=' ';

                    $res['msg'] = showMsg('success', 'Email has been changed successful! Please wait.');
                    setMsg('info',getSiteText('alert', 'verify_email'));

                    $res['status'] = 1;
                    $res['frm_reset'] = 1;
                    $res['hide_msg'] = 1;
                } else {
                    $res['msg'] = showMsg('error', 'Email already exists!');
                }
            }
            exit(json_encode($res));
        }else{

            $this->data['site_content'] = $this->master->getRow('sitecontent', array('ckey' => 'email_verify'));
            $this->data['site_content'] =unserialize($this->data['site_content']->code);
            $this->load->view("account/verify-email", $this->data);
        }
    }

    function resend_email() {
        $verification_check = $this->data['mem_data']->mem_verified == 0 ? false:true;
        $this->isMemLogged($this->session->mem_type, $verification_check, false);

        $res = array();
        $res['hide_msg'] = 0;
        $res['scroll_to_msg'] = 0;
        $res['status'] = 0;
        $res['frm_reset'] = 0;
        $res['redirect_url'] = 0;

        $rando = doEncode($this->session->mem_id.'-'.$this->data['mem_data']->mem_email);
        $rando = strlen($rando)>225?substr($rando, 0, 225):$rando;
        
        $this->member_model->save(array('mem_code' => $rando), $this->session->mem_id);

        $verify_link = site_url('verification/'.$rando);

        $mem_data = array('name' => $this->data['mem_data']->mem_fname.' '.$this->data['mem_data']->mem_lname,"email"=>$this->data['mem_data']->mem_email,"link"=>$verify_link);

        $ok=$this->send_site_email($mem_data, 'verify_email');

        $res['msg'] = $ok?showMsg('success', 'Email sent successfully!'):showMsg('error', 'There is an error occurred, Please try again later!');
        $res['status'] = 1;
        $res['hide_msg'] = 1;
        exit(json_encode($res));
    }

    function orders(){
        // $this->isMemLogged('player');
        $this->load->view("player/orders", $this->data);
    }
    function order_detail(){
        // $this->isMemLogged('player');
        $this->load->view("player/order-detail", $this->data);
    }
    function my_products(){
        // $this->isMemLogged('player');
        $this->load->view("player/products", $this->data);
    }
    function add_product(){
        // $this->isMemLogged('player');
        $this->load->view("player/add-product", $this->data);
    }
}
?>