<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserObj {

    var $id;
    var $firstname;
    var $lastname;
    var $username;
    var $email;
    var $user_category;
    var $joined;
    var $status;
    var $profile_img;
    var $cover_img;

    function __construct() {
        
    }

    function getUserObj($params) {
        $usernameEmailID = $params['value'];
        $email_username_id = $params['type'];

        $CI = & get_instance();
        $CI->load->model('User_model', 'URM', TRUE);
        $user = $CI->URM->getUser($usernameEmailID, $email_username_id);

        if (!$user) {
            //echo "USER DOESNT EXIST - (user object(libraries/obj/userobj.php) recieved EMAIL, USERNAME or ID of non existent user)";
            return FALSE;
        } else {
            foreach ($user as $k => $v) {
                if ($k == "firstname" || $k == "lastname") {
                    $this->$k = ucfirst(strtolower($v));
                } else {
                    $this->$k = $v;
                }
            }

            return $this;
        }
    }

    function getCategory() {
        $CI = & get_instance();
        $CI->load->model('Misc_model', 'MCM', TRUE);
        $category = $CI->MCM->getCategory($this->user_category);

        return $category;
    }

    function getImages() {
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $this->images = $CI->IMC->getUserImages($this->id);

        function personSort($a, $b) {
            return $a->date_time == $b->date_time ? 0 : ( $a->date_time > $b->date_time ) ? -1 : 1;
        }

        usort($this->images, 'personSort');

        return $this->images;
    }
    
    function getFollowingImages() {
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $this->images = $CI->IMC->getUserFollowingImages($this->id);

        function personSort($a, $b) {
            return $a->date_time == $b->date_time ? 0 : ( $a->date_time > $b->date_time ) ? -1 : 1;
        }

        usort($this->images, 'personSort');

        return $this->images;
    }

}

/* End of file Someclass.php */