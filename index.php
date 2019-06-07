<?php session_start(); ?>
<?php include 'database/connection.php' ?>
<?php
  include 'verify.php';
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

      <div class="query-result">
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
            if (is_root($query)) {
              if (!is_drop($query)) {

                if (!($query_result = mysqli_query($date, $query))) {
                  echo mysqli_error($date);
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
                echo "<span style='padding-left: 10px; font-weight: bold;'>Нельзя удалять таблицы!</span>";
              }
            } else {
              echo "<span style='padding-left: 10px; font-weight: bold;'>Не достаточно прав!</span>";
            }

          }
          ?>
        </div>
      </div>

      <div class="for-users">
        <div class="teams">
          <span style="font-size: 20px; margin-bottom: 20px; font-weight: bold">Команды:</span>
          <div class="team-table-head">
            <div class="head-item" style="width: 50%">
              Название команды
            </div>
            <div class="head-item" style="width: 25%">
              Университет
            </div>
            <div class="head-item" style="width: 25%">
              Категория
            </div>
          </div>
          <?php
            $query = "SELECT * FROM team";
            $result = mysqli_query($date, $query);
            while ($team = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            ?>
              <a href="team.php?id=<?php echo $team['id']; ?>" class="team">
                  <div class="name team-item">
                    <?php echo $team['team_name']; ?>
                  </div>
                  <div class="uni team-item">
                    <?php echo $team['university']; ?>
                  </div>
                  <div class="category team-item">
                    <?php echo $team['category']; ?>
                  </div>
              </a>
            <?php
            }
          ?>
        </div>
        <div class="events">
          <span style="font-size: 20px; margin-bottom: 20px; margin-top: 20px; font-weight: bold">Этапы:</span>
          <div class="team-table-head">
            <div class="event-item" style="width: 40%">
              Название этапа
            </div>
            <div class="event-item" style="width: 25%;">
              Место проведения
            </div>
            <div class="event-item" style="justify-content: center">
              Дата начала
            </div>
            <div class="event-item" style="justify-content: center">
              Дата конца
            </div>
          </div>
          <?php
            $query = "SELECT * FROM event";
            $result = mysqli_query($date, $query);
            while ($event = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            ?>
              <a href="event.php?id=<?php echo $event['id'];?>" class="event">
                <div class="event-name event-item">
                  <?php echo $event['name_of_competition']; ?>
                </div>
                <div class="location event-item">
                  <?php echo $event['location']; ?>
                </div>
                <div class="date event-item">
                  <?php echo $event['date_begin']; ?>
                </div>
                <div class="date event-item">
                  <?php echo $event['date_end']; ?>
                </div>
              </a>
            <?php
            }
          ?>
        </div>
        <div class="rules">
          <span style="font-size: 20px; margin-bottom: 20px; margin-top: 20px; font-weight: bold">Текущий регламент</span>
          <div class="rules_anchors">
            <a href="https://www.formulastudent.de/fileadmin/user_upload/all/2018/rules/FS-Rules_2018_V1.0.pdf">Читать</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
