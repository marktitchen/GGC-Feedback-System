<?php

 $con = mysqli_connect("localhost", "root", "", "grimsbygolfclub");  
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 
 <script type="text/javascript">
 google.load('visualization', '1', {packages: ['corechart', 'bar']});
 google.setOnLoadCallback(drawMaterial);

 function drawMaterial() {
     var data = google.visualization.arrayToDataTable([
 ['Country', 'New Visitors', 'Returned Visitors'],
 <?php 
 $query = "SELECT count(ip) AS count, country FROM test_table GROUP BY country";

 $exec = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($exec)){

 echo "['".$row['country']."',";
 $query2 = "SELECT count(distinct ip) AS count FROM test_table WHERE country='".$row['country']."' ";
 $exec2 = mysqli_query($con,$query2);
 $row2 = mysqli_fetch_assoc($exec2);
 
 echo $row2['count'];
 
 

 $rvisits = $row['count']-$row2['count'];

 echo ",".$rvisits."],";
 }
 ?>
 ]);

 var options = {
 
 title: 'Country wise new and returned visitors',
 
 bars: 'horizontal'
 };
 var material = new google.charts.Bar(document.getElementById('barchart'));
 material.draw(data, options);
 }
 </script>
</head>
<body>
 <h3>Bar Chart</h3>
 <div id="barchart" style="width: 900px; height: 500px;"></div>
</body>
</html>