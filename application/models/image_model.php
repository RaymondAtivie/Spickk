<?php

class Image_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insertImage($file, $title, $description, $tags, $user_id) {
        $set = array(
            "file" => $file,
            "title" => $title,
            "description" => $description,
            "tags" => $tags,
            "user_id" => $user_id
        );
        $this->db->insert(TB_IMAGE, $set);
    }

    function getImage($id) {
        $where = array(
            "id" => $id
        );
        $query = $this->db->get_where(TB_IMAGE, $where);

        if ($query->num_rows() > 0) {
            $image = $query->result()[0];
            return $image;
        } else {
            return FALSE;
        }
    }
    
    function getUserImages($user_id) {
        $where = array(
            "user_id" => $user_id
        );
        $query = $this->db->get_where(TB_IMAGE, $where);

        if ($query->num_rows() > 0) {
            $image = $query->result();
            return $image;
        } else {
            return FALSE;
        }
    }
    
    function getFollowingUserImages($user_id) {
        $where = array(
            "user_id" => $user_id
        );
        $query = $this->db->get_where(TB_IMAGE);

        if ($query->num_rows() > 0) {
            $image = $query->result();
            return $image;
        } else {
            return FALSE;
        }
    }

}

?>