<?php
    session_start();

    if (!isset($_SESSION['EmailAddress'])) {
        header("Location: ../content/login.php");
        exit();
    }
?>
