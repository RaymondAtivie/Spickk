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
        $set = array(
            "follower_user_id" => $user_id,
            "following_user_id" => $following_id
        );
        $query = $this->db->insert(TB_FOLLOWING, $set);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function unfollowUser($user_id, $following_id) {
        $t = $this->checkFollowing($user_id, $following_id);
        if($t){
            $where = array("id"=>$t);
            $query = $this->db->delete(TB_FOLLOWING, $where);
            
            if($query->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }else{
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
            return $num['id'];
        } else {
            return false;
        }
    }

}
