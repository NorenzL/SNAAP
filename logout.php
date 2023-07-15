<?php

    session_start();

    // Clears session data
    $_SESSION = array();

    // Terminates current session
    session_destroy();

    header("Location: login.php");

    // Terminates script to prevent further code execution
    exit;
?>