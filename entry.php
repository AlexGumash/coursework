<?php
  session_start();
  $_SESSION['login'] = 0; 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="entry.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Entry</title>
</head>
<body>
  <div class="header">
    <div class="container container-header">

      <div class="container-title">
        <span class="title">Formula Student DataBase</span>
      </div>
      <div>
        <span style="font-size: 20px;">Entry</span>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="container container-main">
      <div class="entry-form">
        <form action="index.php" method="post">
          <div class="form-container">
            <div class="form-input-div">
              <span>
                Логин:
              </span>
              <input type="text" name="login" class="form-input">
            </div>
            <div class="form-input-div">
              <span>
                Пароль:
              </span>
              <input type="password" name="password" class="form-input">
            </div>
            <div>
              <input type="submit" name="submit-button-entry" value="Войти" class="submit-button">
            </div>
            <div class="registration">
              <span>Еще не зарегистрированы?</span>
              <a href="registration.php">Регистрация</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
