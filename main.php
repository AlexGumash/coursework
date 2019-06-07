<?php
session_start();
include 'database/connection.php';


if (isset($_REQUEST['postRequest'])) {
  $team_name = $_REQUEST['name'];
  $uni = $_REQUEST['uni'];
  $category = $_REQUEST['category'];
  $teamleader_id = $_REQUEST['teamleader_id'];

  $query = "INSERT INTO requests (id, team_name, category, university, teamleader_id) values (NULL, '$team_name', '$category', '$uni', '$teamleader_id')";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }
  header('Location: user/personal.php?content=about');
}

if (isset($_REQUEST['submit-button-registration'])) {
  $login = $_REQUEST['login'];
  $name = $_REQUEST['name'];
  $surname = $_REQUEST['surname'];
  $password = $_REQUEST['password'];
  $password_confirm = $_REQUEST['password-confirm'];
  $patronymic = $_REQUEST['patronymic'];

  if ($password == $password_confirm) {
    $hash_pass = hash('md5', $password);
    $query = "INSERT INTO users (id, name, surname, login, password, rights, patronymic, role) VALUES (NULL, '$name', '$surname', '$login', '$hash_pass', 'user', '$patronymic', 'none')";
    $result = mysqli_query($date, $query);

    $query = "SELECT * FROM users WHERE login = '$login' AND password = '$hash_pass'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQL_ASSOC);
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $hash_pass;
    $_SESSION['rights'] = $user['rights'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['team_id'] = $user['team_id'];
    header('Location: index.php');
  }
}

if (isset($_REQUEST['submit-button-entry'])) {
  $login = $_REQUEST['login'];
  $password = $_REQUEST['password'];
  $hash_pass = hash('md5', $password);

  $query = "SELECT * FROM users WHERE login = '$login' AND password = '$hash_pass'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
  if (!$user) {
    die("Неверный логин или пароль");
  }
  $_SESSION['login'] = $login;
  $_SESSION['password'] = $hash_pass;
  $_SESSION['rights'] = $user['rights'];
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['role'] = $user['role'];
  $_SESSION['team_id'] = $user['team_id'];
  header('Location: index.php');
}

 ?>
