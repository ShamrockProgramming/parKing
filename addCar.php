<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php

        //Load info from form
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $plate = $_POST['plate'];
        $license = $_POST['license'];
        $conn;

        //Login Information
        $usr = 'mrflemin_theflem';
        $pw = '**************';
        $db = 'mrflemin_parking';

        // Create connection
        if (strlen($plate) > 0 and strlen($license) > 0) {
            $conn = new mysqli('localhost', $usr, $pw, $db);
        }

        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $sql = "INSERT INTO cars (plate, make, model, year, license) VALUES ('$plate', '$make', '$model', '$year', '$license')";

        if ($conn->query($sql) === true) {
            echo "Car registered!";
            echo "$sql";
            echo "<a href=\"parking.html\" onclick=\"location.reload()\">Go back to home page</a>";
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
            echo "You must register as a driver before inserting your car";
            echo "<br>";
            echo "$sql";
            echo "<br>";
            echo "<a href=\"addDriver.html\" onclick=\"location.reload()\">Add Driver page</a>";
        }

        $conn->close();

        ?>
    </body>
</html>
