<?php include '../database/connection.php' ?>
<?php session_start() ?>
<?php

  $teammember_id = $_REQUEST['id_to_del'];
  $query = "UPDATE users SET team_id = 0, role = 'none' WHERE id = '$teammember_id'";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }

  header('Location: ../team.php?id=' . $_SESSION["team_id"]);

?>
