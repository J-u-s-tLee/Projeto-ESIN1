<?php
  session_start();

  # if a cart doesn't exist yet, create an empty cart
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

  # create an array with all the information about the product
  $new_product = array(
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'quantity' => $_POST['quantity']
  );

  # add the product to the cart
  # (if the product already exists in the cart, just add to the quantity)
  $new_product_id = $_POST['id'];
  if (array_key_exists($new_product_id, $_SESSION['cart'])) {
    $_SESSION['cart'][$new_product_id]['quantity'] += $new_product['quantity'];
  } else {
    $_SESSION["cart"][$new_product_id] = $new_product;
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>