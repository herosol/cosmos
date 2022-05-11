<?php

class Chat extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(5);
        $this->load->model('chat_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/chats';

        $this->data['rows'] = $this->chat_model->get_chats();
        $this->load->view(ADMIN.'/includes/siteMaster', $this->data);
    }

    function messages($id = 0)
    {
        $id = intval($id);
        if($row = $this->chat_model->get_row($id)) {

            $this->data['mem_one']=$this->master->getRow('members', array('mem_id' => $row->mem_one));
            $this->data['mem_two']=$this->master->getRow('members', array('mem_id' => $row->mem_two));
            $this->data['messages']=$this->chat_model->get_chat_detail($id);

            $this->data['pageView'] = ADMIN . '/chat-messages';
            $this->load->view(ADMIN . '/includes/siteMaster',$this->data);
        }
        else
            show_404();
    }
}

?>