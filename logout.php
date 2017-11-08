<?php
session_start();
$user_email = $_SESSION["id"];
session_unset();
session_destroy();
require('includes/database.php');

$sql = "UPDATE users SET online_status=0 WHERE email='$user_email'";
$conn->query($sql);
header("Refresh:0; url=login.php");
?>