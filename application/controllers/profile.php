<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function index() {

        $data['user'] = $this->userObj;
        $data['user_images'] = $this->userObj->getImages();

        $this->load->view('include/head');
        $this->load->view('include/head_navbar');

        $this->load->view('profile_bar', $data);
        $this->load->view('profile_gallery');

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

    function page($username) {
        $this->load->library("obj/UserObj", "", "URO");
        $params = array(
            "value" => $username,
            "type" => "username");

        $user = $this->URO->getUserObj($params);
        if (!$user) {
            show_404();
        }elseif(!$this->loggedIn){
            $data['same'] = false;
        }elseif ($user->username == $this->userObj->username) {
            $data['same'] = true;
        }else{
            $data['same'] = false;
        }

        $this->load->library("UserClass", "", "URC");
        $this->URC->addProfileView($username);
        
        $data['user'] = $user;
        $data['user_images'] = $user->getImages();
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');

        $this->load->view('profile_bar', $data);
        $this->load->view('profile_gallery', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }
    
    public function followUser($follow_id) {
        $result = $this->userObj->followUser($follow_id);
        
        echo $result;
     
        if($result){
            $this->session->set_flashdata("msgbox", "success");
            $this->session->set_flashdata("msgmsg", "Successfully Followed");
        }else{            
            $this->session->set_flashdata("msgbox", "danger");
            $this->session->set_flashdata("msgmsg", "unsuccessfully unfollowed");
        }
    }
    
    public function unfollowUser($following_id) {
        $result = $this->userObj->unfollowUser($following_id);
        
        echo $result;
     
        if($result){
            $this->session->set_flashdata("msgbox", "success");
            $this->session->set_flashdata("msgmsg", "Successfully Followed");
        }else{            
            $this->session->set_flashdata("msgbox", "danger");
            $this->session->set_flashdata("msgmsg", "unsuccessfully unfollowed");
        }
    }

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */