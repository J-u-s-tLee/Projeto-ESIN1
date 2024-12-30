<?php
session_start();

require_once('../database/init.php');
require_once('../database/editprofile.php');

$user_id = $_SESSION['user_id'];
$target_dir = "../Images/";
$imageFileType = strtolower(pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION));
$uniqueFileName = uniqid('', true) . '.' . $imageFileType;
$target_file = $target_dir . $uniqueFileName;
$check = getimagesize($_FILES['profile_picture']['tmp_name']);

if ($check !== false) {
    $currentProfilePicture = getPersonPhoto($user_id);
    if ($currentProfilePicture && $currentProfilePicture !== 'default.png') {
        $oldFilePath = "../Images/" . $currentProfilePicture;
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
    }
    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {

        try{
            UpdatePersonPhoto($user_id, $target_file);
        }  catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "File is not an image.";
}
header('Location: ../view/view_editprofile.php');

?>