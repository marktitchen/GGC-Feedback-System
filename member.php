<?php
session_start();

if(isset($_SESSION['user'])){
  echo $_SESSION['user']['userID'];
  echo "<br />";
  echo $_SESSION['user']['accountCategory'];

  $link = "logOut.php";
  $navlink = "Log Out";

}else{
  $link = "logIn.php";
  $navlink = "Log In";
}


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
  <a href="feedback.php">Feedback</a>
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>


<div class="header"> </div>

<div class="container">

  <h2>Delete Account</h2>

  <form action="functions.php" method="post">
    Member ID: <input type="text" name="memberID" /><br><br>
    <!--<input type="submit" name="userchoice" value="deletecustomer" />-->
    <button type="submit" name="userchoice" value="deleteaccount" class="registerbtn">Delete Account</button>
  </form>


  <h2>Update Account</h2>


  <form action="functions.php" method="post">
    Member ID: <input type="text" name="memberID" /><br><br>
    change Password: <input type="text" name="fName" /><br><br>
    
    <button type="submit" name="userchoice" value="updateaccount" class="registerbtn">Update Account</button>
  </form>
</div>

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