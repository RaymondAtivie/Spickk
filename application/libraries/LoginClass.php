<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoginClass {

    public function login($usernameEmail, $password) {
        $CI = & get_instance();
        $CI->load->model('Login_model', 'LGM', TRUE);

        $result = $CI->LGM->loginUser($usernameEmail, $password);

        return $result;
    }
    
    public function registerUser($firstname, $lastname, $username, $email, $userCategoryID, $password) {
        $CI = & get_instance();
        $CI->load->model('Login_model', 'LGM', TRUE);

        $result = $CI->LGM->registerUser($firstname, $lastname, $username, $email, $userCategoryID, $password);

        return $result;
    }

    public function setSessions($userObj) {
        $CI = &get_instance();

        $CI->session->set_userdata("userObj", serialize($userObj));
        $CI->session->set_userdata("userCategory", $userObj->getCategory());
        $CI->session->set_userdata("logged_in", "yes");
    }

    public function destroySessions() {
        $CI = &get_instance();

        $CI->session->unset_userdata("userObj");
        $CI->session->unset_userdata("userCategory");
        $CI->session->unset_userdata("logged_in");

        $CI->session->sess_destroy();
    }

}

/* End of file Someclass.php */