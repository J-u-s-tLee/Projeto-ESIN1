<?php
session_start();

$name = htmlspecialchars($_POST['name'] ?? '');
$age = htmlspecialchars($_POST['age'] ?? '');
$job_description = htmlspecialchars($_POST['job_description'] ?? '');
$food_restrictions = htmlspecialchars($_POST['food_restrictions'] ?? '');
$is_speaker = htmlspecialchars($_POST['is_speaker'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['name'] = $name;
    $_SESSION['age'] = $age;
    $_SESSION['job_description'] = $job_description;
    $_SESSION['food_restrictions'] = $food_restrictions;
    $_SESSION['is_speaker'] = $is_speaker;

    header('Location: ../view/list_register_2.php');
    exit();
}
?>
