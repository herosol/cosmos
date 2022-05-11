<?php

class Player_resources extends MY_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('resource_model');
        $this->load->model('category_model');

        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'player_resources'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
	}
	
	function index($cat_id, $page = 1)
	{

		$cat_id = intval($cat_id);
		if (!$this->category_model->get_row_where(array('id' => $cat_id, 'type' => 'resource'))) {
			show_404();
			exit;
		}
		$page = intval($page);

		$per_page=20;
		$total = $this->resource_model->num_rows(array('cat_id' => $cat_id));
		$total_pages = ceil($total/$per_page);
		
		if($page<=$total_pages || $page>0){
			
			$this->load->library('pagination');
			$this->config->load('pagination');
			
			$config = $this->config->item('pagination');        
			$config['base_url'] = base_url('player-resources-list/'.$cat_id);
			$config['total_rows'] = $total;
			$config['per_page'] = $per_page;
			$this->pagination->initialize($config); 
			$this->data['links'] = $this->pagination->create_links();

			$start=($page-1)*$per_page;

			$this->data['rows'] = $this->resource_model->get_rows(array('cat_id' => $cat_id), $start, $per_page, 'desc');
			$this->load->view("pages/player-resources-list", $this->data);	
		}
		else
			show_404();
	}
	
	function categories($cat_id = 0)
	{
		$this->data['rows'] = $this->category_model->get_rows(array('type' => 'resource'));
		$this->load->view("pages/player-resources", $this->data);

	}

	function detail($id)
	{
		$id = intval($id);
		if($this->data['row'] = $this->resource_model->get_row($id)) {
			$this->load->view('pages/player-resource-detail', $this->data);
		}
		else
			show_404();
	}

}
?>