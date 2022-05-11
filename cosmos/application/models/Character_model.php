<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Character_model extends CRUD_model
{

    public function __construct()
    {
    	parent::__construct();
        $this->table_name = "characters";
        $this->field = "id";
    }

    function get_member_characters($mem_id)
    {
    	$this->db->select("c.*, g.image as main_image");
    	$this->db->from($this->table_name." c");
    	$this->db->join('members m', "FIND_IN_SET(c.id, m.mem_characters) > 0");
        $this->db->join('gallery g', "g.ref_id = c.id and g.ref_type = 'character'");
    	$this->db->where('m.mem_id', $mem_id);
        $this->db->where('g.main', 1);

        $query = $this->db->get();
        return $query->result();
    }

    function get_character_images($mem_id, $char_id, $main = '')
    {
        $this->db->select("image");
    	$this->db->where('mem_id', $mem_id);
    	$this->db->where('ref_id', $char_id);
    	$this->db->where('ref_type', 'character');
        if ($main!=='')
            $this->db->where('main', $main);
        $query = $this->db->get('gallery');
        return $query->result();
    }
}
?>

