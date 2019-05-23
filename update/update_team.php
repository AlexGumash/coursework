<?php
    include '../database/connection.php';
    $team_name = $_REQUEST['team_name'];
    $uni = $_REQUEST['team_uni'];
    $category = $_REQUEST['team_category'];
    $leader = $_REQUEST['team_leader'];
    $team_id = $_REQUEST['team_id'];

    $leader_array = explode(" ", $leader);
    $leader_surname = $leader_array[0];
    $leader_name = $leader_array[1];
    $leader_patr = $leader_array[2];

    $query = "UPDATE team SET team_name = '$team_name', university = '$uni', teamleader_surname = '$leader_surname', teamleader_name = '$leader_name', teamleader_patronymic = '$leader_patr' WHERE id = '$team_id'";

    $result = mysqli_query($date, $query);

    if (!$result) {
      echo mysqli_error();
    } else {
      echo "OK";
    }
?>
