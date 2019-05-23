<?php
    include '../database/connection.php';
    $car_name = $_REQUEST['car_name'];
    $car_year = $_REQUEST['car_year'];
    $car_id = $_REQUEST['car_id'];

    $query = "UPDATE car SET name = '$car_name', year = '$car_year' WHERE id = '$car_id'";

    $result = mysqli_query($date, $query);

    if (!$result) {
      echo mysqli_error();
    } else {
      echo "OK";
    }
?>
