<?php
    session_start();

    function authenticate(){

        // Returns user to login page if not logged in
        if (!isset($_SESSION['username'])) {
            header('Location: login.php');
            exit;
        }
    }
?>