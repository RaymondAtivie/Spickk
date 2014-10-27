<?php

/**
 * Description of rankClass
 *
 * @author Raymond Ativie
 */
class rankClass {

    function addUserAppreciation($user_id, $type, $negative = FALSE) {
        $CI = & get_instance();
        $CI->load->model("rank_model", "RKM", TRUE);

        if ($user_id < 1) {
            $params = array("type" => "username", "value" => $user_id);
            $CI->load->library("obj/UserObj", $params, "URO");
            $user_id = $CI->URO->getUserObj($params)->id;
        }

        $status = $CI->RKM->addUser_Appreciation($user_id, $type, $negative);
        return $status;
    }

    function addImageAppreciation($image_id, $type, $negative = FALSE) {
        $CI = & get_instance();
        $CI->load->library("obj/ImageObj", "", "IMO");

        $user_id = $CI->IMO->getImageObj($image_id)->user_id;

        $this->addUserAppreciation($user_id, $type, $negative);
    }

    function getUserAppreciation($user_id) {
        $CI = & get_instance();
        $CI->load->model("rank_model", "RKM", TRUE);

        $EDA = $CI->RKM->getUserAppreciationValue($user_id, "editors_choice");
        $photoLike = $CI->RKM->getUserAppreciationValue($user_id, "photo_like");
        $photoCollection = $CI->RKM->getUserAppreciationValue($user_id, "photo_collection");
        $photoComment = $CI->RKM->getUserAppreciationValue($user_id, "photo_comment");
        $profileViewed = $CI->RKM->getUserAppreciationValue($user_id, "profile_view");
        $profileFollowed = $CI->RKM->getUserAppreciationValue($user_id, "profile_followed");

        $total = ($EDA * 250) +
                ($photoLike * 10) +
                ($photoCollection * 20) +
                ($photoComment * 10) +
                ($profileViewed * 1) +
                ($profileFollowed * 50);
        
        $total /= 10;
        
        return $total;
    }

}
