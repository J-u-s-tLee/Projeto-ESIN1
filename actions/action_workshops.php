<?php
session_start();

require_once('../database/init.php');
require_once('../database/workshops.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sign_up']) && $_POST['sign_up'] == '1') {

    if (isset($_SESSION['user_id'])) {
        $room = $_POST['room'];
        $start_time = $_POST['start_time'];
        $workshop_id = $_POST['workshop_id'];

        try{
            signUpForWorkshop($user_id, $room, $start_time)
            header('Location: workshops.php');
            exit();

        } catch (PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    }
}
?>