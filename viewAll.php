<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
        .flexbox{
            display: flex;
            width: 500px;
            border:1px solid black;
        }
            .v1{
                flex:1;
            }
        </style>
    </head>
    <body>
        <?php

        //Login Information
        $usr = 'mrflemin_theflem';
        $pw = '**************';
        $db = 'mrflemin_parking';

        //create and check connection
        $conn = new mysqli('localhost', $usr, $pw, $db);
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        //disply lot
        $sql = "SELECT * FROM spots JOIN cars ON (spots.plate = cars.plate) JOIN drivers ON (cars.license = drivers.license) ORDER BY spots.number";

        $result = $conn->query($sql);

        echo "<br>";
        echo "<article class=\"flexbox\">";
        echo "<div class=\"v1\"><strong>Spot #</strong></div>";
        echo "<div class=\"v1\"><strong>Plate</strong></div>";
        echo "<div class=\"v1\"><strong>First name</strong></div>";
        echo "<div class=\"v1\"><strong>Last name</strong></div>";
        echo "</article>";

        if ($result->num_rows > 0) {

            while($row = $result-> fetch_assoc()){
                echo "<article class=\"flexbox\">";
                echo "<div class=\"v1\">#".$row['number']."</div>";
                echo "<div class=\"v1\">".$row['plate']."</div>";
                echo "<div class=\"v1\">".$row['first']."</div>";
                echo "<div class=\"v1\">".$row['last']."</div>";
                echo "</article>";
            }

        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
            echo "<br>";
            echo "Result: ". $result;
        }

        echo "<a href=\"parking.html\" onclick=\"location.reload()\">Go back to home page</a>";
        $conn->close();


         ?>
    </body>
</html>
