<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('member_model', 'member');
	}

    function expire_membership(){
        $this->maste->query("update tbl_members set mem_pkg_status=2, mem_membership_pref=0 where mem_membership_auto=1 and mem_pkg_status=1 and TIMESTAMPDIFF(DAY, mem_pkg_expiry_date, CURRENT_TIMESTAMP)>1");
    }

	function newsletter()
	{
        $res=array();
        $res['hide_msg']=0;
            $res['scroll_to_msg']=1;
            $res['status'] = 0;
            $res['frm_reset'] = 0;
            $res['redirect_url'] = 0;

        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[newsletter.email]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already joined.'
            ));
        if($this->form_validation->run()===FALSE)
        {
            $res['msg'] = validation_errors();
            $res['status'] = 0;
        }
		else
		{
            $email=html_escape($this->input->post('email'));

            $this->master->save('newsletter',array('email'=>$email,'mem_id'=>$this->session->mem_id));
            $res['msg'] = showMsg('success','Joined successful!');
            $res['status'] = 1;
            $res['frm_reset'] = 1;
            $res['hide_msg']=1;
        }
        exit(json_encode($res));
    }

	function follow(){
		$this->isMemLogged('member');

		$id=intval(substr(doDecode($this->input->post('store')),2));
		if($this->member->getMember($id,array('mem_status'=>1,'mem_verified'=>1))){

			if($this->master->getRow('followers',array('follower_id'=>$this->session->mem_id,'mem_id'=>$id))){
				$this->db->where(array('follower_id'=>$this->session->mem_id,'mem_id'=>$id));
				$this->db->delete('followers');
				$res['data']='Follow';
			}
			else{
				$this->master->save('followers',array('follower_id'=>$this->session->mem_id,'mem_id'=>$id));
				$txt=' starts Following you';
				$this->save_notificaiton($id,$this->session->mem_id,$txt);
				$res['data']='<i class="fa fa-check"></i> Following';
			}
			// echo $res['data'];
			exit(json_encode($res));
		}
		die('access denied!');
	}
    
	function fb_callback() {
		include_once APPPATH . "libraries/Facebook/autoload.php";
		$fb = new Facebook\Facebook(array(
			'app_id' => '513833342331811',
			'app_secret' => '8a7378961461fd4c002f70e234e30a4a',
			'default_graph_version' => 'v2.9'
		));
		$helper = $fb->getRedirectLoginHelper();
		try {
			$accessToken = $helper->getAccessToken();
		} catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		if (!isset($accessToken)) {
			if ($helper->getError()) {
				header('HTTP/1.0 401 Unauthorized');
				echo "Error: " . $helper->getError() . "\n";
				echo "Error Code: " . $helper->getErrorCode() . "\n";
				echo "Error Reason: " . $helper->getErrorReason() . "\n";
				echo "Error Description: " . $helper->getErrorDescription() . "\n";
			} else {
				header('HTTP/1.0 400 Bad Request');
				echo 'Bad request';
			}
			exit;
		}
		$this->session->set_userdata('fb_access_token', (string) $accessToken);
		$res = $fb->get('/me', $accessToken);
		$user = $res->getGraphObject();
		$data = array();
		$data['access_token'] = $accessToken;
		$data['name'] = $user->getProperty('name');
		$data['email'] = $user->getProperty('email');
		$data['social_id'] = trim($user->getProperty('id'));

		if (!empty($data['name']) && !empty($data['social_id']) && !empty($data['access_token'])) {
			if ($mem = $this->member->socialIdExists('facebook', $data['social_id'])) {

				$this->member->update_last_login($mem->mem_id);
				$this->session->set_userdata('mem_type', $mem->mem_type);
				$this->session->set_userdata('mem_id', $mem->mem_id);
			} else {
				$image='';
				if(!empty($data['image'])){
					
					$image = file_get_contents($data['image']);
					$file_name=md5(rand(100, 1000)) . '_' .time() . '_' . rand(1111, 9999). '.jpg';

					$dir = UPLOAD_VPATH . 'vp/'.$file_name;
					@file_put_contents($dir, $image);

					generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p50x50/", $file_name, 50);
					generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p150x150/", $file_name, 150);
					generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p300x300/", $file_name, 300);

					$image=$file_name;
				}

				if($data['email']!=''){
					$mem_row = $this->member->emailExists($data['email']);
					if (count($mem_row) > 0)
						$data['email']='';

				}

				$arr = explode(" ", $data['name']);
				$new_vals = array(
					'mem_type' => 'student',
					'mem_social_type' => 'facebook',
					'mem_social_id' => $data['social_id'],
					'mem_fname' => $arr[0],
					'mem_lname' => $arr[1],
					'mem_email' => $data['email'],
					'mem_status' => '1',
					'mem_verified' => '1',
					'mem_image' => $image
				);
				$this->load->library('my_braintree');
        		$new_vals['mem_braintree_id']=$this->my_braintree->create_customer(array('firstName' => ucfirst($new_vals['mem_fname']),'lastName' => ucfirst($new_vals['mem_lname']),'email' => $new_vals['mem_email']));
        		
				$mem_id = $this->member->save($new_vals);
				
				$this->member->update_last_login($mem_id);
				$this->session->set_userdata('mem_type', 'student');
				$this->session->set_userdata('mem_id', $mem_id);
				// $this->sendEmail();
			}
			$redirect_url=$this->session->mem_type=='student'?'account-settings':'dashboard';
			redirect($redirect_url, 'refresh');
			exit;
		}
	}

	function google_callback() {
		include_once APPPATH . "libraries/Google/autoload.php";

		$client_id = '64946543542-d5qjd9vp2f71qrd62p13l1ftbeon40dg.apps.googleusercontent.com';
		$client_secret = 'h3Fkf00VUVHvSAMf4aLFhefG';
		$redirect_uri = base_url('google-callback');

		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);

		$client->authenticate($_GET['code']);
		$accessToken = $client->getAccessToken();
		$client->setAccessToken($accessToken);

		$service = new Google_Service_Oauth2($client);
		$data = array();
        $user = $service->userinfo->get(); //get user info 

        $data['access_token'] = $accessToken;
        $data['social_id'] = $user->id;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['image'] = $user->picture;
        if (!empty($data['name']) && !empty($data['social_id']) && !empty($data['access_token'])) {


        	if ($mem = $this->member->socialIdExists('google', $data['social_id'])) {

        		$this->member->update_last_login($mem->mem_id);
        		$this->session->set_userdata('mem_type', $mem->mem_type);
        		$this->session->set_userdata('mem_id', $mem->mem_id);
        	} else {

        		$image='';
        		if(!empty($data['image'])){
        			
        			$image = file_get_contents($data['image']);
        			$file_name=md5(rand(100, 1000)) . '_' .time() . '_' . rand(1111, 9999). '.jpg';

        			$dir = UPLOAD_VPATH . 'vp/'.$file_name;
        			@file_put_contents($dir, $image);

        			generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p50x50/", $file_name, 50);
        			generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p150x150/", $file_name, 150);
        			generate_thumb(UPLOAD_VPATH . "vp/", UPLOAD_VPATH . "p300x300/", $file_name, 300);

        			$image=$file_name;
        		}
        		if($data['email']!=''){
        			$mem_row = $this->member->emailExists($data['email']);
        			if (count($mem_row) > 0)
        				$data['email']='';

        		}

        		$arr = explode(" ", $data['name']);
        		$new_vals = array(
        			'mem_type' => 'student',
        			'mem_social_type' => 'google',
        			'mem_social_id' => $data['social_id'],
        			'mem_fname' => $arr[0],
        			'mem_lname' => $arr[1],
        			'mem_email' => $data['email'],
        			'mem_status' => '1',
        			'mem_verified' => '1',
        			'mem_image' => $image
        		);

        		$this->load->library('my_stripe');
        		$new_vals['mem_stripe_id']=$this->my_stripe->save_customer(array('name' => ucfirst($new_vals['mem_fname']).' '.ucfirst($new_vals['mem_lname']),'email' => $new_vals['mem_email'],"description" => "Crainly Customer ".ucfirst($new_vals['mem_fname']).' '.ucfirst($new_vals['mem_lname'])));

        		$mem_id = $this->member->save($new_vals);

        		$this->member->update_last_login($mem_id);
        		$this->session->set_userdata('mem_type', 'student');
        		$this->session->set_userdata('mem_id', $mem_id);
        		// $this->sendEmail();
        	}
        }
        $redirect_url=$this->session->mem_type=='student'?'account-settings':'dashboard';
        redirect($redirect_url, 'refresh');
        exit;
    }
    function twitter_callback() {
    	include_once APPPATH . "libraries/Twitter/autoload.php";
    	
    	$client_id = '  ihs0ekv7iq91XlLbvACwod4jA';
    	$client_secret = 'N0JnOSSL8BYH8a5ISPHp0YMSHatZFLa3TZfLcBfySTjetG6a0r';
    	$redirect_uri = site_url('ajax/twitter_callback');

    	$request_token = [];
    	$request_token['oauth_token'] = $this->session->oauth_token;
    	$request_token['oauth_token_secret'] = $this->session->oauth_token_secret;

    	$this->session->unset_userdata('oauth_token');
    	$this->session->unset_userdata('oauth_token_secret');

    	if ($this->input->get('oauth_token') && $request_token['oauth_token'] === $this->input->get('oauth_token')) {


    		$connection = new Abraham\TwitterOAuth\TwitterOAuth($client_id, $client_secret, $request_token['oauth_token'], $request_token['oauth_token_secret']);
    		$access_token = $connection->oauth("oauth/access_token", array("oauth_verifier" => $this->input->get('oauth_verifier')));

    		$connection = new Abraham\TwitterOAuth\TwitterOAuth($client_id, $client_secret, $access_token['oauth_token'], $access_token['oauth_token_secret']);

    		$data = array();
    		$user = $connection->get("account/verify_credentials");
    		pr($user);

    		$data['access_token'] = $accessToken;
    		$data['social_id'] = $user->id;
    		$data['name'] = $user->name;
    		$data['email'] = $user->email;
    		$data['image'] = $user->profile_image_url;
    		if (!empty($data['name']) && !empty($data['social_id']) && !empty($data['access_token'])) {


    			if ($mem = $this->member->socialIdExists('twitter', $data['social_id'])) {

    				$this->member->update_last_login($mem->mem_id);
    				$this->session->set_userdata('mem_type', $mem->mem_type);
    				$this->session->set_userdata('mem_id', $mem->mem_id);
    			} else {

    				$image='';
    				if(!empty($data['image'])){
    					$res=curl_call(SCONTENT_SITE.'ajax/save_mem_social_image',"image=".$data['image']);
    					if($res)
    						$image=$res;
    				}
    				if($data['email']!=''){
    					$mem_row = $this->member->emailExists($data['email']);
    					if (count($mem_row) > 0)
    						$data['email']='';

    				}

    				$arr = explode(" ", $data['name']);
    				$new_vals = array(
    					'mem_type' => 'member',
    					'mem_social_type' => 'google',
    					'mem_social_id' => $data['social_id'],
    					'mem_fname' => $arr[0],
    					'mem_lname' => $arr[1],
    					'mem_email' => $data['email'],
    					'mem_status' => '1',
    					'mem_verified' => '1',
    					'mem_image' => $image
    				);

    				$mem_id = $this->member->save($new_vals);

    				$this->member->update_last_login($mem_id);
    				$this->session->set_userdata('mem_type', 'member');
    				$this->session->set_userdata('mem_id', $mem_id);
        		// $this->sendEmail();
    			}
    		}
    	}
    	$redirect_url=$this->session->mem_type=='student'?'account-settings':'dashboard';
    	redirect($redirect_url, 'refresh');
    	exit;
    }
    function get_schedule_episodes() {
    	$day=$this->input->post('day');
    	$week_days=get_week_days();

    	$res['items'] = "";
    	$res['found'] = 0;
    	if(in_array($day, $week_days)){
    		$this->load->model('episode_model');
    		$schedule_episodes = $this->episode_model->get_schedule_episodes($day,'',8);
    		$res['found'] = 1;
    		if (count($schedule_episodes) > 0) {
    			foreach ($schedule_episodes as $schedule_episode) {
    				$res['items'] .= 
    				'<li>
    				<div class="iTem">
    				<div class="image" style="background-image: url(\''.get_image_src($schedule_episode->thumbnail,300).'\')">
    				<a href="'.comic_url($schedule_episode->comic_id,$schedule_episode->comic_title).'" class="overlay"></a>
    				</div>
    				<!--<div class="heart">
    				'.favorite_btn($schedule_episode->id,'episode',$schedule_episode->total_favorites).'
    				</div>-->
    				<div class="ico"><a href="'. profile_url($schedule_episode->mem_id,$schedule_episode->mem_name).'"><img src="'. get_image_src($schedule_episode->mem_image,50,true).'" alt=""></a></div>
    				<div class="cntnt">
    				<h4><a href="'. comic_url($schedule_episode->comic_id,$schedule_episode->comic_title).'">'. $schedule_episode->title.'</a></h4>
    				<!--<div class="rateYo" data-rateyo-rating="'.get_avg_rating($schedule_episode->comic_id,'comic').'" data-rateyo-read-only="true"></div>-->
    				<div class="chBlk">
    				<div class="ch">CH '.$schedule_episode->episode_no.'</div>
    				</div>
    				</div>
    				</div>
    				</li>';
    			}
    		} else {
    			$res['items'] = "<li>No comic schedule on ".$day."</li>";
    		}
    	}
    	exit(json_encode($res));
    }
    function get_subjects() {
    	// $this->isMemLogged($this->session->mem_type);
    	$res['option'] = "";
    	if ($this->input->post('subject')>0) {
    		$subject_rows = $this->master->getRows("subjects",array('parent_id'=>intval($this->input->post('subject')),'status'=>1));
    		if (count($subject_rows) > 0) {
    			foreach ($subject_rows as $index=> $subject_row) {
    				$tutor_subject=null;

    				$post_mem_id=$this->input->post('mem_id');
    				$mem_id=empty($post_mem_id)?$this->session->mem_id:intval($post_mem_id);
    				// $mem_id=empty($this->session->mem_id)?intval($this->input->post('mem_id')):$this->session->mem_id;
    				if ($mem_id>0)
    					$tutor_subject=$this->master->getRow('tutor_subjects',array('mem_id'=>$mem_id,'subject_id'=>$subject_row->id,'type'=>'sub'));

    				$res['option'] .= '
    				<li class="lblBtn">
    				<input type="checkbox" name="subjects['.$index.']" value="'.$subject_row->id.'" id="'.$subject_row->name.'" class="atlst_one" '.($tutor_subject?'checked':'').'>
    				<label for="'.$subject_row->name.'">'.$subject_row->name.'</label>
    				</li>';
    			}
    			$res['found'] = 1;
    		} else {
    			$res['option'] = '<li class="lblBtn">No Subject Found</li>';
    			$res['found'] = 0;
    		}
    	}
    	exit(json_encode($res));
    }

    function search_subject() {
    	$q=$this->input->post('query');

    	$this->db->where("status",1);
    	$this->db->like('name', $q, 'after');
		$query=$this->db->get('subjects');
		// $this->db->limit(100);
    	$rows=array();
    	foreach ($query->result() as $row) {
    		$rows[]=array('label'=>$row->name,'value'=>$row->name,'id'=>$row->id);
    	}
    	exit(json_encode($rows));
    }
}

?>