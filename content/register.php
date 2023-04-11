<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./css/styles.css">
    </head>

    <body>
        <?php
            require('../include/database.inc.php');

            $FirstName = "";
            $LastName = "";
            $EmailAddress = "";
            $Password = "";
            $Query = "";
            $Result = "";

            if (isset($_REQUEST['FirstName'])) {
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
                    echo   "<div class='form mt-5'>
                                <h1 class='display-5 text-center mb-5'>You've successfully registered!</h1>
                                <p class='text-center'><a href='./login.php'>Log in</a> to your new account.</p>
                            </div>";
                } else {
                    echo "<div class='form text-center mt-5'>
                                <h1 class='display-5 mb-5'>You are missing required fields.</h1>
                                <p>Try to <a href='./register.php'>register</a> again.</p>
                            </div>";
                }
            } else {
        ?>

        <form action="" method="post" class="container mt-5">
            <h1 class="display-4 text-center">Register</h1>

            <div class="row m-5">
                <div class="col"></div>

                <div class="col-6">
                    <div class="row align-items-center mb-3">
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

                    <div class="row mt-2">
                        <div class="col-auto">
                            <button type="submit" name="Submit" class="btn btn-outline-dark">Submit</button>
                        </div>

                        <div class="col-auto pt-2">
                            <p>Already have an account?&emsp;<a href="./login.php">Login to Account</a></p>
                        </div>
                    </div>
                </div>

                <div class="col"></div>
            </div>
        </form>

        <?php
            }
        ?>
    </body>
</html>
