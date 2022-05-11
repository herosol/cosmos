<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Press extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        has_access(6);
        $this->load->model('press_model');
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/press';
        
        $this->data['rows'] = $this->press_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {

        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/press';

        if ($this->input->post()) {
            $vals = $this->input->post();

            if (($_FILES["image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "press/", 'image');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4), 'image');
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "press/", UPLOAD_PATH . "press/", $image['file_name'],575,'thumb_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/press/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            // $vals['date']=dbFormatDate($vals['date']);
            $vals['slug']=url_title(strtolower($vals['title']));
            $this->press_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Press has been saved successfully.');
            redirect(ADMIN . '/press', 'refresh');
            exit;
        }


        $this->data['row'] = $this->press_model->get_row($this->uri->segment('4'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id) {
        $id = intval($id);
        $this->remove_file($id);
        $this->press_model->delete($id);
        setMsg('success', 'Press has been deleted successfully.');
        redirect(ADMIN . '/press', 'refresh');
        exit;
    }

    function remove_file($id, $type = '') {
        $arr = $this->press_model->get_row($id);

        $filepath = UPLOAD_PATH . "/press/" . $arr->image;
        $filepath_thumb = UPLOAD_PATH . "/press/thumb_" . $arr->image;
        if (is_file($filepath)) {
            unlink($filepath);
        }
        if (is_file($filepath_thumb))
            unlink($filepath_thumb);
        return;
    }
}

?>