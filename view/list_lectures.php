<?php
session_start();

require_once('../database/init.php');
require_once('../database/lectures.php');

try {
    $Lecture = getAllLectures();
    $SpeakerLecture = getAllSpeakerLecture();
    $Person = getAllPerson();
    $Activity = getAllActivity();
    $ParticipantLecture = getAllParticipantLecture();
    $Enrollment = getRegistrationById($_SESSION['user_id']);
    $rowCount = getNumberOfLectures();
    $firstLetter = substr($_SESSION['user_id'], 0, 1);

} catch (PDOException $e) {
    $error_msg = $e->getMessage();
}

include_once('../templates/lectures_tpl.php');
?>