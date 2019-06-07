<?php include '../database/connection.php' ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/requests.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <?php include '../usable/header.php' ?>
  <div class="main">
    <div class="container container-main">
        <form action="../main.php?teamleader_id=<?php echo $_SESSION['user_id']; ?>" method="post">
          <div class="form-container">
            <div class="form-input-div">
              <span>
                Название команды:
              </span>
              <input type="text" name="name" class="form-input" required>
            </div>
            <div class="form-input-div">
              <span>
                Университет:
              </span>
              <input type="text" name="uni" class="form-input" required>
            </div>
            <!-- <div class="form-input-div">
              <span>
                ФИО капитана:
              </span>
              <input type="text" name="teamleader" class="form-input" required>
            </div> -->
            <div class="form-input-div">
              <span>
                Категория:
              </span>
              <select class="form-input" name="category">
                <option value="Электрик">Электрик</option>
                <option value="ДВС">ДВС</option>
              </select>
            </div>
            <div>
              <input class="post-request" type="submit" name="postRequest" value="Отправить заявку">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</body>
</html>
