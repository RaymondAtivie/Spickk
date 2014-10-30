<?php

/**
 * Description of notificationClass
 *
 * @author Raymond Ativie
 */
class notificationClass {

    function addNotification($subject_id, $action, $object_id, $owner_id) {
        $CI = & get_instance();
        $CI->load->model("notification_model", "NFM", TRUE);

        $status = $CI->NFM->addNotification($subject_id, $action, $object_id, $owner_id);

        return $status;
    }

    function getUserNotifications($user_id) {
        $CI = & get_instance();
        $CI->load->model("notification_model", "NFM", TRUE);

        $status = $CI->NFM->getUserNotifications($user_id);

        return $status;
    }

    function getNotification($notification_id) {
        $CI = & get_instance();
        $CI->load->model("notification_model", "NFM", TRUE);

        $status = $CI->NFM->getNotification($notification_id);

        return $status;
    }

    function writeNotification($notification_id) {
        $CI = & get_instance();

        $notif = $this->getNotification($notification_id);

        $CI->load->library("obj/UserObj.php", "", "URO");
        $paramsS = array("type" => "id", "value" => $notif->subject_id);
        $subjectObj = $CI->URO->getUserObj($paramsS);

        if ($notif->action == "follow") {
            $paramsO = array("type" => "id", "value" => $notif->subject_id);
            $objectObj = $CI->URO->getUserObj($paramsO);
        } else {
            $CI->load->library("obj/ImageObj.php", "", "IMO");
            $paramsO = $notif->object_id;
            $objectObj = $CI->IMO->getImageObj($paramsO);
        }

        $actionArray = array(
            "like" => "liked your",
            "follow" => "followed",
            "collection" => "added to thier collection your",
            "comment" => "commented on your"
        );

        if ($subjectObj->username == $CI->userObj->username) {
            $subject = "<span href='" . base_url("profile/page/" . $subjectObj->username) . "'>You</span>";
        } else {
            $subject = "<span href='" . base_url("profile/page/" . $subjectObj->username) . "'>{$subjectObj->getFullname()}</span>";
        }

        if ($notif->action == "follow") {
            $notificationText = "$subject followed You";
            $notification['type'] = "profile";
            $notification['link'] = base_url("profile/page/" . $subjectObj->username);
        } else {
            $notificationText = $subject
                    . " {$actionArray[$notif->action]} <span href='" . base_url("gallery/image/" . $objectObj->id) . "' title='{$objectObj->title}'>Photo</span>";

            $notification['type'] = "photo";
            $notification['link'] = base_url("gallery/image/" . $objectObj->id);
        }

        $notification['text'] = $notificationText;
        $notification['action'] = $notif->action;

        return $notification;
    }

    function getUserWrittenNotification($user_id) {
        $notifs = $this->getUserNotifications($user_id);

        if (is_array($notifs)) {
            foreach ($notifs as $notif) {
                $notifications[] = $this->writeNotification($notif->id);
            }

            return $notifications;
        } else {
            return false;
        }
    }

}
