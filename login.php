<?php
 session_start();
if(isset($_SESSION["id"]))
{


header("Refresh:0;url=index.php");
}
require('includes/database.php');


    echo '<br><br><br><br><p style="color:red;" align="center"><b>Chat Login<b></p><br><br> ';

echo '<form align="center"  method="POST">
username:<input type="text" name="email"><br><br>
password:<input type="password" name="password"><br><br>
<input type="submit" name="sub">

</form>';





?>

<?php

if($_POST){
$user=mysqli_real_escape_string($conn,$_POST['email']);
$password=mysqli_real_escape_string($conn,$_POST['password']);

$sql="SELECT email,password  FROM users WHERE email='$user' and password='$password'";


$result = $conn->query($sql);

   


if ($result->num_rows > 0  ) {
    // output data of each row
    $_SESSION["id"] = $user;
    $user_email = $_SESSION["id"];
    $sql = "UPDATE users SET online_status=1 WHERE email='$user_email'";
    $conn->query($sql);
    //die($_SESSION["id"]);
    header("Refresh:0; url=login.php");
   
        
    }
  
else {
    
    header("Refresh:1; url=login.php");
    die("Wrong credentials");
}

}


?>