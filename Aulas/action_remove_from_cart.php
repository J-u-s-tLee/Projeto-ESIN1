<?php
  session_start();

  $id = $_GET['id'];

  foreach ($_SESSION['cart'] as $index => $product) {
    if ($product['id'] == $id) {
      unset($_SESSION['cart'][$index]);
    }
  }

  # redirect user to wherever they were already
  header('location: ' . $_SERVER['HTTP_REFERER']);
?>
