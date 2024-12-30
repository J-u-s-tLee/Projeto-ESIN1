<?php
  session_start();

  require_once('database/init.php');
  require_once('database/category.php');
  require_once('database/product.php');

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'Please login to see the products.';
    header('Location: list_categories.php');
  }

  $cat_id = $_GET['cat'];
  $search_name = $_GET['search_name'];
  $search_min = $_GET['search_min'];
  $search_max = $_GET['search_max'];

  $n_products = getNumberOfProductsByCategoryId($cat_id);
  $n_pages = ceil($n_products/2);

  if (isset($_GET['page_num']) && $_GET['page_num'] > 0) {
    $page_num = $_GET['page_num'];
    if ($page_num > $n_pages) {
      $page_num = $n_pages;
    }
  } else {
    $page_num = 1;
  }

  try {
    if (isset($search_name) && isset($search_min) && isset($search_max)) {
      $products = getProductsBySearch($cat_id, $search_name, $search_min, $search_max);
    } else {
      $products = getProductsByCategoryId($cat_id, $page_num);
    }
    $category = getCategoryById($cat_id);
  } catch (PDOException $e) {
    $error_msg = $e->getMessage();
  }

  include_once('templates/header_tpl.php');
  include_once('templates/list_products_tpl.php');
  include_once('templates/footer_tpl.php');
?>