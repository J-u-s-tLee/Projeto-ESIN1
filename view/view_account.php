<?php
session_start();

require_once('../database/init.php');
require_once('../database/account.php');

if (isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];
    $isSpeakerLecture = strpos($user_id, 'L') === 0;
    $isSpeakerWorkshop = strpos($user_id, 'W') === 0;
    $isParticipant = strpos($user_id, 'P') === 0;

    $userInfo = getPersonInfo($user_id);

    if($isSpeakerLecture) {
        $lectureInfo = getLecture($user_id);
        $travelInfo = getTravelInfo($user_id);
        $hotelInfo = getHotelInfo($user_id);
        $speakerLecture = getSpeakerLecture($user_id);
    }
    if($isSpeakerWorkshop) {
        $workshopInfo = getWorkshop($user_id);
        $speakerWorkshop = getSpeakerWorkshop($user_id);
    }
    $userLectures = getFullLecture($user_id);
    $userWorkshops = getFullWorkshop($user_id);
}

include_once('../templates/account_tpl.php');
?>