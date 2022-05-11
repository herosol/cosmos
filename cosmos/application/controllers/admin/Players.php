<?php

class Players extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(2);
        $this->load->model('member_model');
        $this->load->model('character_model');
    }

    public function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/players';
        $this->data['rows'] = $this->member_model->get_rows(array('mem_type' => 'player', 'mem_player_verified' => 1));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function player_registrations()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/player-registrations';
        $this->data['rows'] = $this->member_model->get_rows(array('mem_type' => 'player', 'mem_player_verified' => 0, 'mem_player_application' => 0));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function manage()
    {
        $this->load->model('service_model');
        $this->data['pageView'] = ADMIN . '/players';
        $row = $this->member_model->getMember($this->uri->segment('4'));
        // pr($row);
        if ($this->input->post()) {
            $post = $this->input->post();
            $vals = $post;

            $vals['mem_dob'] = db_format_date($post['mem_dob']);
            $vals['mem_type'] = 'player';
            
            if($vals['mem_pswd']!='')
                $vals['mem_pswd'] = doEncode($vals['mem_pswd']);
            else
                unset($vals['mem_pswd']);

            if (($_FILES["mem_image"]["name"] != "")) {
                $image = upload_vfile('mem_image');
                if (!empty($image['file_name'])) {
                    if(!empty($row->mem_image))
                        remove_vfile($row->mem_image);
                    $vals['mem_image'] = $image['file_name'];
                }
            }
            if (($_FILES["mem_video"]["name"] != "")) {
                $image = upload_vfile('mem_video', 'video');
                if (!empty($image['file_name'])) {
                    if(!empty($row->mem_video))
                        remove_vfile($row->mem_video, 'att');
                    $vals['mem_video'] = $image['file_name'];
                }
            }
            
            $mem_id = $this->member_model->save($vals, $this->uri->segment(4));
            foreach ($_FILES['upload_files']['name'] as $key => $file_name) {
                $_FILES['image_file']['name'] = $file_name;
                $_FILES['image_file']['type'] = $_FILES['upload_files']['type'][$key];
                $_FILES['image_file']['tmp_name'] = $_FILES['upload_files']['tmp_name'][$key];
                $_FILES['image_file']['error'] = $_FILES['upload_files']['error'][$key];
                $_FILES['image_file']['size'] = $_FILES['upload_files']['size'][$key];
                if($_FILES['image_file']['name']!=''){
                    $image = upload_vfile('image_file');
                    if (!empty($image['file_name'])) {
                        $this->master->save('gallery', array('ref_id' => $mem_id,'image' => $image['file_name'], 'ref_type' => 'member', 'admin' => 1, 'date' => date('Y-m-d H:i:s')));
                    }
                }
            }
            foreach ($post['dlt_images'] as $key => $dlt_img) {
                remove_vfile($dlt_img);
                $this->master->delete_where('gallery', array('ref_id' => $mem_id, 'ref_type' => 'member', 'image' => $dlt_img, 'admin' => 1));
            }
            
            setMsg('success', 'Player has been saved successfully.');
            redirect(ADMIN . '/players/manage/' . $this->uri->segment(4), 'refresh');
            exit;
        }
        $this->data['characters'] = $this->character_model->get_rows();
        $this->data['mem_characters'] = @explode(',', $this->data['mem_data']->mem_characters);
        foreach ($this->data['mem_characters'] as $key => $char_id) {
            $this->data['character_images'][$char_id] = $this->character_model->get_character_images($this->session->mem_id, $char_id);
        }
        
        $this->data['enable_editor'] = TRUE;
        $this->data['row'] = $this->member_model->getMember($this->uri->segment('4'));
        // $this->data['row']->images = $this->master->getRows('gallery', array('ref_id' => $this->uri->segment('4'), 'ref_type' => 'member', 'admin' => 1));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function active()
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '1';
        $this->member_model->save($vals, $mem_id);
        setMsg('success', 'Player has been activated successfully.');
        redirect(ADMIN . '/players', 'refresh');
    }

    function inactive()
    {
        $mem_id = $this->uri->segment(4);
        $vals['mem_status'] = '0';
        $this->member_model->save($vals, $mem_id);
        setMsg('success', 'Player has been deactivated successfully.');
        redirect(ADMIN . '/players', 'refresh');
    }

    function delete()
    {
        has_access(10);
        $this->remove_file($this->uri->segment(4));
        // $this->remove_member_data($this->uri->segment(4));
        $this->member_model->delete($this->uri->segment('4'));
        setMsg('success', 'Player has been deleted successfully.');
        redirect(ADMIN . '/players', 'refresh');
    }

    function status()
    {
        echo $this->member_model->changeStatus($this->uri->segment('4'));
    }

    function remove_file($id, $type = '')
    {
        $arr = $this->member_model->getMember($id);
        $filepath = UPLOAD_PATH . "/players/" . $arr->image;
        $filepath_thumb = UPLOAD_PATH . "/players/thumb_" . $arr->image;
        $filepath_ico = UPLOAD_PATH . "/players/ico_" . $arr->image;
        if (is_file($filepath))
            unlink($filepath);
        if (is_file($filepath_thumb))
            unlink($filepath_thumb);
        if (is_file($filepath_ico))
            unlink($filepath_ico);
        return;
    }

    function transactions($id = 0)
    {
        if($this->data['member_row'] = $this->member_model->getMember($id)) {
            $this->load->model('transaction_model');
            $this->data['rows'] = $this->transaction_model->get_rows(array('mem_id' => $id), '', '', 'desc');
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/transactions';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }
        else
            show_404();

    }
    
    /*
    function withdraws($id = 0)
    {
        if($this->data['member_row'] = $this->member_model->getMember($id)) {
            $this->load->model('transaction_model');
            $this->data['rows'] = $this->transaction_model->get_player_withdraws($id);
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/withdraw-requests';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }
        else
            show_404();

    }
    */

    function chats($id=0)
    {
        if($this->data['member_row'] = $this->member_model->getMember($id, array('mem_type' => 'player'))) {
            $this->load->model('chat_model');
            $this->data['rows'] = $this->chat_model->get_mem_msgs_list($id);
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/chats';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }
        else
            show_404();
        
    }
    
    function bank_accounts($id = 0)
    {
        $id = intval($id);
        if($this->data['member_row'] = $this->member_model->getMember($id, array('mem_type' => 'player'))) {
            $this->load->model('payment_methods_model');
            $this->data['rows'] = $this->payment_methods_model->get_methods($id, true);
            $this->data['enable_datatable'] = TRUE;
            $this->data['pageView'] = ADMIN . '/bank-accounts';
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }
        else
            show_404();
    }

    /*
    function remove_member_data($id)
    {
        $gigs_rows = $this->comic_model->get_gigs(array('mem_id' => $id));
        foreach ($gigs_rows as $key => $gig) {
            $this->db->query("delete from `tbl_favorites` where ref_type = 'gig' and ref_id = ".$gig->id);
            $thumbpath = UPLOAD_IMAGES . "/gigs/" . $gig->thumbnail;
            if (is_file($thumbpath)) {
                unlink($thumbpath);
            }
            foreach ($gig->images as $key => $gimage) {
                $filepath = UPLOAD_PATH . "/gigs/" . $gimage->image;
                if (is_file($filepath)) {
                    unlink($filepath);
                }
                $this->comic_model->delete_image($image->id);
            }
            $this->comic_model->delete($gig->id);
        }
        $rows = $this->product_model->get_products(array('mem_id' => $id));
        foreach ($rows as $key => $product) {
            $thumbpath = UPLOAD_IMAGES . "/products/" . $product->thumbnail;
            if (is_file($thumbpath)) {
                unlink($thumbpath);
            }
            foreach ($product->images as $key => $image) {
                $filepath = UPLOAD_PATH . "/products/" . $image->image;
                if (is_file($filepath)) {
                    unlink($filepath);
                }
                $this->product_model->delete_image($image->id);
            }
            $this->db->query("delete from `tbl_favorites` where ref_type='product' and ref_id=".$product->id);
            $this->product_model->delete($product->id);
        }
    }
    */
}
?>