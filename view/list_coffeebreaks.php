<?php
session_start();

require_once('../database/init.php');
require_once('../database/coffeebreaks.php');

$coffeeBreaks = getCoffeeBreaks();

include_once('../templates/coffeebreaks_tpl.php');
?>