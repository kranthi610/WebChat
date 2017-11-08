<?php
session_start();
if(!isset($_SESSION["id"]))
{


header("Refresh:0;url=login.php");
}
require('includes/database.php');
$user = $_SESSION['id'];
$sql = "SELECT email,online_status FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	if($row["email"]==$user){
    		continue;
    	}
    	else{
    		$uri = "chat.php?chatid=".$row["email"];
    		$email = $row['email'];
    	
      $sql1 = "SELECT * FROM chat where (user_id='$user' and user='$email') and (message_status=1)";	
      $myresult = $conn->query($sql1);
    
      //$myrow = $myresult->fetch_assoc();

        
      $img = $row['online_status']==1?'onlineimage.jpg':'offline.ico';
       echo "<img src='$img' height='7'/> &nbsp;<a href='$uri'>$email</a> ". $myresult->num_rows." New Messages<br>";
    }


    }
} 


    $sql2 = "UPDATE users SET browser_status=1 WHERE email='$user')";
         $conn->query($sql2);


?>