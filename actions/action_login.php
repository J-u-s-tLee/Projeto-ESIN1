<?php
require_once('../database/init.php');
require_once('../database/id_password.php');

session_start();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $identifier = $_POST['identifier'];
    $password = $_POST['password'];

    $user = getUserByIdentifier($dbh, $identifier);

    if ($user) {
        if (validatePassword($password, $user['password'])) {
            $_SESSION['user_id'] = $user['identifier'];
            header("Location: ../view/view_account.php");
            exit;
        } else {
            $error_message = "Invalid credentials. Please try again.";
        }
    } else {
        $error_message = "Invalid credentials. Please try again.";
    }
}
?>
