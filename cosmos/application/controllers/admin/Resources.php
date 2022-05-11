<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Resources extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->isLogged();
        has_access(6);
        $this->load->model('resource_model');
        $this->load->model('category_model');
    }

    public function index() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/resources/index';
        
        $this->data['rows'] = $this->resource_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage() {

        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/resources/index';

        if ($this->input->post()) {
            $vals = $this->input->post();

            if (($_FILES["image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "resources/", 'image');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "resources/", UPLOAD_PATH . "resources/", $image['file_name'],300,'thumb_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/resources/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            // $vals['date']=dbFormatDate($vals['date']);
            $vals['slug']=url_title(strtolower($vals['title']));
            $this->resource_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Sitter Resource has been saved successfully.');
            redirect(ADMIN . '/resources', 'refresh');
            exit;
        }


        $this->data['row'] = $this->resource_model->get_row($this->uri->segment('4'));
        $this->data['categories'] = $this->category_model->get_rows(array('type' => 'resource'));

        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id) {
        $id = intval($id);
        $this->remove_file($id);
        $this->resource_model->delete($id);
        setMsg('success', 'Sitter Resource has been deleted successfully.');
        redirect(ADMIN . '/resource', 'refresh');
        exit;
    }

    private function remove_file($id) {
        $arr = $this->resource_model->get_row($id);

        $filepath = UPLOAD_PATH . "/resources/" . $arr->image;
        $filepath_thumb = UPLOAD_PATH . "/resources/thumb_" . $arr->image;
        if (is_file($filepath))
            unlink($filepath);
        if (is_file($filepath_thumb))
            unlink($filepath_thumb);
        return;
    }

    /*** categories ***/

    function categories() {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/resources/categories';
        
        $this->data['rows'] = $this->category_model->get_rows(array('type' => 'resource'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_category() {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/resources/categories';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['type'] = 'resource';

            if (($_FILES["image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "categories/", 'image');
                if (!empty($image['file_name'])) {
                    $this->remove_cat_file($this->uri->segment(4));
                    $vals['image'] = $image['file_name'];
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/resources/manage-category/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }

            $this->category_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Category has been saved successfully.');
            redirect(ADMIN . '/resources/categories', 'refresh');
            exit;
        }

        $this->data['row'] = $this->category_model->get_row_where(array('id' => $this->uri->segment('4'), 'type' => 'resource'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_category($id) {
        $id = intval($id);
        if ($this->category_model->get_row_where(array('id' => $id, 'type' => 'resource'))) {
            if ($this->resource_model->get_row_where(array('cat_id' => $id))) {
                setMsg('error',"Category has related resource, It can't be deleted");
                redirect(ADMIN . '/resources/categories', 'refresh');
                exit;
            }
            $this->category_model->delete($id);
            $this->remove_cat_file($id);
            setMsg('success', 'Category has been deleted successfully.');
            redirect(ADMIN . '/resources/categories', 'refresh');
            exit;
        }
        else
            show_404();
    }

    private function remove_cat_file($id) {
        $arr = $this->category_model->get_row($id);

        $filepath = UPLOAD_PATH . "/categories/" . $arr->image;
        if (is_file($filepath))
            unlink($filepath);
        return;
    }
}

?>