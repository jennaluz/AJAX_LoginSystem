<?php
require('../include/database.inc.php');

$Query = "";
$Result = "";

$Query = "SELECT *
          FROM Users";

$Result = mysqli_query($Conn, $Query);

if (isset($_POST['AddNewUser'])) {
    $FirstName = stripslashes($_REQUEST['FirstName']);      // remove backslashes
    $FirstName = mysqli_real_escape_string($Conn, $FirstName);  // escapes special characters in a string

    $LastName = stripslashes($_REQUEST['LastName']);
    $LastName = mysqli_real_escape_string($Conn, $LastName);

    $EmailAddress = stripslashes($_REQUEST['EmailAddress']);
    $EmailAddress = mysqli_real_escape_string($Conn, $EmailAddress);

    $Password = stripslashes($_REQUEST['Password']);
    $Password = mysqli_real_escape_string($Conn, $Password);

    $Query = "INSERT into Users (FirstName, LastName, EmailAddress, Password)
              VALUES ('$FirstName', '$LastName', '$EmailAddress', '" . md5($Password) . "')";

    $Result = mysqli_query($Conn, $Query);
}
?>

<table class="table table-sm table-light table-hover align-middle">
    <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($Row = mysqli_fetch_array($Result)):; ?>
        <tr>
            <td><?php echo $Row['UserID']; ?></td>
            <td><?php echo $Row['FirstName']; ?></td>
            <td><?php echo $Row['LastName']; ?></td>
            <td><?php echo $Row['EmailAddress']; ?></td>
            <td>
                <a class="btn btn-outline-dark" href="../include/delete.inc.php?UserID=<?php echo $Row['UserID']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
