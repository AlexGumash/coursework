<?php session_start(); ?>
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
      $result = mysqli_query($date, $query);

      $query = "SELECT * FROM users WHERE login = '$login' AND password = '$hash_pass'";
      $result = mysqli_query($date, $query);
      $user = mysqli_fetch_array($result, MYSQL_ASSOC);
      $_SESSION['login'] = $login;
      $_SESSION['password'] = $hash_pass;
      $_SESSION['rights'] = $user['rights'];
    }
  }

  if (isset($_REQUEST['submit-button-entry'])) {
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];
    $hash_pass = hash('md5', $password);

    $query = "SELECT * FROM users WHERE login = '$login' AND password = '$hash_pass'";
    $result = mysqli_query($date, $query);
    $user = mysqli_fetch_array($result, MYSQL_ASSOC);
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $hash_pass;
    $_SESSION['rights'] = $user['rights'];
  }
  if (!$_SESSION['login']) {
    header('Location: entry.php');
    session_destroy();
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
        <form action="index.php" method="post">
          <div class="query-input-div">
            <span>Введите запрос</span>
            <input name="query-input" type="text" class="query-input" required>
          </div>
          <input type="submit" name="query-submit" class="query-button" value="Выполнить">
        </form>
      </div>

      <div class="result-container">
        <?php
          if (isset($_REQUEST['query-submit'])) {
            $query = $_REQUEST['query-input'];
            $query_type = explode(' ',trim($query));

            $query = htmlspecialchars($query);
            $query = mysqli_real_escape_string($date, $query);

            if (($_SESSION['rights'] == 'user' && $query_type[0] == 'SELECT') || $_SESSION['rights'] == 'admin') {

              if (!($query_result = mysqli_query($date, $query))) {
                echo "<span style='padding-left: 10px; font-weight: bold;'>Ошибка в запросе!</span>";
              } else {
                if ($query_type[0] == 'SELECT') {
                  $i = 1;
                  while ($fetched_item = mysqli_fetch_array($query_result, MYSQL_ASSOC)) {
                    echo "<span class='item'>Запись $i</span>";
                    include 'fetched_item.php';
                    $i = $i + 1;
                  }
                } else {
                  echo "<span style='padding-left: 10px; font-weight: bold;'>Запрос успешно выполнен!</span>";
                }
              }
            } else {
              echo "<span style='padding-left: 10px; font-weight: bold;'>Не достаточно прав!</span>";
            }

          }
        ?>
      </div>

    </div>
  </div>
</body>
</html>
