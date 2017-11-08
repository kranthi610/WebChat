
<?php
 session_start();
if(!isset($_SESSION["id"]))
{


header("Refresh:0;url=login.php");
}
 ?>

<html >

<title>PHP Chat</title>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
   

      $(document).ready(function() {
     
      window.onbeforeunload = function(){
    //Ajax request to update the database
    $.ajax({
        type: "POST",
        url: "update.php",
        success: function () {
              
              var audio = new Audio('beep.wav');
              audio.play();
              
             
            }
    });
} 

     $(window).focus(function() {
    $('#browseropen').load('browseropenstatus.php');
});
     $(window).blur(function() {
  $('#browserclose').load('browserclosestatus.php');
});
         var email = window.location.href.split("=")[1];
         
       $("#mychat").keyup(function(e){
       
            if(e.keyCode==13){

          var message = $("#mychat").val();
         $.ajax({
            type: 'post',
            url: 'insertform.php',
            data: {message:message,email:email},
            success: function () {
              $("#mychat").val('');
              var audio = new Audio('beep.wav');
              audio.play();
              $('#allchatmessages').load('displaymessages.php');
             
            }
          }); 

      }

});
      setInterval(function(){
       $('#allchatmessages').load('displaymessages.php'); }, 1000);

      }); 
    </script>
<body >

    <div>
    <?php 
    echo "<p style='text-align:right'>".$_SESSION['id']."</p>"; 
   $_SESSION["friend"] = $_GET['chatid'];
    


   ?>
    </div>
<div id="browseropen"></div>
<div id="browserclose"></div>
<div id="tabclose"></div>
    <div>
      <h1>Welcome to chat Application </h1>
    </div>
   
      <div id="allchatmessages"></div>
     <input type="textarea" id="mychat">
  
 <form method="post" action="logout.php">
   
     <input type="submit" value="Logout">
    </form>
</body>
</html>
