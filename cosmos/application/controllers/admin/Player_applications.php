<?php

class Player_applications extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->isLogged();
        has_access(3);
        $this->load->model('member_model');
    }

    function index()
    {
        $this->data['enable_datatable'] = TRUE;
        $this->data['pageView'] = ADMIN . '/player-applications';
        $this->data['rows'] = $this->member_model->get_rows(array('mem_type' => 'player', 'mem_player_application' => 1, 'mem_player_verified<>' => 1));
        $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
    }

    function view()
    {
        $this->load->model('character_model');
        $this->data['pageView'] = ADMIN . '/player-applications';
        if($this->data['row'] = $this->member_model->getMember($this->uri->segment('4'), array('mem_type' => 'player', 'mem_player_application' => 1, 'mem_player_verified<>' => 1))) {

            if ($this->input->post()) {
                $post = $this->input->post();
                $vals = $post;

                $vals['mem_player_verified'] = 1;
                $vals['mem_dob'] = db_format_date($post['mem_dob']);
                if($vals['mem_pswd'] != '')
                    $vals['mem_pswd'] = doEncode($vals['mem_pswd']);

                if (($_FILES["mem_image"]["name"] != "")) {
                    $image = upload_vfile('mem_image');
                    if (!empty($image['file_name'])) {
                        if(!empty($this->data['row']->mem_image))
                            remove_vfile($this->data['row']->mem_image);
                        $vals['mem_image'] = $image['file_name'];
                    }
                }

                $mem_id = $this->member_model->save($vals, $this->uri->segment(4));

                $mem_data = array('name' => $this->data['row']->mem_fname.' '.$this->data['row']->mem_lname, "email" => $this->data['row']->mem_email);

                if ($vals['mem_player_verified'] == 1) {
                    send_site_email($mem_data, 'approved_player');
                    setMsg('success', 'Player Application has been Approved successfully!');
                } elseif ($vals['mem_player_verified'] == 2) {
                    send_site_email($mem_data, 'declined_player');
                    setMsg('success', 'Player Application has been declined successfully!');
                } else {
                    setMsg('success', 'Player Application has saved successfully!');
                }

                redirect(ADMIN . '/player-applications', 'refresh');
                exit;
            }
            $this->data['enable_editor'] = TRUE;
            $this->data['characters'] = $this->character_model->get_rows();
            $this->load->view(ADMIN . '/includes/siteMaster', $this->data);
        }
        else
            show_404();
    }

    function declince($id = 0)
    {
        $mem_id = intval($id);
        if($mem_row = $this->member_model->getMember($mem_id, array('mem_type' => 'player', 'mem_player_application' => 1, 'mem_player_verified' => 0))) {

            $this->member_model->save(array('mem_player_verified' => 2), $mem_id);

            $mem_data = array('name' => $mem_row->mem_fname.' '.$mem_row->mem_lname, "email" => $mem_row->mem_email);
            send_site_email($mem_data, 'declined_player');

            setMsg('success', 'Player Application has been declined successfully.');
            redirect(ADMIN . '/player-applications/view/'.$mem_id, 'refresh');
            // redirect(ADMIN . '/player-applications', 'refresh');
            exit;
        }
        else
            show_404();
    }
}
?>