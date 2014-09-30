<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ImageObj {

    var $id;
    var $file;
    var $title;
    var $description;
    var $tags;
    var $date_time;
    var $public;
    var $user_id;
    var $download;

    function __construct() {
        
    }

    function getImageObj($id) {

        $CI = & get_instance();
        $CI->load->model('Image_model', 'IMM', TRUE);
        $image = $CI->IMM->getImage($id);

        if (!$image) {
            //echo "USER DOESNT EXIST - (user object(libraries/obj/userobj.php) recieved EMAIL, USERNAME or ID of non existent user)";
            return FALSE;
        } else {
            foreach ($image as $k => $v) {
                $this->$k = $v;
            }
            return $this;
        }
    }

    function getImageUser() {
        $CI = & get_instance();
        $CI->load->library('obj/UserObj', "", 'URO');
        $params = array(
            "type" => "id",
            "value" => $this->user_id
        );
        $this->user = $CI->URO->getUserObj($params);

        return $this->user;
    }
    
    function getImageTags(){
        $tags = explode(",", $this->tags);
        
        return $tags;
    }
    
    function numLikes(){
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');
        
        $num = $CI->IMC->numLikes($this->id);
        return $num;
    }
    
    function numFavs(){
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');
        
        $num = $CI->IMC->numFavs($this->id);
        return $num;
    }
    
    function numViews(){
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');
        
        $num = $CI->IMC->numViews($this->id);
        return $num;
    }
    
    function getComments(){
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');
        
        $comments = $CI->IMC->getImageComments($this->id);
        return $comments;
    }   
    
    function addView(){
        $CI = & get_instance();
        $CI->load->library('ImageClass', "", 'IMC');
        
        $result = $CI->IMC->addImageView($this->id);
        return $result;
    }
    
}

/* End of file Someclass.php */