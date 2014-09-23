<?php

class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getUser($usernameEmailID, $email_username_id="id"){
        $where = array(
            $email_username_id => $usernameEmailID
        );
        $query = $this->db->get_where(TB_USERS, $where);
        
        if ($query->num_rows() > 0) {
            $user = $query->result()[0];            
            return $user;
        }else{
            return FALSE;
        }        
    }
}

?>