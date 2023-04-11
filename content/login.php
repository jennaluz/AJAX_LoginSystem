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
            session_start();

            $EmailAddress = "";
            $Password = "";
            $Query = "";
            $Result = "";
            $Rows = "";

            if (isset($_POST['EmailAddress'])) {
                $EmailAddress = stripslashes($_REQUEST['EmailAddress']);
                $EmailAddress = mysqli_real_escape_string($Conn, $EmailAddress);

                $Password = stripslashes($_REQUEST['Password']);
                $Password = mysqli_real_escape_string($Conn, $Password);

                $Query = "SELECT *
                          FROM `Users`
                          WHERE EmailAddress='$EmailAddress' AND Password='" . md5($Password) . "'";

                $Result = mysqli_query($Conn, $Query) or die(mysqli_error());
                $Rows = mysqli_num_rows($Result);

                if ($Rows == 1) {
                    $_SESSION['EmailAddress'] = $EmailAddress;

                    // redirect to user dashboard
                    header("Location: ./index.php");
                } else {
                    echo   "<div class='form text-center mt-5'>
                                <h1 class='display-5 mb-5'>Incorrect email or password.</h1>
                                <p>Try to <a href='./login.php'>log in</a> again.</p>
                            </div>";
                }
            } else {
        ?>

        <form method="post" name="login" class="container mt-5">
            <h1 class="display-4 text-center">Log In</h1>

            <div class="row m-5">
                <div class="col"></div>

                <div class="col-6">
                    <div class="mb-3">
                        <label for="EmailAddress" class="form-label">Email Address</label>
                        <input type="email" name="EmailAddress" class="form-control" autofocus="true" required/>
                    </div>

                    <div class="mb-3">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" name="Password" class="form-control" required/>
                    </div>

                    <div class="row mt-2">
                        <div class="col-auto">
                            <button type="submit" name="Submit" class="btn btn-outline-dark">Log In</button>
                        </div>

                        <div class="col-auto pt-2">
                            <p>Don't have an account?&emsp;<a href="./register.php">Register Now</a></p>
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
