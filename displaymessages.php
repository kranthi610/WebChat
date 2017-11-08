<?php
session_start();
if(!isset($_SESSION["id"]))
{


header("Refresh:0;url=login.php");
}
require('includes/database.php');
$user1 = $_SESSION["id"];
$user2 = $_SESSION["friend"];
$sql = "SELECT user, messages FROM chat where (user='$user1' and user_id='$user2') or (user='$user2' and user_id='$user1')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sql1 = "UPDATE chat SET message_status=0 WHERE (user='$user1' and user_id='$user2')";
         $conn->query($sql1);

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["user"]."    sent"."<br>" . $row["messages"]."<br><br>";
    }
} else {
    echo "You haven't started any onversation with yor friend .<BR>Say Hi to him";
}



?>