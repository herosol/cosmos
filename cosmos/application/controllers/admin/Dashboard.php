<?php

class Dashboard extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
    }
    
    public function index()
    {
        $this->data['pageView'] = ADMIN."/dashboard";
        $this->data['dashboard'] = "1";
        $this->data['total_buyers'] = intval($this->master->num_rows('members', array('mem_type' => 'buyer')));
        $this->data['total_players'] = intval($this->master->num_rows('members', array('mem_type' => 'player')));

        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }
    
}

?>  