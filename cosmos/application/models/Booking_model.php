<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking_model extends CRUD_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'bookings';
        $this->field = "id";
    }

    /*** start admin***/


    function get_admin_bookings($where = '', $start = '', $offset = '', $order_by = 'asc') {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, @amount := (SELECT sum(price) FROM tbl_booking_extras WHERE booking_id=b.id)+(b.hours*b.rate) as amount, @pamount := (@amount*site_percentage)/100 as pamount, @amount-@pamount as player_amount", FALSE);
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id = b.buyer_id');
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by('b.start_date', $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    function get_admin_booking($id, $where = '')
    {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_image, m.mem_city, m.mem_state, m.mem_zip, m.mem_address1, m.mem_id, @amount := (SELECT sum(price) FROM tbl_booking_extras WHERE booking_id=b.id)+(b.hours*b.rate) as amount, @pamount := (@amount*site_percentage)/100 as pamount, @amount-@pamount as player_amount", FALSE);
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id = b.buyer_id');

        $this->db->where('b.id', $id);
        if (!empty($where))
            $this->db->where($where);
        $row = $this->db->get()->row();
        if ($row)
            $row->extras = $this->get_extras($row->id);
        return $row;
    }
    /*** end admin***/

    function get_booking($id, $where = '')
    {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, m.mem_image, m.mem_city, m.mem_state, m.mem_zip, m.mem_address1, m.mem_id, @amount := (SELECT sum(price) FROM tbl_booking_extras WHERE booking_id=b.id)+(b.hours*b.rate) as amount, @pamount := (@amount*site_percentage)/100 as pamount, @amount-@pamount as player_amount", FALSE);
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id=b.player_id or m.mem_id=b.buyer_id');

        $this->db->where('b.id', $id);
        if (!empty($where))
            $this->db->where($where);
        $row = $this->db->get()->row();
        if ($row)
            $row->extras = $this->get_extras($row->id);
        return $row;
    }

    function get_extras($booking_id)
    {
        $this->db->select("be.*");
        $this->db->from($this->table_name.' b');
        $this->db->join('booking_extras be', 'be.booking_id = b.id');
        $this->db->where('b.id', $booking_id);
        return $this->db->get()->result();
    }
    
    /*** start my players***/
    function total_buyer_players() {
        $this->db->select("count(id) as total");
        $this->db->where('buyer_id',$this->session->mem_id);
        $this->db->where('status',2);
        $this->db->group_by('player_id');
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    function get_buyer_players($where='',$start = '', $offset = '',$order_by='desc') {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', LEFT(m.mem_lname, 1), '.') as mem_name");

        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id = b.player_id');

        $this->db->where('buyer_id', $this->session->mem_id);
        $this->db->where('status', 2);
        $this->db->group_by('player_id');

        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("b.id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);
        $query = $this->db->get();
        return $query->result();
    }

    /*** end my players***/


    function total_type_bookings($type = 'all', $where = '')
    {
        $this->db->select("count(b.id) as total");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id = b.player_id or m.mem_id = b.buyer_id');

        switch ($type) {
            case 'pending':
                $this->db->where("b.status<>", 3);
                $this->db->where("b.completed", 0);
                $this->db->where("b.canceled", 0);
                break;
            case 'completed':
                $this->db->where("b.status", 2);
                $this->db->where("b.completed", 2);
                break;
            case 'canceled':
                $this->db->where("b.status", 2);
                $this->db->where("b.canceled", 1);
                break;
            
            default:
                # code...
                break;
        }
        // $this->db->where("booking_date_time>=",date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);

        $this->db->group_by('b.id');
        $query = $this->db->get();
        return intval($query->row()->total);
    }

    function get_type_bookings($type = 'all', $where = '', $start = '', $offset = '', $order_by = 'asc') {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, @amount := (SELECT sum(price) FROM tbl_booking_extras WHERE booking_id=b.id)+(b.hours*b.rate) as amount, @pamount := (@amount*site_percentage)/100 as pamount, @amount-@pamount as player_amount", FALSE);
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id=b.player_id or m.mem_id=b.buyer_id');

        switch ($type) {
            case 'pending':
                $this->db->where("status<>", 3);
                $this->db->where("b.completed", 0);
                $this->db->where("b.canceled", 0);
                break;
            case 'completed':
                $this->db->where("b.status", 2);
                $this->db->where("b.completed", 2);
                break;
            case 'canceled':
                $this->db->where("b.status", 2);
                $this->db->where("b.canceled", 1);
                break;
            case 'dashboard':
                $this->db->where_in("b.status", array(1, 2));
                $this->db->where("b.canceled", 0);
                $this->db->where("b.completed", 0);
                break;
        }
        /*
        $this->db->where("b.completed", 0);
        $this->db->where("b.canceled", 0);
        */

        // $this->db->where("b.booking_date_time>=",date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by('b.start_date', $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function get_requests_bookings($where = '', $start = '', $offset = '', $order_by = 'desc') {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, s.title as service");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id=b.player_id or m.mem_id=b.buyer_id');
        $this->db->join('services s', 's.id=b.service_id');
        $this->db->where_in("b.status", array(0, 1));
        $this->db->where("b.completed", 0);
        $this->db->where("b.canceled", 0);
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("b.id", $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        // print_query();
        return $query->result();
    }

    function get_upcoming_bookings($where='', $start = '', $offset = '', $order_by='asc') {
        $this->db->select("b.*, m.mem_image, concat(m.mem_fname, ' ', m.mem_lname) as mem_name, s.title as service");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m', 'm.mem_id=b.player_id or m.mem_id=b.buyer_id');
        $this->db->join('services s','s.id=b.service_id');

        $this->db->where("b.status", 2);
        $this->db->where("b.completed<>", 2);
        $this->db->where("b.canceled", 0);

        // $this->db->where("b.booking_date_time>=",date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by('b.start_date', $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        // print_query();
        return $query->result();
    }

    function get_completed_bookings($where='',$start = '', $offset = '',$order_by='desc') {
        $this->db->select("b.*,m.mem_image,concat(m.mem_fname,' ',LEFT(m.mem_lname,1),'.') as mem_name,s.title as service");
        $this->db->from($this->table_name.' b');
        $this->db->join('members m','m.mem_id=b.player_id or m.mem_id=b.buyer_id');
        $this->db->join('services s','s.id=b.service_id');

        $this->db->where("b.status", 2);
        $this->db->where("b.canceled", 0);
        $this->db->where("b.completed", 2);
        /*$this->db->group_start()
        ->where("(b.completed=1 or b.completed=2)")
        ->or_where("b.booking_date_time<=",date('Y-m-d h:i'))
        ->group_end();*/

        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by('b.start_date', $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        // print_query();
        return $query->result();
    }

    function get_profile_bookings($where='',$start = '', $offset = '',$order_by='desc') {
        /*$this->db->select("c.*,concat(mem_fname,' ',mem_lname) as mem_name,mem_image");
        $this->db->from($this->table_name.' c');
        $this->db->join('members m','m.mem_id=c.mem_id');*/

        $this->db->where("status",1);
        $this->db->where("deleted",0);

        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("id", $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get($this->table_name);
        $rows=array();
        foreach ($query->result() as $key => $row) {
            $row->total_favorites=$this->total_favorites($row->id);
            $rows[$key]=$row;
        }
        return $rows;
    }

    function total_requests_bookings($where) {
        $this->db->select("count(id) as total");
        if (!empty($where))
            $this->db->where($where);
        $this->db->where_in("status", array(0, 1));
        $this->db->where("completed", 0);
        $this->db->where("canceled", 0);
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    function total_upcoming_bookings($where = '') {
        $this->db->select("count(id) as total");
        $this->db->where("status", 2);
        $this->db->where("completed", 0);
        $this->db->where("canceled", 0);
        // $this->db->where("booking_date_time>=",date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    function total_completed_bookings($where = '') {
        $this->db->select("count(id) as total");
        $this->db->where("status", 2);
        $this->db->where("canceled", 0);
        $this->db->where("completed", 2);
        /*$this->db->group_start()
        ->where("(completed=1 or completed=2)")
        ->or_where("booking_date_time<=",date('Y-m-d h:i'))
        ->group_end();*/
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    /*function search_bookings($post){
        $this->db->where("status",1);
        $this->db->where("deleted",0);
        $this->db->where('main_service_id',intval($post['category']),false);

        if (!empty($post['title'])) 
            $this->db->like('title', $post['title'], 'both');
        if (!empty($post['price'])) {
            $ary = explode('-', str_replace('$', '', $post['price']));
            $min_price = floatval(trim($ary[0]));
            $max_price = floatval(trim($ary[1]));
            $this->db->where("( price >= $min_price  AND price <= $max_price ) ", null, false);
        }
        if (isset($post['cat_id']) && (min($post['cat_id']) != "")) {
            $this->db->where_in('sub_service_id',$post['cat_id']);

        }
        if (!empty($post['sort']) && in_array($post['sort'], array('asc','desc'))) 
            $this->db->order_by('price', $post['sort']);

        $query = $this->db->get($this->table_name);
        $rows=array();
        foreach ($query->result() as $key => $row) {
            $rows[$key]=$row;
            $rows[$key]->total_favorites=$this->total_favorites($row->id);
        }
        return $rows;
    }  */

    /*function view($id){
        $this->db->set('views', 'views+1', FALSE);
        $this->db->where('id', $id);
        $this->db->update($this->table_name);
    }*/
}
?>

