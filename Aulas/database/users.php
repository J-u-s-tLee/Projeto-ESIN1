<?php
  function loginSuccess($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT * FROM Users WHERE username = ? AND password = ?');
    $stmt->execute(array($username, hash('sha256', $password)));
    return $stmt->fetch();
  }

  function insertUser($username, $password) {
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO Users (username, password) VALUES (?, ?)');
    $stmt->execute(array($username, hash('sha256', $password)));
  }

  function saveProfilePic($username) {
    move_uploaded_file($_FILES['profile_pic']['tmp_name'], "images/users/$username.jpg");
  }
?>