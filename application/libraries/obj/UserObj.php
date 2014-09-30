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
            echo "USER DOESNT EXIST - (user object(libraries/obj/userobj.php) recieved EMAIL, USERNAME or ID of non existent user)";
            print_r($params);
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

        function pSort($a, $b) {
            return $a->date_time == $b->date_time ? 0 : ( $a->date_time > $b->date_time ) ? -1 : 1;
        }

        usort($this->images, 'pSort');

        return $this->images;
    }

    function followUser($follow_id) {
        $CI = & get_instance();
        $CI->load->model('User_model', 'URM', TRUE);

        $bool = $CI->URM->followUser($this->id, $follow_id);

        return $bool;
    }

    function unFollowUser($following_id) {
        $CI = & get_instance();
        $CI->load->model('User_model', 'URM', TRUE);

        $bool = $CI->URM->unfollowUser($this->id, $following_id);

        return $bool;
    }

    function isFollowing($following_id) {
        $CI = & get_instance();
        $CI->load->model('User_model', 'URM', TRUE);

        $bool = $CI->URM->checkFollowing($this->id, $following_id);

        return $bool;
    }

    function getFollowingImages() {
        $CI = & get_instance();
        $CI->load->library('GalleryClass', "", 'GLC');

        $this->images = $CI->GLC->getUserFollowingImages($this->id);

        function personSort($a, $b) {
            return $a->date_time == $b->date_time ? 0 : ( $a->date_time > $b->date_time ) ? -1 : 1;
        }

        usort($this->images, 'personSort');

        return $this->images;
    }

    function likeImage($image_id) {
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $bool = $CI->IMC->likeImage($this->id, $image_id);

        return $bool;
    }

    function unLikeImage($image_id) {
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $bool = $CI->IMC->unLikeImage($this->id, $image_id);

        return $bool;
    }

    function isLikedImage($image_id) {
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $bool = $CI->IMC->checkLikeImage($this->id, $image_id);

        return $bool;
    }
    
    function numFollowers(){
        $CI = & get_instance();
        $CI->load->model('User_model', 'URM', TRUE);

        $num = $CI->URM->countFollowers($this->id);

        return $num;
    }
    
    function numFavs(){
        $CI = & get_instance();
        $CI->load->model('User_model', 'URM', TRUE);

        $num = $CI->URM->countFavs($this->id);

        return $num;
    }

    function favImage($image_id) {
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $bool = $CI->IMC->favImage($this->id, $image_id);

        return $bool;
    }

    function unFavImage($image_id) {
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $bool = $CI->IMC->unFavImage($this->id, $image_id);

        return $bool;
    }

    function isFavedImage($image_id) {
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $bool = $CI->IMC->checkFavImage($this->id, $image_id);

        return $bool;
    }
    
    function commentImage($image_id, $comment){
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');

        $bool = $CI->IMC->makeImageComment($image_id, $this->id, $comment);

        return $bool;
    }
    
    function numProfileView(){
        $CI = & get_instance();
        $CI->load->library('UserClass', "", 'URC');

        $num = $CI->URC->getProfileCount($this->username);
        
        return $num;
    }
}

/* End of file Someclass.php */