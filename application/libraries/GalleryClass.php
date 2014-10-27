<?php

/**
 * Description of GalleryClass
 *
 * @author Raymond Ativie <RaymondAtivie.org>
 * @email RaymondAtivie@gmail.com
 * @copyright (c) 15-Sep-2014, Raymond Ativie
 */
class GalleryClass {

    public function searchImages($search, $cat, $type) {
        $CI = & get_instance();
        $CI->load->model("misc_model", "MCM", TRUE);
        $CI->load->library("obj/ImageObj", "", "IMO");

        $result = $CI->MCM->searchByTagsTitle($search, $cat, $type);

        if ($result) {
            foreach ($result as $v) {
                $images[] = clone $CI->IMO->getImageObj($v->id);
            }

            return $images;
        } else {
            return false;
        }
    }

    public function getAllImages() {
        $CI = & get_instance();
        $CI->load->model("Image_model", "IMM", TRUE);
        $CI->load->library("obj/ImageObj", "", "IMO");

        $result = $CI->IMM->getAllImages();
        if ($result) {
            foreach ($result as $v) {
                $images[] = clone $CI->IMO->getImageObj($v->id);
            }

            function personSort($a, $b) {
                return $a->date_time == $b->date_time ? 0 : ( $a->date_time > $b->date_time ) ? -1 : 1;
            }

            usort($images, 'personSort');

            return $images;
        } else {
            return false;
        }
    }

    public function getUserFollowingImages($user_id) {
        $CI = & get_instance();
        $CI->load->model("Image_model", "IMM", TRUE);
        $CI->load->library("obj/ImageObj", "", "IMO");

        $result = $CI->IMM->getFollowingUserImages($user_id);
        if ($result) {
            foreach ($result as $v) {
                $images[] = clone $CI->IMO->getImageObj($v->id);
            }

            return $images;
        } else {
            return false;
        }
    }

}

?>
