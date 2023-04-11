<?php
    // connect to database
    $Conn = mysqli_connect('localhost', 'root', '', 'LoginSystem');
    //var_dump($Conn);

    // validate connection
    if (mysqli_connect_errno() > 0) {
        echo "Failed to connect to MySQL: " .mysqli_connect_error();
    }
?>
