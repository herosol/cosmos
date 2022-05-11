<?php

$CI = & get_instance();
function get_header()
{
    $CI = get_instance();
    if($CI->session->has_userdata('mem_id') && $CI->session->has_userdata('mem_type'))
        $CI->load->view('includes/header-logged');
    else
        $CI->load->view('includes/header');

}

function booking_rate($player_id)
{
    $CI = get_instance();
    $CI->db->select("((SELECT COUNT(*) FROM tbl_bookings where player_id=3 and STATUS=2 and canceled=0)/COUNT(*))*100 as rate");
    $CI->db->where("player_id", $player_id);
    $CI->db->where("status>", 0);
    $query = $CI->db->get('bookings');
    return round($query->row()->rate, 1);

}

function count_player_clients($player_id, $reaped = FALSE)
{
    $CI = get_instance();
    $CI->db->select("*, count(id) as total");
    $CI->db->where("player_id", $player_id);
    $CI->db->where("status", 2);
    $CI->db->where("canceled", 0);
    $CI->db->where("completed", 2);
    $CI->db->group_by('owner_id');
    if (!empty($reaped))
        $CI->db->having('total >', 1);
    $query = $CI->db->get('bookings');
    return intval($query->num_rows());

}

function get_pkg_name($pkg_id)
{
    $CI = get_instance();
    $CI->db->where('id', $pkg_id);
    $query = $CI->db->get('packages');
    return $query->row()->title;
}

function get_services()
{
    $CI = get_instance();
    $query = $CI->db->get('services');
    return $query->result();
}

function get_cat_help($cat_id)
{
    $CI = get_instance();
    $CI->db->where('cat_id', $cat_id);
    $query = $CI->db->get('help');
    return $query->result();
}

function is_mem_service($mem_id, $service_id)
{
    $CI = get_instance();
    $CI->db->where('mem_id', $mem_id);
    $CI->db->where('service_id', $service_id);
    $query = $CI->db->get('mem_services');
    return $query->row();
}

function get_yes_no($status)
{
    return $status == 1 ? 'Yes' : 'No';
}

function get_booking_status($status)
{
    if ($status == 0)
        return '<span class="miniLbl gray">Pending</span>';
    elseif ($status == 1)
        return '<span class="miniLbl yellow">Accepted</span>';
    else if ($status == 2)
        return '<span class="miniLbl green">Booked</span>';
    else
        return '<span class="miniLbl red">Declined</span>';
}

function get_confirmed_status($booking)
{
    if ($booking->canceled == 0 && $booking->completed == 2)
        return  '<span class="miniLbl green">Complete</span>';
    elseif ($booking->canceled == 1 && $booking->completed == 0)
        return '<span class="miniLbl red">Canceled</span>';
    else
        return '<span class="miniLbl yellow">Pending</span>';
}

function get_completed_status($status)
{
    if ($status == 1)
        return '<span class="miniLbl yellow">Pending</span>';
    else if ($status == 2)
        return '<span class="miniLbl green">Completed</span>';
    
}

function count_panding_withdraws()
{
    $CI = get_instance();
    return $CI->master->num_rows('withdraws', array('status' => 0));
}

function count_player_applications()
{
    $CI = get_instance();
    return $CI->master->num_rows('members', array('mem_type' => 'player', 'mem_player_application' => 1, 'mem_player_verified' => 0));
}

function player_hours_sitted($player_id)
{
    $CI = get_instance();
    $CI->db->select_sum("hours", "total_time");
    $CI->db->where('player_id', $player_id);
    $CI->db->group_start()
    ->where("completed", 2)
    ->or_where("completed", 1)
    ->group_end();
    $query = $CI->db->get('bookings');
    return round($query->row()->total_time, 1);
}
function total_player_deliveries($player_id)
{
    $CI = get_instance();
    $CI->db->select("count(id) as total");
    $CI->db->where('player_id', $player_id);
    $CI->db->where("status", 2);
    $CI->db->where("completed", 2);
    $query = $CI->db->get('bookings');
    return intval($query->row()->total);
}

//***** PERMISSIONS*******///
function has_access($permission_id = 0)
{
    $CI = get_instance();
    if(is_admin())
        return true;
    if(!in_array($permission_id, $CI->session->permissions)){
    // if($permission_id>0 && !is_admin() && !in_array($permission_id,$CI->session->userdata('permissions'))){
        show_404();
        exit;
    }
    return $CI->session->loged_in['id'];
}
function access($permission_id)
{
    $CI = get_instance();
    if(is_admin()) return true;
    return in_array($permission_id, $CI->session->permissions);
}
function is_admin()
{
    $CI = get_instance();
    return $CI->session->loged_in['admin_type'] == 'admin' ? true : false;
}
function has_permissions($permission_id, $id = 0)
{
    $CI = get_instance();
    if($id<1)
        $id=$CI->session->loged_in['id'];
    return $CI->master->getRow('permissions_admin', array('permission_id' => $permission_id, 'admin_id' => $id));
}
//***** end PERMISSIONS*******///

function get_location_detail($zipcode, $country = 'usa')
{
    $url = 'https://geocoder.api.here.com/6.2/geocode.json?app_id=IAcDhEZWhrGYOn6m3JnI&app_code=52n2G76qxgU7qRyswkqYaw%20&searchtext='.$country.'%20'.urlencode($zipcode);
    $headers = array(
        'Accept: application/json',
        'Content-Type: application/json');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    if (curl_error($ch)) {
        echo $error_msg = curl_error($ch);
    }
    curl_close($ch);
    $response = json_decode($data);
            // pr($response->Response->View[0]->Result[0]->Location);
    return $response->Response->View[0]->Result[0]->Location->DisplayPosition;
    /*echo $response->Response->View[0]->Result[0]->Location->DisplayPosition->Latitude.'<br>';
    echo $response->Response->View[0]->Result[0]->Location->DisplayPosition->Longitude*/;
}
?>