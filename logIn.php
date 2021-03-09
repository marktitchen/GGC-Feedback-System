<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Grimsby Golf Club</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="css.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="pictures/grimsby1.png" type="image/gif" sizes="16x16">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="signUp.php">Sign Up</a>
  <a href="logIn.php">Log In</a>
  <a href="feedback.php">Feedback</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> </div>

<form action="functions.php" method="post">
  <div class="container">
    <h1> New Log In</h1>
   
    <form action="functions.php" method="post">
        Email: <input type="text" name="emailAddress" required/><br><br>
        Password: <input type="Password" name="userPassword" required/><br><br>
        
        <div class="container" style="background-color:white">
          <span class="psw">Forgot <a href="reset.php">password?</a></span>
        </div>
        <button type="submit" name="userchoice" value="loginuser" class="registerbtn">log in</button>
  </div>
</form>

<div class="footer"> @ Mark Titchen 2018</div> 


<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>
