

<?php
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";
*/

$servername = "mysql://b2c29ca89ee067:4c4cec06@us-cdbr-iron-east-05.cleardb.net/heroku_4b46c901d7863ba";
$username = "b2c29ca89ee067";
$password = "4c4cec06";
$dbname = "heroku_4b46c901d7863ba";
echo " notconnected";
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