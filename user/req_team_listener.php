<?php include '../database/connection.php' ?>
<?php session_start() ?>
<?php

  $action = $_REQUEST['action'];
  $req_id = $_REQUEST['req_id'];

  if ($action == "delete") {
    $query = "DELETE FROM requests_join_team WHERE id = '$req_id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  } else {
    $query = "UPDATE users SET role = 'teammember', team = (SELECT team_name FROM team WHERE id = (SELECT team_id FROM requests_join_team WHERE id = $req_id)) WHERE id = (SELECT user_id FROM requests_join_team WHERE id = $req_id)";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }

    $query = "DELETE FROM requests_join_team WHERE id = '$req_id'";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  header('Location: personal.php?content=checkReqTeam');

?>
