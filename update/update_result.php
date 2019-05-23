<?php
    include '../database/connection.php';
    $name = $_REQUEST['result_name'];
    $number = $_REQUEST['result_number'];
    $category = $_REQUEST['result_category'];
    $place = $_REQUEST['result_place'];
    $acceleration = $_REQUEST['result_acceleration'];
    $eight = $_REQUEST['result_eight'];
    $autocross = $_REQUEST['result_autocross'];
    $race = $_REQUEST['result_race'];
    $fuel = $_REQUEST['result_fuel'];
    $score = $_REQUEST['result_score'];
    $result_id = $_REQUEST['result_id'];

    $query = "UPDATE team_result SET car_number = '$number', name_of_team = '$name', category = '$category', final_place = '$place', autocross_result = '$autocross', eight_result = '$eight', race_result = '$race', acceleration_result = '$acceleration', fuel_result = '$fuel', final_result = '$score' WHERE id = '$result_id'";

    $result = mysqli_query($date, $query);

    if (!$result) {
      echo mysqli_error();
    } else {
      echo "OK";
    }
?>
