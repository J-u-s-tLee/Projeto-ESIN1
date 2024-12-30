<?php
  session_start();

  $msg = $_SESSION['msg'];
  unset($_SESSION['msg']);

  include_once('templates/header_tpl.php');
  include_once('templates/registration_tpl.php');
  include_once('templates/footer_tpl.php');
?>