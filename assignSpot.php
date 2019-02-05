<?php

//Load info from form
$spot = $_POST['spot'];
$plate = $_POST['plate'];
$conn;

//Login Information
$usr = 'mrflemin_****';
$pw = '***********';
$db = 'mrflemin_****';
// Create connection
if (strlen($spot) > 0 and strlen($plate) > 0) {
    $conn = new mysqli('localhost', $usr, $pw, $db);
}

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "INSERT INTO tablename (spot, plate) VALUES ('" . $spot . "', '" . $plate . "')";

if ($conn->query($sql) === true) {
    echo "Blog post saved!";
    echo "<a href=\"parking.html\" onclick=\"location.reload()\">Go back to home page</a>";
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();


?>