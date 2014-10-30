<?php

/**
 * Description of notification_model
 *
 * @author Raymond Ativie
 */
class notification_model extends CI_Model {

    function addNotification($subject_id, $action, $object_id, $owner_id) {
        $set = array(
            "subject_id" => $subject_id,
            "action" => $action,
            "object_id" => $object_id,
            "owner_id" => $owner_id
        );
        $status = $this->db->insert(TB_NOTIFICATION, $set);

        if ($status) {
            return true;
        } else {
            return false;
        }
    }
    
    function getUserNotifications($user_id){
        $where = array(
            "owner_id"=>$user_id
        );
        $query = $this->db->get_where(TB_NOTIFICATION, $where);
        
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
    
    function getNotification($notification_id){
        $where = array(
            "id"=>$notification_id
        );
        $query = $this->db->get_where(TB_NOTIFICATION, $where);
        
        if($query->num_rows() > 0){
            return $query->result()[0];
        }else{
            return false;
        }
    }
    
    function seeNotification($notification_id, $owner_id){
        $set = array(
            "seen"=>"yes"
        );
        $where = array(
            "owner_id"=>$owner_id,
            "notification_id"=>$notification_id
        );
        $status = $this->db->update(TB_NOTIFICATION, $set, $where);

        if ($status) {
            return true;
        } else {
            return false;
        }
    }

}
