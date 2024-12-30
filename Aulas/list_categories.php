<?php
  session_start();

  require_once('database/init.php');
  require_once('database/category.php');

  $msg = $_SESSION['msg'];
  unset($_SESSION['msg']);

  try {
    $categories = getAllCategories();
  } catch (PDOException $e) {
    $error_msg = $e->getMessage();
  }

  include_once('templates/header_tpl.php');
  include_once('templates/list_categories_tpl.php');
  include_once('templates/footer_tpl.php');
?>