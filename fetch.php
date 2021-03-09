
<?php

include('database_connection.php');

if(isset($_POST["year"]))
{
 $query = "
 SELECT * FROM profittable 
 WHERE year = '".$_POST["year"]."' 
 ORDER BY id ASC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'month'   => $row["month"],//bottom
   'profit'  => floatval($row["profit"]) //side
  );
 }
 echo json_encode($output);
}

?>
