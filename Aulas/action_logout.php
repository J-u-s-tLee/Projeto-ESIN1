<?php
  session_start();
  session_destroy();
  header('Location: list_categories.php');
?>