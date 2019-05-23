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
      function updateTeam(id){
        var name = $("input[name='team-name']").val()
        var uni = $("input[name='team-uni']").val()
        var category = $("input[name='team-category']").val()
        var leader = $("input[name='team-leader']").val()

        $.ajax({
          type: "post",
          url: "update/update_team.php",
          data: {team_id: id, team_name: name, team_uni: uni, team_leader: leader, team_category: category}
        }).done(function(result){
          location.reload();
        })
      }

      function updateCar(id){
        var name = $("input[name='car-name']").val()
        var year = $("input[name='car-year']").val()

        $.ajax({
          type: "post",
          url: "update/update_car.php",
          data: {car_id: id, car_name: name, car_year: year}
        }).done(function(result){
          location.reload();
        })
      }

      function updateStudent(id){
        var name = $("input[name='student-name']").val()
        var course = $("input[name='student-course']").val()
        var faculty = $("input[name='student-faculty']").val()

        $.ajax({
          type: "post",
          url: "update/update_student.php",
          data: {student_id: id, student_name: name, student_faculty: faculty, student_course: course}
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
      $query = "SELECT * FROM team WHERE id = '$id'";
      $result = mysqli_query($date, $query);
      $team = mysqli_fetch_array($result, MYSQL_ASSOC);

      $team_name = $team['team_name'];
      $uni = $team['university'];
      $category = $team['category'];
      $leader = $team['teamleader_surname'] . " " . $team['teamleader_name'] . " " . $team['teamleader_patronymic'];
      ?>
      <div class="team-container">
          <div class="about-team">
            <span style="font-size: 20px; margin-bottom: 20px; margin-top: 10px; font-weight: bold">О команде</span>
            <div class="name about-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Название команды: </span>
                <span class="about-item-text"><?php echo $team_name ?> </span>
                <?php
              } else {
                ?>
                <span>Название команды: </span>
                <input class="about-item-text" type="text" name="team-name" value="<?php echo $team_name; ?>">
                <?php
              }
              ?>
            </div>
            <div class="uni about-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Университет: </span>
                <span class="about-item-text"><?php echo $uni ?> </span>
                <?php
              } else {
                ?>
                <span>Университет: </span>
                <input class="about-item-text" type="text" name="team-uni" value="<?php echo $uni; ?>">
                <?php
              }
              ?>
            </div>
            <div class="category about-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Категория: </span>
                <span class="about-item-text"><?php echo $category ?> </span>
                <?php
              } else {
                ?>
                <span>Категория: </span>
                <input class="about-item-text" type="text" name="team-category" value="<?php echo $category; ?>">
                <?php
              }
              ?>
            </div>
            <div class="leader about-item">
              <?php
              if (!is_admin()) {
                ?>
                <span>Руководитель: </span>
                <span class="about-item-text"><?php echo $leader ?> </span>
                <?php
              } else {
                ?>
                <span>Руководитель: </span>
                <input class="about-item-text" type="text" name="team-leader" value="<?php echo $leader; ?>">
                <?php
              }
              ?>
            </div>

            <?php
            if (is_admin()) { ?>
              <div class="button" onclick="updateTeam(<?php echo $team['id']; ?>)">
                <input type="submit" name="submit-button-about" value="Применить">
              </div>
            <?php
            }
            ?>

          </div>

          <div class="cars">
            <span style="font-size: 20px; margin-bottom: 20px; margin-top: 10px; font-weight: bold">Автомобили команды</span>
            <?php
            $query = "SELECT * FROM car WHERE team_name = '$team_name'";
            $result = mysqli_query($date, $query);

            while ($car = mysqli_fetch_array($result, MYSQL_ASSOC)) {
              $name = $car['name'];
              $year = $car['year'];
              ?>
              <div class="car">
                <div class="car-item">
                  <?php
                  if (!is_admin()) {
                    ?>
                    <span>Название: </span>
                    <span class="car-item-text"><?php echo $name ?> </span>
                    <?php
                  } else {
                    ?>
                    <span>Название: </span>
                    <input class="car-item-text" type="text" name="car-name" value="<?php echo $name; ?>">
                    <?php
                  }
                  ?>
                </div>
                <div class="car-item">
                  <?php
                  if (!is_admin()) {
                    ?>
                    <span>Год постройки: </span>
                    <span class="car-item-text"><?php echo $year ?> </span>
                    <?php
                  } else {
                    ?>
                    <span>Год постройки: </span>
                    <input class="car-item-text" type="text" name="car-year" value="<?php echo $year; ?>">
                    <?php
                  }
                  ?>
                </div>
              </div>
              <?php
              if (is_admin()) {
                ?>
                <div class="button" onclick="updateCar(<?php echo $car['id']; ?>)">
                <input type="submit" name="submit-button-car" value="Применить">
                </div>
                <?php
              }
            }
            ?>


          </div>

        <div class="students">
          <span style="font-size: 20px; margin-bottom: 20px; margin-top: 10px; font-weight: bold">Состав команды</span>
          <?php
            $query = "SELECT * FROM student WHERE team_name = '$team_name'";
            $result = mysqli_query($date, $query);

            while ($student = mysqli_fetch_array($result, MYSQL_ASSOC)) {
              $name = $student['surname'] . " " . $student['name'] . " " . $student['patronymic'];
              $course = $student['course'];
              $faculty = $student['faculty'];
          ?>
            <div class="student">
              <div class="student-item">
                <?php
                if (!is_admin()) {
                  ?>
                  <span style="font-weight: bold">Имя: </span>
                  <span class="student-item-text"><?php echo $name ?> </span>
                  <?php
                } else {
                  ?>
                  <span>Имя: </span>
                  <input class="student-item-text" type="text" name="student-name" value="<?php echo $name; ?>">
                  <?php
                }
                ?>
              </div>
              <div class="student-item">
                <?php
                if (!is_admin()) {
                  ?>
                  <span>Курс: </span>
                  <span class="student-item-text"><?php echo $course ?> </span>
                  <?php
                } else {
                  ?>
                  <span>Курс: </span>
                  <input class="student-item-text" type="text" name="student-course" value="<?php echo $course; ?>">
                  <?php
                }
                ?>
              </div>
              <div class="student-item">
                <?php
                if (!is_admin()) {
                  ?>
                  <span>Факультет: </span>
                  <span class="student-item-text"><?php echo $faculty ?> </span>
                  <?php
                } else {
                  ?>
                  <span>Факультет: </span>
                  <input class="student-item-text" type="text" name="student-faculty" value="<?php echo $faculty; ?>">
                  <?php
                }
                ?>
              </div>
              <?php
              if (is_admin()) {
                ?>
                <div class="button" onclick="updateStudent(<?php echo $student['id']; ?>)">
                  <input type="submit" name="submit-button-student" value="Применить">
                </div>
              <?php
              }
              ?>
            </div>
          <?php
            }
          ?>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
