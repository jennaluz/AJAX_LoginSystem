<?php
    session_start();

    if (session_destroy()) {
        // redirect to login page
        header("Location: ../content/login.php");
    }
?>
