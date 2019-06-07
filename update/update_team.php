<?php
    include '../database/connection.php';
    $team_name = $_REQUEST['team_name'];
    $uni = $_REQUEST['team_uni'];
    $category = $_REQUEST['team_category'];
    $team_id = $_REQUEST['team_id'];


    $query = "UPDATE team SET team_name = '$team_name', university = '$uni', category = '$category' WHERE id = '$team_id'";

    $result = mysqli_query($date, $query);

    if (!$result) {
      echo mysqli_error();
    } else {
      echo "OK";
    }
?>
