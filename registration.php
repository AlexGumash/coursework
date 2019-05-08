<?php include 'database/connection.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="registration.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Registration</title>
</head>
<body>
  <div class="header">
    <div class="container container-header">

      <div class="container-title">
        <span class="title">Formula Student DataBase</span>
      </div>
      <div>
        <span style="font-size: 20px;">Registration</span>
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
                Имя:
              </span>
              <input type="text" name="name" class="form-input" required>
            </div>
            <div class="form-input-div">
              <span>
                Фамилия:
              </span>
              <input type="text" name="surname" class="form-input">
            </div>
            <div class="form-input-div">
              <span>
                Логин:
              </span>
              <input type="text" name="login" class="form-input" required>
            </div>
            <div class="form-input-div">
              <span>
                Пароль:
              </span>
              <input type="password" name="password" class="form-input" required>
            </div>
            <div class="form-input-div">
              <span>
                Подтвердите пароль:
              </span>
              <input type="password" name="password-confirm" class="form-input">
            </div>
            <div style="align-self: flex-end;">
              <input type="submit" name="submit-button-registration" value="Зарегистрироваться" class="submit-button">
            </div>
            <div class="entry">
              <span>Уже зарегистрированы?</span>
              <a href="entry.php">Войти</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
