<?php
    include '../database/connection.php';
    $track_name = $_REQUEST['track_name'];
    $track_address = $_REQUEST['track_address'];
    $track_id = $_REQUEST['track_id'];
    $track_length = $_REQUEST['track_length'];

    $query = "UPDATE track SET track_name = '$track_name', track_address = '$track_address', track_length = '$track_length' WHERE id = '$track_id'";

    $result = mysqli_query($date, $query);

    if (!$result) {
      echo mysqli_error();
    } else {
      echo "OK";
    }
?>
