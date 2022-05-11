<?php

class Policies extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        has_access(6);
        $this->load->model('policy_model');
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/policies';
        
        $this->data['rows'] = $this->policy_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {
        if ($this->data['row'] = $this->policy_model->get_row($this->uri->segment('4'))) {

            $this->data['enable_editor'] = TRUE;
            $this->data['pageView'] = ADMIN . '/policies';
            if ($this->input->post()) {
                $vals = $this->input->post();

                $this->policy_model->save($vals, $this->uri->segment(4));
                setMsg('success', 'Policy has been saved successfully.');
                redirect(ADMIN . '/policies', 'refresh');
            }

            // $this->data['row'] = $this->policy_model->get_row($this->uri->segment('4'));
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }
        else
            show_404();
    }

    /*
    function delete() {
        has_access(10);
        $this->remove_file($this->uri->segment(4));
        $this->policy_model->delete($this->uri->segment('4'));
        setMsg('success', 'Policy has been deleted successfully.');
        redirect(ADMIN . '/policies', 'refresh');
    }
    */
}

?>