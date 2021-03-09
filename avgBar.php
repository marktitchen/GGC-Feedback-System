<?php  
  $connect = mysqli_connect("localhost", "root", "", "grimsbygolfclub");  
  //$query = "SELECT holeNo, count(*) as number FROM feedback GROUP BY rating";  
  $query = "SELECT holeNo, AVG(rating) as number FROM feedback GROUP BY holeNo";
  $result = mysqli_query($connect, $query);  
  ?> 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Hole numbers and ratings</title>  
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                
            var data = google.visualization.arrayToDataTable([  
                          ['holeNo', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["holeNo"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                
                     function drawStuff() {
                      var data = new google.visualization.DataTable();
                      data.addColumn('string', 'Hole Number');
                      data.addColumn('number', 'GDP');
                     }
                
                
                
                
                
                var options = {  
                      title: 'Hole numbers and ratings',  
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