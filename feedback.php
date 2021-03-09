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

<form action="functions.php" method="post">
  <div class="container">
    <h1>Feedback form</h1>
   
      Hole No: 
        <select name="holeNo">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">9</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        </select><br><br>

      Course Category:  
        <select name="courseCategory">
        <option value="Green">Green</option>
        <option value="Fairway">Fairway</option>
        <option value="Bunker">Bunker</option>
        <option value="Tee Box">Tee Box</option>
        <option value="Rough">Rough</option>
        <option value="Other">Other</option>
      </select><br><br>

      Rating:
      <select name="rating">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select><br><br>


      Message: <textarea name="messageUs" required placeholder="Write something.." style="height:200px"></textarea>
      
       
      

    <hr>
    <p>By submitting your feedback you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="userchoice" value="leavefeedback" class="registerbtn">Submit</button>
    
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="logIn.php">Log In</a>.</p>
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
