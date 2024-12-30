<?php
session_start();

require_once('../database/init.php');
require_once('../database/coffeebreaks.php');

try {
    
} catch (PDOException $e) {
    $error_msg = $e->getMessage();
}
?>