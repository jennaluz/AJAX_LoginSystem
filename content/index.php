<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/styles.css">

        <title>L4_SIMPLELOGIN</title>
    </head>

    <body>
        <?php
            include('../include/authSession.inc.php');
            require('../include/database.inc.php');

            $Query = "";
            $Result = "";

            $Query = "SELECT *
                      FROM `Users`";

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

                $Query = "INSERT into `Users` (FirstName, LastName, EmailAddress, Password)
                          VALUES ('$FirstName', '$LastName', '$EmailAddress', '" . md5($Password) . "')";

                $Result = mysqli_query($Conn, $Query);

                if ($Result) {
                    header("Location: ./index.php");
                }
            }
        ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-10">
                    <h1 class="display-5">Dashboard</h1>
                </div>

                <div class="col pt-2">
                    <button onclick="window.location.href='../include/logout.inc.php';" class="btn btn-outline-dark">Log Out</button>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-11">
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
                </div>

                <div class="col"></div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <form method="post">
                        <button name="AddUser" class="btn btn-outline-dark">Add User</button>
                    </form>
                </div>
            </div>

        <?php
            if (isset($_POST['AddUser'])) { ?>
                <form action="" method="post" class="mt-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="FirstName" class="col-form-label">First Name</label>
                                    <input type="text" name="FirstName" class="form-control" autofocus="true" required/>
                                </div>

                                <div class="col">
                                    <label for="LastName" class="col-form-label">Last Name</label>
                                    <input type="text" name="LastName" class="form-control" required/>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="EmailAddress" class="form-label">Email Address</label>
                                <input type="email" name="EmailAddress" class="form-control" required/>
                            </div>

                            <div class="mb-3">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" name="Password" class="form-control" required/>
                            </div>

                            <div class="mt-2 mb-5">
                                <button type="submit" name="AddNewUser" class="btn btn-outline-dark">Add New User</button>
                            </div>
                        </div>

                        <div class="col-10"></div>
                    </div>
                </form>
        <?php
            }
        ?>

        </div>
    </body>
</html>
