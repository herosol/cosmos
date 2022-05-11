<?php
class Page extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function player_guidelines() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'player_guidelines'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/player-guidelines', $this->data);
    }

    function privacy_policy() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'privacy_policy'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->load->view('pages/privacy-policy', $this->data);
    }

    function terms_conditions() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'terms_conditions'));
        $this->data['site_content'] =unserialize($this->data['content_row']->code);
        $this->load->view('pages/terms-conditions', $this->data);
    }

    function cookie_policy() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'cookie_policy'));
        $this->data['site_content'] =unserialize($this->data['content_row']->code);
        $this->load->view('pages/cookie-policy', $this->data);
    }

    function guarantee() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'guarantee'));
        $this->data['site_content'] =unserialize($this->data['content_row']->code);
        $this->load->view('pages/guarantee', $this->data);
    }

    function reservation_protection() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'reservation_protection'));
        $this->data['site_content'] =unserialize($this->data['content_row']->code);
        $this->load->view('pages/reservation-protection', $this->data);
    }

    function safety() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'safety'));
        $this->data['site_content'] =unserialize($this->data['content_row']->code);
        $this->load->view('pages/safety', $this->data);
    }

    function advertise() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'advertise'));
        $this->data['site_content'] =unserialize($this->data['content_row']->code);
        $this->load->view('pages/advertise', $this->data);
    }

    function services() {
        $this->data['services'] = $this->master->getRows('services');

        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'services'));
        $this->data['site_content'] =unserialize($this->data['content_row']->code);
        $this->load->view('pages/services', $this->data);
    }

    function contact() {
        $this->isMemLogged($this->session->mem_type);
        if ($this->input->post()) {
            $res=array();
            $res['hide_msg']=0;
            $res['scroll_to_msg']=0;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

            $this->form_validation->set_rules('type','Are you a pet buyer or a pet player?','required');
            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('subject','Subject','required');
            $this->form_validation->set_rules('email','Email','required|valid_email');
            $this->form_validation->set_rules('msg','Message','required');
            // $this->form_validation->set_rules('g-recaptcha-response','Robot','required',array('required'=>'Please verify that you are not robot!'));
            if($this->form_validation->run()===FALSE)
            {
                $res['msg'] = validation_errors();
            }else{
                $vals=$this->input->post();
                $vals['msg']=html_escape($this->input->post('msg'));
                /*$secret = RECAPTCHA_SECRET_KEY;
                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$vals['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
                if($response['success'] == true){*/

                    $vals['site_email'] = $this->data['site_settings']->site_email;
                    $vals['site_noreply_email'] = $this->data['site_settings']->site_noreply_email;
                    $okmsg = send_email($vals);
                    if($okmsg){
                        $res['msg'] = showMsg('success','Message send sucessfully!');

                        $res['status'] = 1;
                        $res['frm_reset'] = 1;
                        $res['hide_msg']=1;
                        // $res['redirect_url'] = site_url('contact-us');
                    }else{
                        $res['msg'] = showMsg('error','Error Occured!');

                    }
                /*}else{
                    $res['msg'] = showMsg('error','Please verify that you are not robot!');

                    // $res['redirect_url'] = site_url('contact-us');
                }*/
            }
            exit(json_encode($res));
        } else {
            $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'contact'));
            $this->data['site_content'] =unserialize($this->data['content_row']->code);
            $this->load->view('pages/contact', $this->data);
        }
    }
    
    function about() {
        $this->data['founders'] = $this->master->getRows('founders');
        
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'about'));
        $this->data['site_content'] =unserialize($this->data['content_row']->code);
        $this->load->view('pages/about', $this->data);
    }

    function help() {
        $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'help'));
        $this->data['site_content'] = unserialize($this->data['content_row']->code);
        $this->data['player_categories'] = $this->master->getRows('categories', array('type' => 'help', 'help_type' => 'player'));
        $this->data['buyer_categories'] = $this->master->getRows('categories', array('type' => 'help', 'help_type' => 'buyer'));

        $this->load->view('pages/help', $this->data);
    }

    function help_detail($id) {
        $id = intval($id);
        if ($this->data['row'] = $this->master->getRow('help',array('id' => $id))) {
            $this->data['content_row'] = $this->master->getRow('sitecontent', array('ckey' => 'help'));
            $this->data['site_content'] = unserialize($this->data['content_row']->code);
            $this->data['site_content']['page_title'] = $this->data['row']->title;
            $this->data['site_content']['meta_description'] = $this->data['row']->meta_description;
            $this->data['site_content']['meta_keywords'] = $this->data['row']->meta_keywords;
            $this->load->view('pages/help-detail', $this->data);
        }
        else
            show_404();
    }

    function error(){
        $this->load->view("pages/404", $this->data);   
    }

    // This is just for making chutiya
    function player_dashboard(){
        $this->load->view("player/dashboard", $this->data);   
    }
    function buyer_dashboard(){
        $this->load->view("buyer/dashboard", $this->data);   
    }
    function merchandise(){
        $this->load->view("pages/merchandise", $this->data);   
    }
    function product_detail(){
        $this->load->view("pages/product-detail", $this->data);   
    }
    function shopping_cart(){
        $this->load->view("pages/shopping-cart", $this->data);   
    }
    function checkout(){
        $this->load->view("pages/checkout", $this->data);   
    }
}
?>