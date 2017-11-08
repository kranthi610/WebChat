<?php
echo "<script type='javascript'> console.log('hi')</script>"
if($_POST){
	//$user = mysqli_real_escape_string($conn,$_POST['user']);
	$message = mysqli_real_escape_string($conn,$_POST['message']);
$sql = "INSERT INTO chat (user, messages) VALUES ('kranthi', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
   ?>