<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function registerUser($firstname, $lastname, $username, $email, $userCategoryID, $password) {
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
                
                $user_id = $this->db->insert_id();

                return $user_id;
            } else {
                return 'vUsername';
            }
        } else {
            return 'vEmail';
        }
    }
    
    function createGeneralAlbum($user_id) {
        $CI = & get_instance();
        $CI->load->model("image_model", "IMM", TRUE);
        
        $name = "General";
        $description = "Uncategorized Images";
        
        $result = $CI->IMM->createAlbum($name, $description, $user_id);
        
        return $result;
    }

    function loginUser($usernameEmail, $password) {

        $where = array(
            "username" => $usernameEmail,
            "password" => $password
        );
        $where2 = array(
            "email" => $usernameEmail,
            "password" => $password
        );

        $this->db->where($where);
        $query = $this->db->get(TB_USERS);

        if ($query->num_rows < 1) {
            $this->db->where($where2);
            $query = $this->db->get(TB_USERS);
        }

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