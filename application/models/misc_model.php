<?php

class Misc_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getCategory($category_id) {
        $where = array(
            "id" => $category_id
        );
        $query = $this->db->get_where(TB_USER_CATEGORY, $where);

        if ($query->num_rows() > 0) {
            $result = $query->result()[0];
            return $result->name;
        } else {
            return FALSE;
        }
    }

    function searchByTitle($title) {
        $query = $this->db->query("SELECT * FROM " . TB_IMAGE . " WHERE `title` like '%" . $title . "%' ORDER BY `date_time` DESC");

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function searchByUsers($name) {
        $query = $this->db->query("SELECT * FROM " . TB_USERS . " "
                . "                WHERE `firstname` like '%" . $name . "%' "
                . "                OR `lastname` like '%" . $name . "%' "
                . "                OR `username` like '%" . $name . "%' ORDER BY `date_time` DESC");

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

    function searchByTags($tag) {
        $query = $this->db->query("SELECT * FROM " . TB_IMAGE . " WHERE `tags` like '%" . $tag . "%' ORDER BY `date_time` DESC");

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return FALSE;
        }
    }

    function searchByTagsTitle($search) {
        $query = $this->db->query("SELECT * FROM " . TB_IMAGE . " "
                . "                WHERE `tags` like '%" . $search . "%' "
                . "                OR `title` like '%" . $search . "%' ORDER BY `date_time` DESC");

        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        } else {
            return false;
        }
    }

}
