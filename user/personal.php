<?php include '../database/connection.php' ?>
<?php session_start() ?>
<?php
if (isset($_REQUEST['postRequestEvent'])) {
  $teamleader_id = $_SESSION['user_id'];
  $query = "SELECT * FROM team WHERE teamleader_id = $teamleader_id";
  $result = mysqli_query($date, $query);
  $team = mysqli_fetch_array($result);
  $team_name = $team['team_name'];
  $category = $team['category'];

  $current_date = date('y.m.d');

  foreach ($_REQUEST['event'] as $key => $event_name) {
    $query = "INSERT INTO requests_event (id, event_name, team_name, category, date) values (NULL, '$event_name', '$team_name', '$category', '$current_date')";
    $result = mysqli_query($date, $query);
    if (!$result) {
      echo mysqli_error($date);
    }
  }

  header('Location: personal.php?content=sendReqEvent');
}

if (isset($_REQUEST['postRequestTeam'])) {
  $user_id = $_SESSION['user_id'];
  $team_id = $_REQUEST['team'];

  $current_date = date('y.m.d');

  $query = "INSERT INTO requests_join_team (id, team_id, user_id, date) values (NULL, '$team_id', '$user_id', '$current_date')";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }

  header('Location: personal.php?content=about');
}

if (isset($_REQUEST['changeInfo'])) {
  $name = $_REQUEST['name'];
  $surname = $_REQUEST['surname'];
  $patronymic = $_REQUEST['patronymic'];
  $login = $_REQUEST['login'];
  $id = $_SESSION['user_id'];
  $query = "UPDATE users SET name = '$name', surname = '$surname', patronymic = '$patronymic', login = '$login' WHERE id = $id";
  $result = mysqli_query($date, $query);
  if (!$result) {
    echo mysqli_error($date);
  }
  header('Location: personal.php?content=about');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/main.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <title>Document</title>
</head>
<body>
  <?php include '../usable/header.php' ?>
  <div class="main">
    <div class="container container-main">
      <div class="personal-container">
        <div class="sidebar">
          <ul class="menu-personal">
            <li class="menu-personal-item">
              <a href="personal.php?content=about">
                <div class="menu-personal-item-link">
                  О себе
                </div>
              </a>
            </li>

            <?php
              if ($_SESSION['role'] != 'none' ) {
                ?>
                <li class="menu-personal-item">
                  <?php
                    $team_id = $_SESSION['team_id'];
                    $query = "SELECT * FROM team WHERE id = '$team_id'";
                    $result = mysqli_query($date, $query);
                    $team = mysqli_fetch_array($result, MYSQL_ASSOC);
                  ?>
                  <a href="../team.php?id=<?php echo $team['id']?>">
                    <div class="menu-personal-item-link">
                      О команде
                    </div>
                  </a>
                </li>
                <?php
              }
            ?>
            <?php
              if ($_SESSION['role'] == 'none' ) {
                ?>
                <li class="menu-personal-item">
                  <a href="postRequest.php">
                    <div class="menu-personal-item-link">
                      Создать команду
                    </div>
                  </a>
                </li>
                <?php
              }
            ?>

            <?php
            if ($_SESSION['role'] == 'teamleader') {
              ?>
              <li class="menu-personal-item">
                <a href="personal.php?content=sendReqEvent">
                  <div class="menu-personal-item-link">
                    Отправить заявку на этап
                  </div>
                </a>
              </li>
              <li class="menu-personal-item">
                <a href="personal.php?content=checkReqTeam">
                  <div class="menu-personal-item-link">
                    Проверить заявки
                  </div>
                </a>
              </li>
              <li class="menu-personal-item">
                <a href="personal.php?content=addCar">
                  <div class="menu-personal-item-link">
                    Добавить автомобиль
                  </div>
                </a>
              </li>
              <?php
            } else if ($_SESSION['role'] == 'none'){
              ?>
              <li class="menu-personal-item">
                <a href="personal.php?content=sendReqTeam">
                  <div class="menu-personal-item-link">
                    Вступить в команду
                  </div>
                </a>
              </li>
              <?php
            }
            ?>
            <?php
              if ($_SESSION['role'] != 'none' ) {
                ?>
                <li class="menu-personal-item">
                  <a href="teammemberdelete.php?id_to_del=<?php echo $_SESSION['user_id']; ?>">
                    <div class="menu-personal-item-link">
                      Выйти из команды
                    </div>
                  </a>
                </li>
                <?php
              }
            ?>


          </ul>
        </div>


        <div class="content">
          <?php
            switch ($_REQUEST['content']) {
              case 'about':
                include 'about.php';
                break;
              case 'sendReqEvent':
                include 'requests_event.php';
                break;
              case 'checkReqTeam':
                include 'check_team_requests.php';
                break;
              case 'sendReqTeam':
                include 'requests_join_team.php';
                break;
              case 'addCar':
                include 'addCar.php';
                break;
              default:
                // code...
                break;
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
