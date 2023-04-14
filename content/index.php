<?php include('../include/authSession.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/styles.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

        <title>L4_SIMPLELOGIN</title>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-10">
                    <h1 class="display-5">Dashboard</h1>
                </div>

                <div class="col pt-2">
                    <button onclick="window.location.href='../include/logout.inc.php';" class="btn btn-outline-dark">Log Out</button>
                </div>
            </div>

            <div class="col pt-2">
                <button class="btn btn-outline-dark" id="toggle-btn" onclick="toggle_table()">Show User Table</button>
            </div>

            <div class="row mt-3">
                <div class="col-10" id="user-table">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <form method="post">
                        <button name="AddUser" class="btn btn-outline-dark">Add User</button>
                    </form>
                </div>
            </div>

        <?php if (isset($_POST['AddUser'])) { ?>
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
        <?php } ?>

        <script type="text/javascript">
            function toggle_table() {
                const inactive = "Show User Table";
                const active = "Hide User Table";
                const toggle_btn = document.getElementById("toggle-btn");

                if (toggle_btn.innerHTML == inactive) {
                    toggle_btn.innerHTML = active;
                    $("#user-table").load("./user_table.php");
                } else {
                    toggle_btn.innerHTML = inactive;
                    $("#user-table").empty();
                }
            }
        </script>

        </div>
    </body>
</html>
