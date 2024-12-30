<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shop</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css"> 
    <link href="https://fonts.googleapis.com/css?family=Libre+Franklin%7CMerriweather" rel="stylesheet"> 
  </head>
  <body>
  <header>
      <h1><a href="list_categories.php">Shop</a></h1>

      <a id="cart" href="list_cart.php">
        Cart [
        <?php
          if (isset($_SESSION['cart'])) {
            echo count($_SESSION['cart']);
          } else {
            echo 0;
          }
        ?>
        ]
      </a>

      <?php if (!isset($_SESSION['username'])) { ?>
        <form action="action_login.php" method="post">
          <input type="text" placeholder="username" name="username">
          <input type="password" placeholder="password" name="password">
          <input type="submit" value="Login">
          <a href="registration.php">Register</a>
        </form>
      <?php } else { ?>
        <form id="logout" action="action_logout.php">
          <img src="images/users/<?php echo $_SESSION['username'] ?>.jpg">
          <span><?php echo $_SESSION['username'] ?></span>
          <button>Logout</button>
        </form>
      <?php } ?>

      <?php if (isset($msg)) { ?>
        <p><?php echo $msg ?></p>
      <?php } ?>

    </header>