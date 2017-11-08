<?php
session_start();

require('includes/database.php');
$user = $_SESSION['id'];
 $open = "UPDATE users SET browser_status=1 WHERE email='$user'";
         $conn->query($open);


?>