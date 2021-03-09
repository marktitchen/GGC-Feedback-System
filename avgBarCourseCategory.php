<?php  
  $connect = mysqli_connect("localhost", "root", "", "grimsbygolfclub");  
  //$query = "SELECT rating, count(*) as number FROM feedback GROUP BY holeNo";  
  //$query = "SELECT holeNo, AVG(rating) as number FROM feedback GROUP BY holeNo";
  $query = "SELECT courseCategory, AVG(rating) as number FROM feedback GROUP BY courseCategory";
  $result = mysqli_query($connect, $query);  
  ?> 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                
            var data = google.visualization.arrayToDataTable([  
                          ['courseCategory', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["courseCategory"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                
                
                
                
                
                
                
                
                var options = {  
                      title: 'Average Course Category Ratings',  
                      //is3D:true,  
                      //pieHole: 0.4  
                     };  
                var chart = new google.visualization.BarChart(document.getElementById('chart_div'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           
                <div id="chart_div" style="width: 900px; height: 500px;"></div>  
           
      </body>  
 </html>  