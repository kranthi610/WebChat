<?php

session_start();
require('includes/database.php');
$user = $_SESSION['id'];

$email = $_POST['email'];

$message = mysqli_real_escape_string($conn,$_POST['message']);
$sql1 = "SELECT online_status FROM users where email='$email'";
     $result = $conn->query($sql1);
   
    $row = $result->fetch_assoc();
     $status = $row['online_status']==1?0:1;

$sql = "INSERT INTO chat (user, messages,user_id,message_status) VALUES ('$user', '$message','$email','$status')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}




   ?>

