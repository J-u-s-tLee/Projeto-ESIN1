<?php
session_start();

require_once('../database/init.php');
require_once('../database/lectures.php');

if (isset($_SESSION['user_id'])) {
    $room = $_POST['room'];
    $start_time = $_POST['start_time'];
    $lecture_id = $_POST['lecture_id'];
    try {
        signUpForLecture($user_id, $room, $start_time);
        header('Location: ../view/list_lectures.php');
        exit();
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>