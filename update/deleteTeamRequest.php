<?php
include '../database/connection.php';
$request_id = $_REQUEST['request_id'];

$query_3 = "DELETE FROM requests WHERE id = '$request_id'";
$resukt = mysqli_query($date, $query_3);
if (!$resukt) {
  echo mysqli_error($date);
}

?>
