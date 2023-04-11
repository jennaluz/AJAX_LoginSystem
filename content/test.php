<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <title>L4_SIMPLELOGIN</title>
    </head>

    <body>
        <table class="table table-dark table-hover">
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <?php
                        $arr["ID"] = 20;
                        $arr["FirstName"] = "Jenna-Luz";
                        $arr["LastName"] = "Pura";
                        $arr["DOB"] = "08/27/03";

                        foreach ($arr as $key => $value) { ?>
                            <td>
                                <?php
                                    echo $value;
                                ?>
                            </td>
                        <?php } ?>
                </tr>
            </tbody>
        </table>

        <table class="table table-dark table-hover">
            <thread>
                <th>
            </thread>
        </table>
    </body>
</html>
