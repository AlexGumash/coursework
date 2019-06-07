<?php
    include '../database/connection.php';
    $namefull = $_REQUEST['student_name'];
    $login = $_REQUEST['student_login'];
    $role = $_REQUEST['role'];
    $student_id = $_REQUEST['student_id'];

    $array = explode(" ", $namefull);
    $surname = $array[0];
    $name = $array[1];
    $patr = $array[2];

    $query = "UPDATE users SET role = '$role', login = '$login', surname = '$surname', name = '$name', patronymic = '$patr' WHERE id = '$student_id'";

    $result = mysqli_query($date, $query);

    if (!$result) {
      echo mysqli_error($date);
    } else {
      echo "OK";
    }
?>
