<?php
include '../database/connection.php';

$name = $_REQUEST['name'];
$location = $_REQUEST['location'];
$rules = $_REQUEST['rules'];
$track = $_REQUEST['track'];
$date_begin = $_REQUEST['date-begin'];
$date_end = $_REQUEST['date-end'];

$query = "INSERT INTO event VALUES (NULL, '$name', '$date_begin', '$date_end', 0, '$location', '$rules', '$track')";
$result = mysqli_query($date, $query);
if (!$result) {
  echo mysqli_error($date);
}
header('Location: admin.php?content=addEvent');
?>
