<?php
session_start();

require_once('../database/init.php');
require_once('../database/editprofile.php');

$user_id = $_SESSION['user_id'];
$name = htmlspecialchars($_POST['name'] ?? '');
$age = htmlspecialchars($_POST['age'] ?? '');
$job_description = htmlspecialchars($_POST['job_description'] ?? '');
$food_restrictions = htmlspecialchars($_POST['food_restrictions'] ?? '');

if ($food_restrictions === 'other' && isset($_POST['food_restrictions_other'])) {
    $food_restrictions = htmlspecialchars($_POST['food_restrictions_other']);
}

if(!$isParticipant) {
    $nationality = htmlspecialchars($_POST['nationality'] ?? '');
    $place_residence = htmlspecialchars($_POST['place_residence'] ?? '');
}

UpdatePerson($user_id, $name, $age, $job_description, $food_restrictions);

if ($isSpeakerLecture) {
    try {
        UpdateSpeakerLecture($id, $nationality, $place_residence);
    }  catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
} elseif ($isSpeakerWorkshop) {
    try{
        UpdateSpeakerWorkshop($id, $nationality, $place_residence);
    }  catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
}

header('Location: ../view/view_account.php');
?>