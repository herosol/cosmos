<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CRUD_model {

    public function __construct(){
    	parent::__construct();
        $this->table_name="categories";
        $this->field="id";
    }
}
?>