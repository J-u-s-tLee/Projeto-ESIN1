<?php
session_start();

require_once('../database/init.php');
require_once('../database/workshops.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $room = $_POST['room'];
    $start_time = $_POST['start_time'];
    try{
        signUpForWorkshop($user_id, $room, $start_time);
        header('Location: ../view/list_workshops.php');
        exit();
    } catch (PDOException $e){
        echo "Erro: " . $e->getMessage();
    }
}
?>