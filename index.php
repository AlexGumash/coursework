<?php include 'database/connection.php' ?>
<?php
  if (isset($_REQUEST['submit-button-registration'])) {
    $login = $_REQUEST['login'];
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $password = $_REQUEST['password'];
    $password_confirm = $_REQUEST['password-confirm'];

    if ($password == $password_confirm) {
      $hash_pass = hash('md5', $password);
      $query = "INSERT INTO users (id, name, surname, login, password, rights) VALUES (NULL, '$name', '$surname', '$login', '$hash_pass', 'user')";
      $result = mysql_query($query);

      $query = "SELECT * FROM users WHERE login = '$login' AND password = '$hash_pass'";
      $result = mysql_query($query);
      $user = mysql_fetch_array($result, MYSQL_ASSOC);
    }
  }

  if (isset($_REQUEST['submit-button-entry'])) {
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    $hash_pass = hash('md5', $password);

    $query = "SELECT * FROM users WHERE login = '$login' AND password = '$hash_pass'";
    $result = mysql_query($query);
    $user = mysql_fetch_array($result, MYSQL_ASSOC);

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles/main.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>DataBase</title>
</head>
<body>
  <?php include 'usable/header.php' ?>
  <div class="main">
    <div class="container container-main">

      <div class="query-container">
        <span>Введите запрос</span>
        <input id="query-input" type="text">
        <div class="query-button">
          <span>Выполнить запрос</span>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
