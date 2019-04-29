<?php

//Load info from form
$spot = $_POST['spot'];
$plate = $_POST['plate'];
$conn;

//Login Information
$usr = 'mrflemin_theflem';
$pw = 'SAKS3~zh&23*';
$db = 'mrflemin_parking';

// Create connection
if (strlen($spot) > 0 and strlen($plate) > 0) {
    $conn = new mysqli('localhost', $usr, $pw, $db);
}

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "INSERT INTO spots (number, plate) VALUES ('$spot', '$plate')";

if ($conn->query($sql) === true) {
    echo "Blog post saved!";
    echo "<a href=\"parking.html\" onclick=\"location.reload()\">Go back to home page</a>";
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();


?>