<?php
require_once '../database/init.php';
require_once '../actions/action_session_helpers.php';

$name = get_session_data('name');
$age = get_session_data('age');
$job_description = get_session_data('job_description');
$food_restrictions = get_session_data('food_restrictions');
$is_speaker = get_session_data('is_speaker');

$speaker_identifier = htmlspecialchars($_POST['speaker_identifier'] ?? '');
$speaker_type = htmlspecialchars($_POST['speaker_type'] ?? '');
$nationality = htmlspecialchars($_POST['nationality'] ?? '');
$place_residence = htmlspecialchars($_POST['place_residence'] ?? '');
$password = $_POST['password'] ?? '';
$password_confirm = $_POST['password_confirm'] ?? '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../database/registration.php';
}

include_once('../templates/register_2.php');
?>