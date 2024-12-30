<?php
require_once('init.php');

function getEnrollmentInfo($user_id) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Registration WHERE registration_id = :user_id');
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function handleEnrollment($dbh, $registration_id) {
    $date_admitted = date('Y-m-d H:i:s'); 
    try {
        $stmt = $dbh->prepare('INSERT INTO Registration (registration_id, date_admitted) VALUES (:registration_id, :date_admitted)');
        $stmt->bindParam(':registration_id', $registration_id, PDO::PARAM_STR);
        $stmt->bindParam(':date_admitted', $date_admitted, PDO::PARAM_STR);
        $stmt->execute();
        return true; 
    } catch (PDOException $e) {
        return false;
    }
}
?>