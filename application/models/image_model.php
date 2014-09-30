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
        $result = $this->db->insert(TB_IMAGE, $set);
        
        if($result){
            return true;
        }else{
            return false;
        }
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
    
    function getAllImages() {
        $query = $this->db->get_where(TB_IMAGE);

        if ($query->num_rows() > 0) {
            $image = $query->result();
            
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
    
    function getUserFavImages($user_id) {
        $where = array(
            "user_id" => $user_id
        );
        $query = $this->db->get_where(TB_IMAGE_FAVS, $where);

        if ($query->num_rows() > 0) {
            $image = $query->result();
            return $image;
        } else {
            return FALSE;
        }
    }

    function getFollowingUserImages($user_id) {       
        $query = $this->db->query("SELECT *
                                    FROM ".TB_IMAGE." i
                                    WHERE EXISTS (SELECT *
                                    FROM ".TB_FOLLOWING." f
                                    WHERE f.follower_user_id = ".$user_id." AND f.following_user_id = i.user_id) OR i.user_id = ".$user_id." ORDER BY i.date_time DESC");

        if ($query->num_rows() > 0) {
            $image = $query->result();
            return $image;
        } else {
            return FALSE;
        }
    }
    
    public function likeImage($user_id, $image_id) {
        $set = array(
            "user_id"=>$user_id,
            "image_id"=>$image_id
        );
        $result = $this->db->insert(TB_IMAGE_LIKES, $set); 
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function unLikeImage($user_id, $image_id) {
        $where = array(
            "user_id"=>$user_id,
            "image_id"=>$image_id
        );
        $result = $this->db->delete(TB_IMAGE_LIKES, $where); 
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function checkLikeImage($user_id, $image_id) {
        $where = array(
            "user_id" => $user_id,
            "image_id" => $image_id
        );
        $query = $this->db->get_where(TB_IMAGE_LIKES, $where);

        if ($query->num_rows() > 0) {
            $num = $query->result()[0];
            return $num->id;
        } else {
            return false;
        }
    }
    
    public function countLikes($image_id) {
        $where = array(
            "image_id" => $image_id
        );
        $query = $this->db->get_where(TB_IMAGE_LIKES, $where);
        
        return $query->num_rows();
    }
    
    public function favImage($user_id, $image_id) {
        $set = array(
            "user_id"=>$user_id,
            "image_id"=>$image_id
        );
        $result = $this->db->insert(TB_IMAGE_FAVS, $set); 
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function unFavImage($user_id, $image_id) {
        $where = array(
            "user_id"=>$user_id,
            "image_id"=>$image_id
        );
        $result = $this->db->delete(TB_IMAGE_FAVS, $where); 
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function checkFavImage($user_id, $image_id) {
        $where = array(
            "user_id" => $user_id,
            "image_id" => $image_id
        );
        $query = $this->db->get_where(TB_IMAGE_FAVS, $where);

        if ($query->num_rows() > 0) {
            $num = $query->result()[0];
            return $num->id;
        } else {
            return false;
        }
    }
    
    public function countFavs($image_id) {
        $where = array(
            "image_id" => $image_id
        );
        $query = $this->db->get_where(TB_IMAGE_FAVS, $where);
        
        return $query->num_rows();
    }
    
    private function commentUserImage($image_id, $comment, $user_id) {
        $set = array(
            "user_id"=>$user_id,
            "image_id"=>$image_id,
            "comment"=>$comment
        );
        $result = $this->db->insert(TB_IMAGE_COMMENTS, $set); 
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    private function commentGuestImage($image_id, $comment, $guest_fullname) {
        $set = array(
            "user_id"=>0,
            "image_id"=>$image_id,
            "comment"=>$comment,
            "guest_fullname"=>$guest_fullname
        );
        $result = $this->db->insert(TB_IMAGE_COMMENTS, $set); 
        
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    public function makeImageComment($image_id, $user_id, $comment, $guest_fullname=NULL) {
        if($user_id == 0){
            $result = $this->commentGuestImage($image_id, $comment, $guest_fullname);
        }else{
            $result = $this->commentUserImage($image_id, $comment, $user_id);
        }
        
        return $result;
    }

    public function getImageComments($image_id){
        $where = array(
            "image_id" => $image_id
        );
        $this->db->order_by("date_time", "desc");
        $query = $this->db->get_where(TB_IMAGE_COMMENTS, $where);

        if ($query->num_rows() > 0) {
            $comments = $query->result();
            return $comments;
        } else {
            return FALSE;
        }
    }
    
    function addImageView($image_id, $identifier){
        $set = array(
            "image_id" => $image_id,
            "identifier" => $identifier
        );
        $result = $this->db->insert(TB_IMAGE_VIEWS, $set);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
    function checkIfViewed($image_id, $identifier){
        $where = array(
            "image_id" => $image_id,
            "identifier" => $identifier
        );
        $result = $this->db->get_where(TB_IMAGE_VIEWS, $where);

        if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
    function countImageViews($image_id){
        $where = array(
            "image_id" => $image_id
        );
        $result = $this->db->get_where(TB_IMAGE_VIEWS, $where);

        return $result->num_rows();
    }
}