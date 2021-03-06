<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserClass {
    
    public function addProfileView($profile_username) {        
        $CI = & get_instance();
        $CI->load->model("user_model", "URM", TRUE);
                
        $identifier = $_SERVER['REMOTE_ADDR']."_".date("d-m-Y-a");
        if($CI->loggedIn){
            $identifier .= "_".$CI->userObj->id;
        }

        if(!$CI->URM->checkProfileViewed($profile_username, $identifier)){
            $result = $CI->URM->addProfileView($profile_username, $identifier);
            
            $CI->load->library("rankClass", "", "RKC");
            $CI->RKC->addUserAppreciation($profile_username, "profile_view");
        }else{
            $result = false;
        }        

        return $result;
    }
    
    public function getProfileCount($profile_username) {
        $CI = & get_instance();
        $CI->load->model("user_model", "URM", TRUE);
        
        $result = $CI->URM->countProfileViews($profile_username);
        
        return $result;
    }
}

/* End of file Someclass.php */