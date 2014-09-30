<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Image extends MY_Controller {

    public function likeImage($image_id) {
        $result = $this->userObj->likeImage($image_id);

        echo $result;
    }

    public function unLikeImage($image_id) {
        $result = $this->userObj->unLikeImage($image_id);

        echo $result;
    }

    public function favImage($image_id) {
        $result = $this->userObj->favImage($image_id);

        echo $result;
    }

    public function unFavImage($image_id) {
        $result = $this->userObj->unFavImage($image_id);

        echo $result;
    }

    public function commentImage() {
        foreach ($this->input->post() as $key => $value) {
            $$key = $value;
        }

        if ($guestComment) {
            $this->load->library("ImageClass", "", "IMC");
            if($anon == "on" OR trim($guest_fullname) == ""){
                $guest_fullname = "Anonymous ".rand(0, 9999);
            }
            $this->IMC->makeImageComment($image_id, 0, $comment, $guest_fullname);
        } else {
            $this->userObj->commentImage($image_id, $comment);
        }

        $this->session->set_flashdata("msgbox", "success");
        $this->session->set_flashdata("msgmsg", "Successfully Commented");
        
        redirect(base_url("gallery/image/".$image_id));
    }

}

/* End of file image.php */
/* Location: ./application/controllers/image.php */