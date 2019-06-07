<?php
include '../database/connection.php';
$request_id = $_REQUEST['request_id'];

$query_1 = "SELECT * FROM requests WHERE id = '$request_id'";
$result = mysqli_query($date, $query_1);
$request = mysqli_fetch_array($result, MYSQL_ASSOC);
if (!$resukt) {
  echo mysqli_error($date);
}

$team_name = $request['team_name'];
$uni = $request['university'];
$category = $request['category'];
$teamleader_id = $request['teamleader_id'];

$query_2 = "INSERT INTO team (id, team_name, category, university, teamleader_id) values (NULL, '$team_name', '$category', '$uni', '$teamleader_id')";
$resukt = mysqli_query($date, $query_2);
if (!$resukt) {
  echo mysqli_error($date);
}

$query_tl = "UPDATE users SET role = 'teamleader', team_id = (SELECT id FROM team WHERE teamleader_id = '$teamleader_id') WHERE id = $teamleader_id";
mysqli_query($date, $query_tl);

$query_3 = "DELETE FROM requests WHERE id = '$request_id'";
$resukt = mysqli_query($date, $query_3);
if (!$resukt) {
  echo mysqli_error($date);
}

$query_3 = "DELETE FROM requests_join_team WHERE id = '$teamleader_id'";
$resukt = mysqli_query($date, $query_3);
if (!$resukt) {
  echo mysqli_error($date);
}

?>
