<?php
session_start();

function get_session_data($key, $default = '') {
    return $_SESSION[$key] ?? $default;
}
?>
