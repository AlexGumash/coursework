<?php
include '../database/connection.php';

$action = $_REQUEST['action'];
$req_id = $_REQUEST['id'];

if ($action == 'submit') {

  $query = "SELECT * FROM requests_event WHERE id = '$req_id'";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }

  $request = mysqli_fetch_array($result, MYSQL_ASSOC);
  $event_name = $request['event_name'];
  $team_name = $request['team_name'];

  $query = "INSERT INTO event_participants VALUES (NULL, (SELECT id FROM event WHERE name_of_competition = '$event_name'), (SELECT id FROM team WHERE team_name = '$team_name'))";

  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }
  $query = "SELECT * FROM event WHERE name_of_competition = '$event_name'";
  $result = mysqli_query($date, $query);
  $count = mysqli_fetch_array($result, MYSQL_ASSOC);
  $count2 = $count + 1;
  $query = "UPDATE event SET count_of_participations = '$count2' WHERE id = (SELECT id FROM event WHERE name_of_competition = '$event_name')";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }

  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);

  $query = "DELETE FROM requests_event WHERE id = '$req_id'";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }

} else {
  $query = "DELETE FROM requests_event WHERE id = '$req_id'";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }
  header('Location: admin.php?content=checkEventReq');
}

?>
