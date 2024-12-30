<?php
session_start();
session_unset();
session_destroy();
header('Location: ../view/list_login.php'); 
exit;
?>
