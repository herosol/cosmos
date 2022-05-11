<?php

class Questions extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        has_access(6);
        $this->load->model('question_model');
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/questions';
        
        $this->data['rows'] = $this->question_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/questions';
        if ($this->input->post()) {
            $vals = $this->input->post();

            $this->question_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Question has been saved successfully.');
            redirect(ADMIN . '/questions', 'refresh');
        }

        $this->data['row'] = $this->question_model->get_row($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete() {
        has_access(10);
        $this->question_model->delete($this->uri->segment('4'));
        setMsg('success', 'Question has been deleted successfully.');
        redirect(ADMIN . '/questions', 'refresh');
        exit;
    }
}

?>