<?php include '../database/connection.php' ?>
<?php session_start() ?>
<?php
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
      <div class="admin-container">
        <div class="sidebar">
          <ul class="menu-admin">

            <li class="menu-admin-item">
              <a href="checkRequest.php">
                <div class="menu-admin-item-link">
                  Заявки на создание команд
                </div>
              </a>
            </li>
            <li class="menu-admin-item">
              <a href="admin.php?content=checkEventReq">
                <div class="menu-admin-item-link">
                  Заявки на этапы
                </div>
              </a>
            </li>
            <?php
            if ($_SESSION['rights'] == 'admin') {
              ?>
              <li class="menu-admin-item">
                <a href="admin.php?content=addEvent">
                  <div class="menu-admin-item-link">
                    Добавить этап
                  </div>
                </a>
              </li>
              <li class="menu-admin-item">
                <a href="admin.php?content=ruleTeams">
                  <div class="menu-admin-item-link">
                    Управление командами
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
              case 'checkEventReq':
                include 'checkEventReq.php';
                break;
              case 'addEvent':
                include 'addEvent.php';
                break;
              case 'ruleTeams':
                include 'ruleTeams.php';
                break;
              case 'sendReqTeam':
                // include 'requests_join_team.php';
                break;
              case 'exitTeam':
                // code...
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
