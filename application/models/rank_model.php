<?php

class Rank_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    private function checkUserExist($user_id) {
        $where = array(
            "user_id" => $user_id
        );
        $query = $this->db->get_where(TB_USERS_APPRECIATION, $where);

        if ($query->num_rows() > 0) {
            return true;
        } else {
            $set = array(
                "user_id" => $user_id
            );
            $status = $this->db->insert(TB_USERS_APPRECIATION, $set);
            if ($status) {
                return true;
            } else {
                return false;
            }
        }
    }

    function addUser_Appreciation($user_id, $type, $negative=FALSE) {
        if ($this->checkUserExist($user_id)) {
            $this->db->where("user_id", $user_id);
            if($negative){
                $this->db->set($type, "$type-1", FALSE);
            }else{
                $this->db->set($type, "$type+1", FALSE);
            }
            

            $status = $this->db->update(TB_USERS_APPRECIATION);
            if ($status) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function getUserAppreciationValue($user_id, $type) {
        if ($this->checkUserExist($user_id)) {
            $where = array(
                "user_id"=>$user_id
            );
            
            $query = $this->db->get_where(TB_USERS_APPRECIATION, $where);
            
            return $query->result()[0]->$type;
        }
    }

}
