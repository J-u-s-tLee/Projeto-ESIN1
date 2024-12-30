<?php
  session_start();

  require_once('database/init.php');
  require_once('database/users.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (strlen($username) == 0) {
    $_SESSION['msg'] = 'Invalid username!';
    header('Location: registration.php');
    die();
  }

  if (strlen($password) < 8) {
    $_SESSION['msg'] = 'Password must have at least 8 characters.';
    header('Location: registration.php');
    die();
  }

  try {
    insertUser($username, $password);
    saveProfilePic($username);

    $_SESSION['msg'] = 'Registration successful!';
    header('Location: list_categories.php');
  } catch (PDOException $e) {
    $error_msg = $e->getMessage();

    if (strpos($error_msg, 'UNIQUE')) {
      $_SESSION['msg'] = 'Username already exists!';
    } else {
      $_SESSION['msg'] = "Registration failed! ($error_msg)";
    }
    header('Location: registration.php');
  }
?>