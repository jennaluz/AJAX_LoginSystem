<?php
    include('./authSession.inc.php');
    require('./database.inc.php');

    $UserID = $_GET['UserID'];
    $Query = "";
    $Result = "";

    $Query = "DELETE FROM `Users`
              WHERE (UserID='$UserID')";

    $Result = mysqli_query($Conn, $Query) or die(mysqli_error());

    if ($Result) {
        header("Location: ../content/index.php");
    } else {
        echo "Error deleting record.";
    }
?>
