<?php
session_start();

require_once('../database/init.php');
require_once('../database/workshops.php');

try {
    $Workshop = getAllWorkshops();
    $SpeakerWorkshop = getAllSpeakerWorkshop();
    $Person = getAllPerson();
    $Activity = getAllActivity();
    $ParticipantWorkshop = getAllParticipantWorkshop();
    $Enrollment = getRegistrationById($_SESSION['user_id']);
    $firstLetter = substr($_SESSION['user_id'], 0, 1);
    $rowCount = getNumberOfWorkshops();
    $firstLetter = substr($_SESSION['user_id'], 0, 1);

} catch (PDOException $e) {
    $error_msg = $e->getMessage();
}

include_once('../templates/workshops_tpl.php');
?>