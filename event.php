<?php session_start(); ?>
<?php include 'database/connection.php' ?>
<?php
  include 'verify.php';
  $id = $_REQUEST['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles/main.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
  <script type="text/javascript">
      function updateEvent(id){

        var name = $("input[name='name']").val()
        var location = $("input[name='location']").val()
        var count = $("input[name='count']").val()
        var date_begin = $("input[name='begin']").val()
        var date_end = $("input[name='end']").val()
        var rules_year = $("input[name='year']").val()

        $.ajax({
          type: "post",
          url: "update/update_event.php",
          data: {event_id: id, event_name: name, event_location: location, event_count: count, begin: date_begin, end: date_end, year: rules_year}
        }).done(function(result){
          window.location.reload();
        })
      }

      function updateTrack(id){
        var name = $("input[name='track-name']").val()
        var address = $("input[name='track-address']").val()
        var length = $("input[name='track-length']").val()

        $.ajax({
          type: "post",
          url: "update/update_track.php",
          data: {track_id: id, track_name: name, track_address: address, track_length: length}
        }).done(function(result){
          location.reload();
        })
      }

      function updateResult(id){

        var name = $("input[name='team-name']").val()
        var number = $("input[name='number']").val()
        var category = $("input[name='category']").val()
        var place = $("input[name='place']").val()
        var acceleration = $("input[name='acceleration']").val()
        var eight = $("input[name='eight']").val()
        var autocross = $("input[name='autocross']").val()
        var race = $("input[name='race']").val()
        var fuel = $("input[name='fuel']").val()
        var score = $("input[name='score']").val()

        $.ajax({
          type: "post",
          url: "update/update_result.php",
          data: {result_id: id, result_name: name, result_number: number, result_category: category, result_place: place, result_acceleration: acceleration, result_eight: eight, result_autocross: autocross, result_race: race, result_fuel: fuel, result_score: score}
        }).done(function(result){
          location.reload();
        })
      }
  </script>
  <title>DataBase</title>
</head>
<body>
  <?php include 'usable/header.php' ?>
  <div class="main">
    <div class="container container-main">
      <?php
      $query = "SELECT * FROM event WHERE id = '$id'";
      $result = mysqli_query($date, $query);
      $event = mysqli_fetch_array($result, MYSQL_ASSOC);

      $name = $event['name_of_competition'];
      $location = $event['location'];
      $count = $event['count_of_participations'];
      $date_begin = $event['date_begin'];
      $date_end = $event['date_end'];
      $rules_year = $event['rules_year'];
      $track_name = $event['track_name'];
      ?>
      <div class="event-container">

        <div class="about-event">
          <span style="font-size: 20px; margin-bottom: 20px; margin-top: 10px; font-weight: bold">Об этапе</span>
          <div class="name about-item">
            <?php
            if (!is_admin()) {
              ?>
              <span>Название этапа: </span>
              <span class="about-item-text"><?php echo $name ?> </span>
              <?php
            } else {
              ?>
              <span>Название этапа: </span>
              <input class="about-item-text" type="text" name="name" value="<?php echo $name; ?>">
              <?php
            }
            ?>
          </div>
          <div class="location about-item">
            <?php
            if (!is_admin()) {
              ?>
              <span>Место проведения: </span>
              <span class="about-item-text"><?php echo $location ?> </span>
              <?php
            } else {
              ?>
              <span>Место проведения: </span>
              <input class="about-item-text" type="text" name="location" value="<?php echo $location; ?>">
              <?php
            }
            ?>
          </div>
          <div class="count about-item">
            <?php
            if (!is_admin()) {
              ?>
              <span>Количество участников: </span>
              <span class="about-item-text"><?php echo $count ?> </span>
              <?php
            } else {
              ?>
              <span>Количество участников: </span>
              <input class="about-item-text" type="text" name="count" value="<?php echo $count; ?>">
              <?php
            }
            ?>
          </div>
          <div class="date_begin about-item">
            <?php
            if (!is_admin()) {
              ?>
              <span>Дата начала: </span>
              <span class="about-item-text"><?php echo $date_begin ?> </span>
              <?php
            } else {
              ?>
              <span>Дата начала: </span>
              <input class="about-item-text" type="text" name="begin" value="<?php echo $date_begin; ?>">
              <?php
            }
            ?>
          </div>
          <div class="date_end about-item">
            <?php
            if (!is_admin()) {
              ?>
              <span>Дата конца: </span>
              <span class="about-item-text"><?php echo $date_end ?> </span>
              <?php
            } else {
              ?>
              <span>Дата конца: </span>
              <input class="about-item-text" type="text" name="end" value="<?php echo $date_end; ?>">
              <?php
            }
            ?>
          </div>
          <div class="rules_year about-item">
            <?php
            if (!is_admin()) {
              ?>
              <span>Год регламента: </span>
              <span class="about-item-text"><?php echo $rules_year ?> </span>
              <?php
            } else {
              ?>
              <span>Год регламента: </span>
              <input class="about-item-text" type="text" name="year" value="<?php echo $rules_year; ?>">
              <?php
            }
            ?>
          </div>
          <?php
          if (is_admin()) { ?>
            <div class="button" onclick="updateEvent(<?php echo $event['id']; ?>)">
              <input type="submit" name="submit-button-about" value="Применить">
            </div>
          <?php
          }
          ?>
        </div>

        <div class="track">
          <span style="font-size: 20px; margin-bottom: 20px; margin-top: 10px; font-weight: bold">Трасса</span>
          <?php
            $query = "SELECT * FROM track WHERE track_name = '$track_name'";
            $result = mysqli_query($date, $query);

            $track = mysqli_fetch_array($result, MYSQL_ASSOC);
            $track_name = $track['track_name'];
            $address = $track['track_address'];
            $length = $track['track_length'];
          ?>
            <div class="track-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Название: </span>
                <span class="track-item-text"><?php echo $track_name ?> </span>
                <?php
              } else {
                ?>
                <span>Название: </span>
                <input class="track-item-text" type="text" name="track-name" value="<?php echo $track_name; ?>">
                <?php
              }
              ?>
            </div>
            <div class="track-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Адресс: </span>
                <span class="track-item-text"><?php echo $address ?> </span>
                <?php
              } else {
                ?>
                <span>Адресс: </span>
                <input class="track-item-text" type="text" name="track-address" value="<?php echo $address; ?>">
                <?php
              }
              ?>
            </div>
            <div class="track-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Длина: </span>
                <span class="track-item-text"><?php echo $length ?> </span>
                <?php
              } else {
                ?>
                <span>Длина: </span>
                <input class="track-item-text" type="text" name="track-length" value="<?php echo $length; ?>">
                <?php
              }
              ?>
            </div>
            <?php
            if (is_admin()) { ?>
              <div class="button" onclick="updateTrack(<?php echo $track['id']; ?>)">
                <input type="submit" name="submit-button-about" value="Применить">
              </div>
            <?php
            }
            ?>
        </div>

        <div class="results">
          <span style="font-size: 20px; margin-bottom: 20px; margin-top: 10px; font-weight: bold">Результаты команд</span>
          <?php
            $query = "SELECT * FROM team_result WHERE name_of_competition = '$name'";
            $result = mysqli_query($date, $query);

            while ($results = mysqli_fetch_array($result, MYSQL_ASSOC)) {
              $car_number = $results['car_number'];
              $name_of_team = $results['name_of_team'];
              $category = $results['category'];
              $final_place = $results['final_place'];
              $acceleration_result = $results['acceleration_result'];
              $eight_result = $results['eight_result'];
              $autocross_result = $results['autocross_result'];
              $race_result = $results['race_result'];
              $fuel_result = $results['fuel_result'];
              $final_result = $results['final_result'];
          ?>
          <div class="result" <?php if (!is_admin()) {
            echo 'style= "margin-bottom: 30px"';
          } ?>>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span style="font-weight: bold">Название команды: </span>
                <span class="results-item-text"><?php echo $name_of_team ?> </span>
                <?php
              } else {
                ?>
                <span style="font-weight: bold">Название команды: </span>
                <input class="results-item-text" type="text" name="team-name" value="<?php echo $name_of_team; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Номер автомобиля: </span>
                <span class="results-item-text"><?php echo $car_number ?> </span>
                <?php
              } else {
                ?>
                <span>Номер автомобиля: </span>
                <input class="results-item-text" type="text" name="number" value="<?php echo $car_number; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Категория: </span>
                <span class="results-item-text"><?php echo $category ?> </span>
                <?php
              } else {
                ?>
                <span>Категория: </span>
                <input class="results-item-text" type="text" name="category" value="<?php echo $category; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Занятое место в категории: </span>
                <span class="results-item-text"><?php echo $final_place ?> </span>
                <?php
              } else {
                ?>
                <span>Занятое место в категории: </span>
                <input class="results-item-text" type="text" name="place" value="<?php echo $final_place; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Результат ускорения: </span>
                <span class="results-item-text"><?php echo $acceleration_result ?> </span>
                <?php
              } else {
                ?>
                <span>Результат ускорения: </span>
                <input class="results-item-text" type="text" name="acceleration" value="<?php echo $acceleration_result; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Результат восьмерки: </span>
                <span class="results-item-text"><?php echo $eight_result ?> </span>
                <?php
              } else {
                ?>
                <span>Результат восьмерки: </span>
                <input class="results-item-text" type="text" name="eight" value="<?php echo $eight_result; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Результат автокросаа: </span>
                <span class="results-item-text"><?php echo $autocross_result ?> </span>
                <?php
              } else {
                ?>
                <span>Результат автокросаа: </span>
                <input class="results-item-text" type="text" name="autocross" value="<?php echo $autocross_result; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Результат гонки: </span>
                <span class="results-item-text"><?php echo $race_result ?> </span>
                <?php
              } else {
                ?>
                <span>Результат гонки: </span>
                <input class="results-item-text" type="text" name="race" value="<?php echo $race_result; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Топливная эффективность: </span>
                <span class="results-item-text"><?php echo $fuel_result ?> </span>
                <?php
              } else {
                ?>
                <span>Топливная эффективность: </span>
                <input class="results-item-text" type="text" name="fuel" value="<?php echo $fuel_result; ?>">
                <?php
              }
              ?>
            </div>
            <div class="results-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Очков набрано: </span>
                <span class="results-item-text"><?php echo $final_result ?> </span>
                <?php
              } else {
                ?>
                <span>Очков набрано: </span>
                <input class="results-item-text" type="text" name="score" value="<?php echo $final_result; ?>">
                <?php
              }
              ?>
            </div>
          </div>
          <?php

          if (is_admin()) { ?>
            <div class="button" onclick="updateResult(<?php echo $results['id']; ?>)">
              <input type="submit" name="submit-button-about" value="Применить">
            </div>
          <?php
          }
            }
          ?>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
