<?php

//Load info from form
$plate = $_POST['plate'];
$make = $_POST['make'];
$model = $_POST['model'];
$year = $_POST['year'];
$license = $_POST['license'];
$conn;

//Login Information
$usr = 'mrflemin_****';
$pw = '***********';
$db = 'mrflemin_****';
// Create connection
if (strlen($plate) > 0 and strlen($license) > 0) {
    $conn = new mysqli('localhost', $usr, $pw, $db);
}

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "INSERT INTO tablename (plate, make, model, year, license) VALUES ('" . $plate . "', '" . $make . "', '" . $model . "', '" . $year . "', '" . $license . "')";

if ($conn->query($sql) === true) {
    echo "Blog post saved!";
    echo "<a href=\"parking.html\" onclick=\"location.reload()\">Go back to home page</a>";
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();









?>