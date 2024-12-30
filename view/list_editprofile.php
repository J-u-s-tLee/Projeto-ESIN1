<?php
session_start();

require_once('../database/init.php');
require_once('../database/editprofile.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $isParticipant = strpos($user_id, 'P') === 0;
    $isSpeakerLecture = strpos($user_id, 'L') === 0;
    $isSpeakerWorkshop = strpos($user_id, 'W') === 0;

    $userInfo = getPersonInfo($user_id);

    if(!$isParticipant) {
        $LectureInfo = getSpeakerLecture($user_id);
        $WorkshopInfo = getSpeakerWorkshop($user_id);
    }
}

include_once('../templates/editprofile_tpl.php');
?>