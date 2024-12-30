<?php
session_start();

require_once('../database/init.php');
require_once('../database/workshops.php');

try{
    

    } catch (PDOException $e){
    echo "Erro: " . $e->getMessage();
    }
?>