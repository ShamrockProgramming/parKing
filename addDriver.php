<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php

        //Load info from form
        $first = $_POST['first'];
        $last = $_POST['last'];
        $phone = $_POST['phone'];
        $license = $_POST['license'];

        $conn;

        //Login Information
        //$path = $_SERVER['DOCUMENT_ROOT'] . '/login/login.php';
        //require $path;

        //Login Information
        $usr = 'mrflemin_theflem';
        $pw = 'SAKS3~zh&23*';
        $db = 'mrflemin_parking';

        // Create connection
        if (strlen($first) > 0 and strlen($last) > 0 and strlen($phone) > 0 and strlen($license) > 0) {
            $conn = new mysqli('localhost', $usr, $pw, $db);
        }

        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        //$sql = "INSERT INTO drivers (first, last, license, phone) VALUES ('" . $first . "', '" . $last . "', '" . $license . "', '" . $phone . "')";

        $sql = "INSERT INTO drivers (first, last, license, phone) VALUES ('$first','$last','$license','$phone')";

        if ($conn->query($sql) === true) {
            echo "Blog post saved!";
            echo "<a href=\"parking.html\" onclick=\"location.reload()\">Go back to home page</a>";
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }

        $conn->close();


        ?>
    </body>
</html>