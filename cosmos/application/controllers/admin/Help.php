<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Help extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(6);
        $this->load->model('help_model');
        $this->load->model('category_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/help/index';
        
        $this->data['rows'] = $this->help_model->get_rows();
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/help/index';

        if ($this->input->post()) {
            $vals = $this->input->post();

            if (($_FILES["image"]["name"] != "")) {
                $image = upload_file(UPLOAD_PATH . "help/", 'image');
                if (!empty($image['file_name'])) {
                    $this->remove_file($this->uri->segment(4));
                    $vals['image'] = $image['file_name'];
                    generate_thumb(UPLOAD_PATH . "help/", UPLOAD_PATH . "help/", $image['file_name'], 300, 'thumb_');
                } else {
                    setMsg('error', 'Please upload a valid image file >> ' . strip_tags($image['error']));
                    redirect(ADMIN . '/help/manage/' . $this->uri->segment(4), 'refresh');
                    exit;
                }
            }
            // $vals['date'] = dbFormatDate($vals['date']);
            $this->help_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Player Resource has been saved successfully.');
            redirect(ADMIN . '/help', 'refresh');
            exit;
        }


        $this->data['row'] = $this->help_model->get_row($this->uri->segment('4'));
        $this->data['categories'] = $this->category_model->get_rows(array('type' => 'help'));

        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete($id)
    {
        $id = intval($id);
        $this->remove_file($id);
        $this->help_model->delete($id);
        setMsg('success', 'Player Resource has been deleted successfully.');
        redirect(ADMIN . '/help', 'refresh');
        exit;
    }

    private function remove_file($id)
    {
        $arr = $this->help_model->get_row($id);

        $filepath = UPLOAD_PATH . "/help/" . $arr->image;
        $filepath_thumb = UPLOAD_PATH . "/help/thumb_" . $arr->image;
        if (is_file($filepath))
            unlink($filepath);
        if (is_file($filepath_thumb))
            unlink($filepath_thumb);
        return;
    }

    /*** categories ***/

    function categories()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/help/categories';
        
        $this->data['rows'] = $this->category_model->get_rows(array('type' => 'help'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage_category()
    {
        $this->data['enable_editor'] = TRUE;
        $this->data['pageView'] = ADMIN . '/help/categories';
        if ($this->input->post()) {
            $vals = $this->input->post();
            $vals['type'] = 'help';

            $this->category_model->save($vals, $this->uri->segment(4));
            setMsg('success', 'Category has been saved successfully.');
            redirect(ADMIN . '/help/categories', 'refresh');
            exit;
        }

        $this->data['row'] = $this->category_model->get_row_where(array('id' => $this->uri->segment('4'), 'type' => 'help'));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function delete_category($id)
    {
        $id = intval($id);
        if ($this->category_model->get_row_where(array('id' => $id, 'type' => 'help'))) {
            if ($this->help_model->get_row_where(array('cat_id' => $id))) {
                setMsg('error',"Category has related help, It can't be deleted");
                redirect(ADMIN . '/help/categories', 'refresh');
                exit;
            }
            $this->category_model->delete($id);
            setMsg('success', 'Category has been deleted successfully.');
            redirect(ADMIN . '/help/categories', 'refresh');
            exit;
        }
        else
            show_404();
    }
}

?>