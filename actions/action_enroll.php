<?php
session_start();
$user_id = $_SESSION['user_id'];

include('../database/enrollment_info.php');
$registration_id = $user_id;

$success = handleEnrollment($dbh, $registration_id);

if ($success) {
    $_SESSION['registration'] = true;
    header('Location: ../view/list_enrollment.php');
}

?>