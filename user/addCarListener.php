<?php
  session_start();
  include '../database/connection.php';

  $name = $_REQUEST['name'];
  $year = $_REQUEST['year'];
  $category = $_REQUEST['engine'];
  $teamleader_id = $_SESSION['user_id'];

  $query = "INSERT INTO car (id, name, year, engine_type, team_name) VALUES (NULL, '$name', '$year', '$category', (SELECT team_name FROM team WHERE teamleader_id = $teamleader_id))";
  
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }
  header('Location: personal.php?content=addCar');


?>
