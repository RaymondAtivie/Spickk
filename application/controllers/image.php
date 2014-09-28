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

}

/* End of file image.php */
/* Location: ./application/controllers/image.php */