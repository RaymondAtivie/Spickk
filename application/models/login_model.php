<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function registerUser($firstname, $lastname, $username, $email, $userCategoryID, $password) {
        $vEmail = $this->verifyUsernameEmail($email, "email");
        if ($vEmail) {
            $vUsername = $this->verifyUsernameEmail($username, "username");
            if ($vUsername) {
                $set = array(
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'username' => $username,
                    'email' => $email,
                    'user_category' => $userCategoryID,
                    'password' => $password
                );
                $this->db->insert(TB_USERS, $set);

                return TRUE;
            } else {
                return 'vUsername';
            }
        } else {
            return 'vEmail';
        }
    }

    function loginUser($usernameEmail, $password) {
        $where_or = array(
            "username" => $usernameEmail,
            "email" => $usernameEmail);
        $where = array(
            "password" => $password
        );

        $this->db->or_where($where_or);
        $this->db->where($where);
        $query = $this->db->get(TB_USERS);

        if ($query->num_rows() > 0) {
            $row = $query->result()[0];

            if ($row->status == 'active') {
                $params = array(
                    "value" => $row->id,
                    "type" => "id"
                );
                $this->load->library("obj/UserObj", "", "URO");
                $this->URO->getUserObj($params);
                
                return $this->URO;
            } elseif ($row->status == 'pending') {
                return 'pending';
            } elseif ($row->status == "inactive") {
                return 'inactive';
            }
        } else {
            return FALSE;
        }
    }

    function verifyUsernameEmail($usernameEmail, $username_email = "username") {
        $where = array(
            $username_email => $usernameEmail
        );
        $query = $this->db->get_where(TB_USERS, $where);

        if ($query->num_rows > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function addUserInfo() {
        
    }

}

?>