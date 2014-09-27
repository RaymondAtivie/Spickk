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
        }elseif ($user->username == $this->userObj->username) {
            $data['same'] = true;
        }else{
            $data['same'] = false;
        }

        $data['user'] = $user;
        $data['user_images'] = $user->getImages();
        
        $this->load->view('include/head');
        $this->load->view('include/head_navbar');

        $this->load->view('profile_bar', $data);
        $this->load->view('profile_gallery', $data);

        $this->load->view('include/foot');
        $this->load->view('include/footer');
    }

}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */