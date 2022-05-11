<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Subject_model extends CRUD_model {

    public function __construct(){
    	parent::__construct();
        $this->table_name="tbl_subjects";
        $this->field="id";
    }

    function get_subjects($parent_id=''){
        $this->db->where('status',1);
        if($parent_id!=='')
            $this->db->where('parent_id',$parent_id);
        $query=$this->db->get($this->table_name);
        return $query->result();
    }

    function get_sub_subjects($parent_id){
        $this->db->select("*,(select name from {$this->table_name} where id=$parent_id) as parent_name");
        $this->db->where('status',1);
        $this->db->where('parent_id',$parent_id);
        $query=$this->db->get($this->table_name);
        return $query->result();
    }

    /*** sitter subjects ***/

    function get_sitter_subjects($sitter_id){
        $this->db->select("s.*");
        $this->db->from($this->table_name.' s');
        $this->db->join("sitter_subjects ts",'ts.subject_id=s.id');
        $this->db->where('status',1);
        $this->db->where('ts.mem_id',$sitter_id);
        $query=$this->db->get();
        return $query->result();
    }
}
?>