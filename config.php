<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "covidsystem";
// connection created
$con = mysqli_connect($servername, $username, $password, $database);

// comment out this on final
if ($con->connect_error) {
   die("Connection failed: " . $con->connect_error);
}
//  echo "Connected successfully";
?>
