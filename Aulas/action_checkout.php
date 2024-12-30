<?php
  session_start();

  require_once('database/init.php');
  require_once('database/order.php');

  try {
    # insert order in Orders table
    $order_id = insertOrderAndReturnId($_SESSION['username']);

    # insert cart products in OrderProduct table
    foreach ($_SESSION['cart'] as $product) {
      insertOrderProduct($order_id, $product['id'], $product['quantity']);
    }
  } catch (PDOException $e) {
    $_SESSION['msg'] = 'Error: ' . $e->getMessage();
    header('Location: list_cart.php');
    die();
  }

  # clear the cart and show success message
  unset($_SESSION['cart']);
  $_SESSION['msg'] = 'Your order has been placed!';
  header('Location: list_cart.php');
?>