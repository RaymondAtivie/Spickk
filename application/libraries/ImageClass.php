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

    public function getUserFollowingImages($user_id) {
        $CI = & get_instance();
        $CI->load->model("Image_model", "IMM", TRUE);
        $CI->load->library("obj/ImageObj", "", "IMO");

        $result = $CI->IMM->getFollowingUserImages($user_id);
        foreach ($result as $k => $v) {
            $images[] = clone $CI->IMO->getImageObj($v->id);
        }

        return $images;
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

}

/* End of file Someclass.php */