<?php
require_once '../database/last_id.php';

function generate_sequential_id($prefix, $db_connection) {
    $last_id = get_last_id($prefix, $db_connection);
    $new_id = ($last_id !== null) ? $last_id + 1 : 1;
    return $prefix . $new_id;
}
?>
