<?php
session_start();

require_once('../database/init.php');
require_once('../database/schedule.php');

$activities = getSchedule($dbh);

include_once('../templates/schedule_tpl.php');
?>