<?php

class Characters extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(6);
        $this->load->model('character_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/characters';
        
        $this->data['rows'] = $this->character_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/characters';
        if ($this->input->post()) {
            $vals = $this->input->post();

            if (($_FILES["image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "characters/", 'image');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4), 'image');
                    $vals['image'] = $image['file_name'];
                } else {
                    setMsg('errorMsg', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/characters/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            $this->character_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Character has been saved successfully.');
            redirect(ADMIN . '/characters', 'refresh');
            exit;
        }

        $this->data['row'] = $this->character_model->get_row($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    /*function delete($id)
    {
        $id = intval($id);
        has_access(10);
        
        $this->load->model('pet_model');
        if ($this->pet_model->get_row_where(array('beed_id' => $id))) {
            setMsg('error', "This character has related pets, It can't be deleted");
            redirect(ADMIN . '/characters', 'refresh');
            exit;
        }
        
        $this->remove_file($id);
        $this->character_model->delete($id);
        setMsg('success', 'Character has been deleted successfully.');
        redirect(ADMIN . '/characters', 'refresh');
        exit;
    }
    */

    function remove_file($id, $type = '')
    {
        $arr = $this->character_model->get_row($id);

        $filepath = UPLOAD_PATH . "/characters/" . $arr->image;
        if (is_file($filepath))
            unlink($filepath);
        return;
    }
}

?>