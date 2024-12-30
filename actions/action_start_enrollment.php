<?php
session_start();
$user_id = $_SESSION['user_id'];
$firstLetter = substr($user_id, 0, 1);
$_SESSION['registration'] = false;
include('../database/enrollment_info.php'); 
$Enrollment = getEnrollmentInfo($user_id);

if ($Enrollment) {
    $_SESSION['registration'] = true;
}

include('../database/id_password.php');
$userInfo = getUserByIdentifier($dbh, $user_id);
?>