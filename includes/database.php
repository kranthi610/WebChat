

<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";
*/

$servername = "b2c29ca89ee067@ip-10-44-181-66.ec2.internal";
$username = "b2c29ca89ee067";
$password = "4c4cec06";
$dbname = "heroku_4b46c901d7863ba";
echo " not also connected";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
echo "connected";
}//$conn->close();
?>