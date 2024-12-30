<?php

function getUserByIdentifier($dbh, $identifier) {
    $stmt = $dbh->prepare('SELECT * FROM Person WHERE identifier = :identifier');
    $stmt->bindParam(':identifier', $identifier, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function validatePassword($inputPassword, $storedPassword) {
    return password_verify($inputPassword, $storedPassword);
}
?>
