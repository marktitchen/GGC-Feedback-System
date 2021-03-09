<?php  
  $connect = mysqli_connect("localhost", "root", "", "grimsbygolfclub");  
  $query = "SELECT userID, COUNT(userID) as number FROM feedback GROUP BY userID";
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
                               echo "['".$row["userID"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                
                
                
                
                
                
                
                
                var options = {  
                      title: 'Number of Member Feedback given',  
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