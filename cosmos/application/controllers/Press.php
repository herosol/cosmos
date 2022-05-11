<?php

class Press extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('press_model');
	}
	
	function index($page=1) {

		$page=intval($page);

		$per_page=20;
		$total=$this->press_model->num_rows();
		$total_pages=ceil($total/$per_page);
		
		if($page<=$total_pages){
			
			$this->load->library('pagination');
			$this->config->load('pagination');
			
			$config = $this->config->item('pagination');        
			$config['base_url'] = base_url('press');
			$config['total_rows'] = $total;
			$config['per_page'] = $per_page;
			$this->pagination->initialize($config); 
			$this->data['links'] = $this->pagination->create_links();

			$start=($page-1)*$per_page;

			$this->data['rows'] = $this->press_model->get_rows(array(),$start,$per_page, 'desc');
			$this->data['recent_press'] = $this->press_model->get_rows(array(), '',8, 'desc');

			$this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'press'));
			$this->data['site_content'] = unserialize($this->data['content_row']->code);

			$this->load->view("pages/press", $this->data);	
		}
		else
			show_404();
	}
	
	/*function index($cat_id=0) {

		$cat_id = intval($cat_id);
		$condition = array();
		if ($cat_id>0){
			$cat_row = $this->press_model->get_rows(array('id' => $cat_id), '', '', 'desc');
			$condition['cat_id']=$cat_id;
			if (!$cat_row){
				show_404();
				exit;
			}
		}
		
		$this->data['rows'] = $this->press_model->get_rows($condition, '', '', 'asc');
		$this->data['recent_press'] = $this->press_model->get_rows(array(),'',8, 'desc');
		$this->load->view("pages/press", $this->data);

	}*/
	function detail($id) {
		$id=intval($id);
		if($this->data['row'] = $this->press_model->get_row($id)){
			;
			$this->data['site_content']['page_title'] = $this->data['row']->title;
            $this->data['site_content']['meta_description'] = $this->data['row']->meta_description;
            $this->data['site_content']['meta_keywords'] = $this->data['row']->meta_keywords;
            $this->data['site_content']['meta_image'] = get_site_image_src("press",$this->data['row']->image);

			$this->data['recent_press'] = $this->press_model->get_rows(array(),'',8, 'desc');
			$this->load->view('pages/press-detail', $this->data);
		}
		else
			show_404();
	}

}
?>