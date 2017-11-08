<?php
session_start();

require('includes/database.php');
$user = $_SESSION['id'];
 $close = "UPDATE users SET browser_status=0 WHERE email='$user'";
         $conn->query($close);


?>