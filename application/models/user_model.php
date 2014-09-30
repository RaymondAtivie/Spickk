<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUser($usernameEmailID, $email_username_id = "id") {
        $where = array(
            $email_username_id => $usernameEmailID
        );
        $query = $this->db->get_where(TB_USERS, $where);

        if ($query->num_rows() > 0) {
            $user = $query->result()[0];
            return $user;
        } else {
            return FALSE;
        }
    }

    function followUser($user_id, $following_id) {
        $t = $this->checkFollowing($user_id, $following_id);
        if (!$t) {
            $set = array(
                "follower_user_id" => $user_id,
                "following_user_id" => $following_id
            );
            $status = $this->db->insert(TB_FOLLOWING, $set);

            if ($status) {
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }

    function unfollowUser($user_id, $following_id) {
        $t = $this->checkFollowing($user_id, $following_id);
        if ($t) {
            $where = array("id" => $t);
            $status = $this->db->delete(TB_FOLLOWING, $where);

            if ($status) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function checkFollowing($user_id, $following_id) {
        $where = array(
            "follower_user_id" => $user_id,
            "following_user_id" => $following_id
        );
        $query = $this->db->get_where(TB_FOLLOWING, $where);

        if ($query->num_rows() > 0) {
            $num = $query->result()[0];
            return $num->id;
        } else {
            return false;
        }
    }
    
    function countFollowers($user_id){
        $where = array(
            "following_user_id" => $user_id
        );
        $query = $this->db->get_where(TB_FOLLOWING, $where);
        
        return $query->num_rows();
    }
    
    function countUserFavs($user_id){
        $where = array(
            "user_id" => $user_id
        );
        $query = $this->db->get_where(TB_IMAGE_FAVS, $where);
        
        return $query->num_rows();
    }
    
    function addProfileView($profile_username, $identifier){
        $set = array(
            "profile_username" => $profile_username,
            "identifier" => $identifier
        );
        $result = $this->db->insert(TB_PROFILE_VIEWS, $set);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    function checkProfileViewed($profile_username, $identifier){
        $where = array(
            "profile_username" => $profile_username,
            "identifier" => $identifier
        );
        $result = $this->db->get_where(TB_PROFILE_VIEWS, $where);

        if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    function countProfileViews($profile_username) {
        $where = array(
            "profile_username" => $profile_username
        );
        $query = $this->db->get_where(TB_PROFILE_VIEWS, $where);
        
        return $query->num_rows();
    }
}
