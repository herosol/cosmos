<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Lesson_model extends CRUD_Model {

    public function __construct() {
        parent::__construct();
        $this->table_name='lessons';
        $this->field="id";
    }

    /*** start admin***/
    function get_admin_lesson($id,$where='') {
        $this->db->select("l.*,m.mem_image,concat(m.mem_fname,' ',LEFT(m.mem_lname,1),'.') as mem_name,m.mem_image,m.mem_id,s.name as subject");
        $this->db->from($this->table_name.' l');
        $this->db->join('members m','m.mem_id=l.student_id');
        $this->db->join('subjects s','s.id=l.subject_id');

        $this->db->where('l.id', $id);
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }
    /*** end admin***/

    function get_lesson($id,$where='') {
        $this->db->select("l.*,m.mem_image,concat(m.mem_fname,' ',LEFT(m.mem_lname,1),'.') as mem_name,m.mem_image,m.mem_id,s.name as subject");
        $this->db->from($this->table_name.' l');
        $this->db->join('members m','m.mem_id=l.tutor_id or m.mem_id=l.student_id');
        $this->db->join('subjects s','s.id=l.subject_id');

        $this->db->where('l.id', $id);
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }
    /*** start my tutors***/
    function total_student_tutors() {
        $this->db->select("count(id) as total");
        $this->db->where('student_id',$this->session->mem_id);
        $this->db->where('status',2);
        $this->db->group_by('tutor_id');
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    function get_student_tutors($where='',$start = '', $offset = '',$order_by='desc') {
        $this->db->select("l.*,m.mem_image,concat(m.mem_fname,' ',LEFT(m.mem_lname,1),'.') as mem_name");

        $this->db->from($this->table_name.' l');
        $this->db->join('members m','m.mem_id=l.tutor_id');

        $this->db->where('student_id',$this->session->mem_id);
        $this->db->where('status',2);
        $this->db->group_by('tutor_id');

        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("l.id", $order_by);
        if (!empty($offset))
            $this->db->limit($offset, $start);
        $query = $this->db->get();
        return $query->result();
    }

    /*** end my tutors***/

    function get_mem_requests($where='',$start = '', $offset = '',$order_by='desc') {
        $this->db->select("l.*,m.mem_image,concat(m.mem_fname,' ',LEFT(m.mem_lname,1),'.') as mem_name,s.name as subject");
        $this->db->from($this->table_name.' l');
        $this->db->join('members m','m.mem_id=l.tutor_id or m.mem_id=l.student_id');
        $this->db->join('subjects s','s.id=l.subject_id');
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by("l.id", $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        // print_query();
        return $query->result();
    }

    function get_upcoming_lessons($where='',$start = '', $offset = '',$order_by='asc') {
        $this->db->select("l.*,m.mem_image,concat(m.mem_fname,' ',LEFT(m.mem_lname,1),'.') as mem_name,s.name as subject");
        $this->db->from($this->table_name.' l');
        $this->db->join('members m','m.mem_id=l.tutor_id or m.mem_id=l.student_id');
        $this->db->join('subjects s','s.id=l.subject_id');

        $this->db->where("l.status",2);
        $this->db->where("l.completed",0);
        $this->db->where("l.canceled",0);

        // $this->db->where("l.lesson_date_time>=",date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by('l.lesson_date_time', $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        // print_query();
        return $query->result();
    }

    function get_previous_lessons($where='',$start = '', $offset = '',$order_by='desc') {
        $this->db->select("l.*,m.mem_image,concat(m.mem_fname,' ',LEFT(m.mem_lname,1),'.') as mem_name,s.name as subject");
        $this->db->from($this->table_name.' l');
        $this->db->join('members m','m.mem_id=l.tutor_id or m.mem_id=l.student_id');
        $this->db->join('subjects s','s.id=l.subject_id');

        $this->db->where("l.status",2);
        $this->db->where("l.canceled",0);
        $this->db->where("l.completed<>",0);
        /*$this->db->group_start()
        ->where("(l.completed=1 or l.completed=2)")
        ->or_where("l.lesson_date_time<=",date('Y-m-d h:i'))
        ->group_end();*/

        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by('l.lesson_date_time', $order_by);
        if (!empty($offset)) {
            $this->db->limit($offset, $start);
        }
        $query = $this->db->get();
        // print_query();
        return $query->result();
    }

    function get_profile_lessons($where='',$start = '', $offset = '',$order_by='desc') {
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

    function total_mem_lesson_requests($where) {
        $this->db->select("count(id) as total");
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    function total_upcoming_lessons($where = '') {
        $this->db->select("count(id) as total");
        $this->db->where("status",2);
        $this->db->where("completed",0);
        $this->db->where("canceled",0);
        // $this->db->where("lesson_date_time>=",date('Y-m-d h:i'));
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    function total_previous_lessons($where = '') {
        $this->db->select("count(id) as total");
        $this->db->where("status",2);
        $this->db->where("canceled",0);
        $this->db->where("completed<>",0);
        /*$this->db->group_start()
        ->where("(completed=1 or completed=2)")
        ->or_where("lesson_date_time<=",date('Y-m-d h:i'))
        ->group_end();*/
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get($this->table_name);
        return intval($query->row()->total);
    }

    /*function search_lessons($post){
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

