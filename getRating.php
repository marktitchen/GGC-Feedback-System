<!DOCTYPE html>
<html>
<head>

<?php
$q = $_GET['q'];
$feedbackid = "feedbackID";
$holeno = "holeNo";
$coursecategory = "courseCategory";
$rating = "rating";
$messageus = "messageUs";
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
$sql="SELECT * FROM feedback WHERE rating = '".$q."'";
$result = mysqli_query($conn,$sql);
//VALUES ($fname, $lname);

echo"
<table>
<tr>
<th>User ID</th>
<th>Hole No</th>
<th>Rating</th>
<th>Message</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['userID'] . "</td>";
    echo "<td>" . $row['holeNo'] . "</td>";
    echo "<td>" . $row['rating'] . "</td>";
    echo "<td>" . $row['messageUs'] . "</td>";
    echo "</tr>";
    $feedbackid = $row['feedbackID'];
}
echo "</table>";
mysqli_close($conn);

?>


<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
</body>
</html>
















