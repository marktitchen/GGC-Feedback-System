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

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getCourseCategory.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>




</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  <a href="signUp.php">Sign Up</a>
  <a href="logIn.php">Log In</a>
  <a href="feedback.php">Feedback</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> </div>

<div class="container">


    <form>
    <select name="q" onchange="showUser(this.value)">
  <option value="">Select a course category:</option>
  <?php
    $q = $_GET['q'];
    $feedbackid = "feedbackID";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "grimsbygolfclub";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($conn,"$dbname");
    $sql="SELECT DISTINCT courseCategory FROM feedback";
    $result = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_array($result)) { 
        echo "<option value=\"".$row['courseCategory']."\">".$row['courseCategory']."</option>";
        
    }
  ?>
  
  </select>
</form>
<br>
<div id="txtHint"><b>Product info will be listed here...</b></div>

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