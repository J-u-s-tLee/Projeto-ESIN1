<?php
  session_start();

  require_once('database/init.php');
  require_once('database/users.php');

  // get username and password from HTTP parameters
  $username = $_POST['username'];
  $password = $_POST['password'];

  // if login successful:
  // - create a new session attribute for the user
  // - redirect user to main page
  // else:
  // - set error msg "Login failed!"
  // - redirect user to main page

  try {
    if (loginSuccess($username, $password)) {
      $_SESSION['username'] = $username;
    } else {
      $_SESSION['msg'] = 'Invalid username or password!';
    }
  } catch (PDOException $e) {
    $_SESSION['msg'] = 'Error: ' . $e->getMessage();
  }

  header('Location: list_categories.php');
?>