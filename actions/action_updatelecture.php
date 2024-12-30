<?php 
session_start();

require_once('../database/init.php');
require_once('../database/account.php');
$user_id = $_SESSION['user_id'];

$title = $_POST['title'];
$description = $_POST['description'];

try {
    UpdateLecture($user_id, $title, $description);
    header('Location: ../view/list_account.php');
} catch (PDOException $e) {
    $error_msg = $e->getMessage();
}
?>