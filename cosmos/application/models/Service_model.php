<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Service_model extends CRUD_model {

    public function __construct() {
    	parent::__construct();
        $this->table_name = "services";
        $this->sub_table_name = "mem_services";
        $this->field="id";
    }

    function get_mem_service($mem_id, $service_id, $where = '') {
        $this->db->select("s.*, ms.*");
        // $this->db->select("s.*, ms.price, ms.additional_services, ms.holiday_rate, ms.additional_dog_rate_plus, ms.puppy_rate, ms.bathing_rate_plus, ms.pick_drop_rate_plus, ms.sixty_minute_rate_plus, ms.cat_care_rate");
        $this->db->from($this->table_name.' s');
        $this->db->join($this->sub_table_name.' ms', 'ms.service_id = s.id');
        $this->db->join('members m', 'm.mem_id = ms.mem_id');
        $this->db->where('m.mem_id', $mem_id);
        $this->db->where('s.id', $service_id);
        if (!empty($where))
            $this->db->where($where);
        return $this->db->get()->row();
    }

    function get_mem_services($mem_id, $where = '') {
        // $this->db->select("s.*, ms.price, ms.additional_services, ms.holiday_rate, ms.additional_dog_rate_plus, ms.puppy_rate, ms.bathing_rate_plus, ms.pick_drop_rate_plus, ms.sixty_minute_rate_plus, ms.cat_care_rate");
        $this->db->select("s.*, ms.*");
        $this->db->from($this->table_name.' s');
        $this->db->join($this->sub_table_name.' ms', 'ms.service_id = s.id');
        $this->db->join('members m', 'm.mem_id = ms.mem_id');
        $this->db->where('m.mem_id', $mem_id);
        if (!empty($where))
            $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    /*
    function delete_mem_services($mem_id){
        $this->db->where($mem_id,'mem_id');        
        $this->db->delete($this->sub_table_name);        
    }

    function delete_mem_service($mem_id,$service_id){
        $this->db->where('service_id',$service_id);        
        $this->db->where('mem_id',$mem_id);        
        $this->db->delete($this->sub_table_name);        
    }

    function save_mem_service($vals,$service_id){
        $this->db->where('service_id',$service_id);        
        $this->db->where('mem_id',$mem_id);        
        $this->db->delete($this->sub_table_name);        
    }
    */
}
?>

