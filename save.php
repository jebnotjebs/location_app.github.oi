<?php
// Get latitude and longitude from POST data
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Create a database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "loc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
$sql = "INSERT INTO `location` (lat, `long`) VALUES ('$latitude', '$longitude')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Location data saved successfully"));
} else {
    echo json_encode(array("error" => "Error saving location data"));
}

$conn->close();
?>
