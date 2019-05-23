<?php
    include '../database/connection.php';
    $event_name = $_REQUEST['event_name'];
    $year = $_REQUEST['year'];
    $event_id = $_REQUEST['event_id'];
    $event_location = $_REQUEST['event_location'];
    $count = $_REQUEST['event_count'];
    $begin = $_REQUEST['begin'];
    $end = $_REQUEST['end'];

    $query = "UPDATE event SET name_of_competition = '$event_name', location = '$event_location', date_begin = '$begin', date_end = '$end', count_of_participations = '$count', rules_year = '$year' WHERE id = '$event_id'";

    $result = mysqli_query($date, $query);

    if (!$result) {
      echo mysqli_error();
    } else {
      echo "OK";
    }
?>
