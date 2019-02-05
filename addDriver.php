<?php

//Load info from form
$first = $_POST['first'];
$last = $_POST['last'];
$phone = $_POST['phone'];
$license = $_POST['license'];

$conn;

//Login Information
$usr = 'mrflemin_****';
$pw = '***********';
$db = 'mrflemin_****';
// Create connection
if (strlen($first) > 0 and strlen($last) > 0 and strlen($phone) > 0 and strlen($license) > 0) {
    $conn = new mysqli('localhost', $usr, $pw, $db);
}

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$sql = "INSERT INTO tablename (first, last, license, phone) VALUES ('" . $first . "', '" . $last . "', '" . $license . "', '" . $phone . "')";

if ($conn->query($sql) === true) {
    echo "Blog post saved!";
    echo "<a href=\"parking.html\" onclick=\"location.reload()\">Go back to home page</a>";
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();


?>