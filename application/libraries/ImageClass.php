<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ImageClass {

    public function uploadImage($file, $title, $description, $tags, $user_id) {
        $CI = &get_instance();
        $CI->load->model("image_model", "IMM", TRUE);

        $newFilename = $this->makeFileName($file, $title);

        $dateDir = date("d_m_Y");
        $DIR = "collection/original/" . $dateDir;

        if (!is_dir($DIR)) {
            mkdir($DIR);
        }

        $destination = $DIR . "/" . $newFilename;
        $newFilename = $dateDir . "/" . $newFilename;

        if (rename($file, $destination)) {
            $this->createThumbImages($newFilename);

            $CI->IMM->insertImage($newFilename, $title, $description, $tags, $user_id);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function makeFileName($filename, $title) {

        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $newFilename = str_replace(" ", "_", str_replace("'", "_", str_replace("\"", "_", $title)));

        $newFilename = $newFilename . "." . $ext;
        $newFilename = time() . "_" . $newFilename;

        return $newFilename;
    }

    public function getImage($image_id) {
        $CI = & get_instance();
        $CI->load->model("Image_model", "IMM", TRUE);
        $CI->load->library("obj/ImageObj", "", "IMO");

        $result = $CI->IMM->getImage($image_id);
        $image = $CI->IMO->getImageObj($result->id);

        return $image;
    }

    public function getUserImages($user_id) {
        $CI = & get_instance();
        $CI->load->model("Image_model", "IMM", TRUE);
        $CI->load->library("obj/ImageObj", "", "IMO");
        $result = $CI->IMM->getUserImages($user_id);

        foreach ($result as $k => $v) {
            $images[] = clone $CI->IMO->getImageObj($v->id);
        }

        return $images;
    }

    private function createThumbImages($filename) {
        $this->createThumbImage($filename, 100);
        $this->createThumbImage($filename, 150);
        $this->createThumbImage($filename, 300);
        $this->createThumbImage($filename, 400);
        $this->createThumbImage($filename, 600, NULL, FALSE);
        $this->createThumbImage($filename, 1000, NULL, FALSE);
    }

    private function createThumbImage($filename, $size1 = 300, $size2 = NUll, $square = TRUE) {
        $CI = &get_instance();
        $CI->load->library('PHPImageWorkshop/ImageWorkshop');

        $layer = ImageWorkshop::initFromPath("collection/original/" . $filename);

        $dirname = dirname($filename);
        $f = pathinfo($filename, PATHINFO_FILENAME);
        $e = pathinfo($filename, PATHINFO_EXTENSION);

        if ($square && $size2 == NULL) {
            $layer->cropMaximumInPixel(0, 0, "MM");
            $dirPath = "collection/thumb_" . $size1 . "_square/" . $dirname . "/";
        } else {
            $dirPath = "collection/thumb_" . $size1 . "x" . $size2 . "/" . $dirname . "/";
        }
        $layer->resizeInPixel($size1, $size2, true);

        $filename = $f . "." . $e;
        $createFolders = true;
        $backgroundColor = null; // transparent, only for PNG (otherwise it will be white if set null)
        $imageQuality = 95; // useless for GIF, usefull for PNG and JPEG (0 to 100%)

        $layer->save($dirPath, $filename, $createFolders, $backgroundColor, $imageQuality);
    }

    public function likeImage($user_id, $image_id) {
        if (!$this->checkLikeImage($user_id, $image_id)) {
            $CI = &get_instance();
            $CI->load->model("image_model", "IMM", TRUE);
            $result = $CI->IMM->likeImage($user_id, $image_id);

            return $result;
        } else {
            return false;
        }
    }

    public function unLikeImage($user_id, $image_id) {
        if ($this->checkLikeImage($user_id, $image_id)) {
            $CI = &get_instance();
            $CI->load->model("image_model", "IMM", TRUE);
            $result = $CI->IMM->unLikeImage($user_id, $image_id);

            return $result;
        } else {
            return false;
        }
    }

    public function checkLikeImage($user_id, $image_id) {
        $CI = &get_instance();
        $CI->load->model("image_model", "IMM", TRUE);

        $result = $CI->IMM->checkLikeImage($user_id, $image_id);

        return $result;
    }

    public function numLikes($image_id) {
        $CI = &get_instance();
        $CI->load->model("image_model", "IMM", TRUE);

        $result = $CI->IMM->countLikes($image_id);

        return $result;
    }

    public function favImage($user_id, $image_id) {
        if (!$this->checkFavImage($user_id, $image_id)) {
            $CI = &get_instance();
            $CI->load->model("image_model", "IMM", TRUE);
            $result = $CI->IMM->favImage($user_id, $image_id);

            return $result;
        } else {
            return false;
        }
    }

    public function unFavImage($user_id, $image_id) {
        if ($this->checkFavImage($user_id, $image_id)) {
            $CI = &get_instance();
            $CI->load->model("image_model", "IMM", TRUE);
            $result = $CI->IMM->unFavImage($user_id, $image_id);

            return $result;
        } else {
            return false;
        }
    }

    public function checkFavImage($user_id, $image_id) {
        $CI = &get_instance();
        $CI->load->model("image_model", "IMM", TRUE);

        $result = $CI->IMM->checkFavImage($user_id, $image_id);

        return $result;
    }

    public function numFavs($image_id) {
        $CI = &get_instance();
        $CI->load->model("image_model", "IMM", TRUE);

        $result = $CI->IMM->countFavs($image_id);

        return $result;
    }

    public function makeImageComment($image_id, $user_id, $comment, $guest_fullname = NULL) {
        $CI = & get_instance();
        $CI->load->model("image_model", "IMM", TRUE);

        $result = $CI->IMM->makeImageComment($image_id, $user_id, $comment, $guest_fullname);

        return $result;
    }

    public function getImageComments($image_id) {
        $CI = & get_instance();
        $CI->load->model("Image_model", "IMM", TRUE);
        $CI->load->library("obj/UserObj", "", "URO");

        $result = $CI->IMM->getImageComments($image_id);

        if ($result) {
            $i = 0;
            foreach ($result as $v) {
                if ($v->user_id != 0) {
                    $param = array(
                        "type" => "id",
                        "value" => $v->user_id
                    );
                    $tmpObj = clone $CI->URO->getUserObj($param);
                    $users[$i]['fullname'] = $tmpObj->firstname . " " . $tmpObj->lastname;
                    $users[$i]['username'] = $tmpObj->username;
                    $users[$i]['profile_img'] = $tmpObj->profile_img;
                    $users[$i]['comment'] = $v->comment;
                    $users[$i]['date_time'] = $v->date_time;
                } else {
                    $users[$i]['fullname'] = $v->guest_fullname;
                    $users[$i]['profile_img'] = "unknown.jpg";
                    $users[$i]['comment'] = $v->comment;
                    $users[$i]['date_time'] = $v->date_time;
                }
                $i++;
            }

            return $users;
        } else {
            return false;
        }
    }

}

/* End of file Someclass.php */