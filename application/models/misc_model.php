<?php

class Misc_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getCategory($category_id){
        $where = array(
            "id" => $category_id
        );
        $query = $this->db->get_where(TB_USER_CATEGORY, $where);
        
        if ($query->num_rows() > 0) {
            $result = $query->result()[0];            
            return $result->name;
        }else{
            return FALSE;
        }
        
    }
}

?>