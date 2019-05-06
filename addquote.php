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
        $content = $_POST['content'];
        $pic = $_POST['pic'];
        $birth = $_POST['birth'];
        $death = $_POST['death'];
        $conn;

        //Login Information
        $usr = 'mrflemin_theflem';
        $pw = '**************';
        $db = 'mrflemin_parking';

        // Create connection
        if (strlen($last) > 0 and strlen($content) > 0) {
            $conn = new mysqli('localhost', $usr, $pw, $db);
        }

        // Check connection
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }

        $InquireAboutAuthor = "SELECT (first, last) FROM authors WHERE (first = '$first' AND )";
        if ($conn->query($InquireAboutAuthor) === false) {
            echo 'Error: ' . $InquireAboutAuthor . '<br>' . $conn->error;
            echo "Ythis autohr does not exist";
            echo "<br>";
            echo "$InquireAboutAuthor";
            echo "<br>";
            echo "<a href=\"addDriver.html\" onclick=\"location.reload()\">Add Driver page</a>";
            
            $insertAuthor = "INSERT INTO authors (first, last, birth, death) VALUES ('$plate', '$make', '$model', '$year', '$license')";
            $conn->query($insertAuthor);
            $InquireAboutAuthor = "SELECT (id) FROM authors WHERE (first = '$first' AND last = '$last')";

            $insertpic = "INSERT INTO pictures (blob) VALUES ('$pic')";
            $inquireAboutPic = "SELECT (id) FROM pictures WHERE (blob = '$pic' )";

            
        }
        else{

        }
        
        $conn->close();
        
        
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

        

        ?>
    </body>
</html>
