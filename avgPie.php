<?php  
 $connect = mysqli_connect("localhost", "root", "", "grimsbygolfclub");  
 //$query = "SELECT holeNo, count(*) as number FROM feedback GROUP BY rating";  
 $query = "SELECT holeNo, AVG(rating) as number FROM feedback GROUP BY holeNo";
 $result = mysqli_query($connect, $query);  
 ?> 


<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        var data = google.visualization.arrayToDataTable([  
                          ['holeNo', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["holeNo"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  

        // Set chart options
        var options = {'title':'Average Course Catagory Ratings',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>







