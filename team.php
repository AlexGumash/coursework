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
        var category = $("select[name='team-category']").val()

        $.ajax({
          type: "post",
          url: "update/update_team.php",
          data: {team_id: id, team_name: name, team_uni: uni, team_category: category}
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
          console.log(result);
          // location.reload();
        })
      }

      function updateStudent(id){
        var name = $("input[name='student-name']").val()
        var login = $("input[name='login']").val()
        var roler = $("select[name='role']").val()

        $.ajax({
          type: "post",
          url: "update/update_student.php",
          data: {student_id: id, student_name: name, role: roler, student_login: login}
        }).done(function(result){
          console.log(result);
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
      echo mysqli_error($date);

      $team_name = $team['team_name'];
      $uni = $team['university'];
      $category = $team['category'];
      // $leader = $team['teamleader_surname'] . " " . $team['teamleader_name'] . " " . $team['teamleader_patronymic'];
      ?>
      <div class="team-container">
          <div class="about-team">
            <span style="font-size: 20px; margin-bottom: 20px; margin-top: 10px; font-weight: bold">О команде</span>
            <div class="name about-item">
              <?php
              if (!can_modify($team['teamleader_id'], $_SESSION['user_id'], $_SESSION['role'])) {
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
              if (!can_modify($team['teamleader_id'], $_SESSION['user_id'], $_SESSION['role'])) {
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
              if (!can_modify($team['teamleader_id'], $_SESSION['user_id'], $_SESSION['role'])) {
                ?>
                <span>Категория: </span>
                <span class="about-item-text"><?php echo $category ?> </span>
                <?php
              } else {
                ?>
                <span>Категория: </span>
                <select class="about-item-text" name="team-category">
                  <option value="ДВС">ДВС</option>
                  <option value="Электрик">Электрик</option>
                </select>
                <?php
              }
              ?>
            </div>


            <?php
            if (can_modify($team['teamleader_id'], $_SESSION['user_id'], $_SESSION['role'])) { ?>
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
                  if (!can_modify($team['teamleader_id'], $_SESSION['user_id'], $_SESSION['role'])) {
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
                  if (!can_modify($team['teamleader_id'], $_SESSION['user_id'], $_SESSION['role'])) {
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
              if (can_modify($team['teamleader_id'], $_SESSION['user_id'], $_SESSION['role'])) {
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
            $team_id = $_REQUEST['id'];
            $query = "SELECT * FROM users WHERE team_id = '$team_id'";
            $result = mysqli_query($date, $query);

            while ($student = mysqli_fetch_array($result, MYSQL_ASSOC)) {
              $name = $student['surname'] . " " . $student['name'] . " " . $student['patronymic'];
              $login = $student['login'];
              $role = $student['role'];
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
                  <span>Логин: </span>
                  <span class="student-item-text"><?php echo $login ?> </span>
                  <?php
                } else {
                  ?>
                  <span>Логин: </span>
                  <input class="student-item-text" type="text" name="login" value="<?php echo $login; ?>">
                  <?php
                }
                ?>
              </div>
              <div class="student-item">
                <?php
                if (!is_admin()) {
                  ?>
                  <span>Должность: </span>
                  <span class="student-item-text"><?php if ($role == 'teamleader') {
                    echo "Капитан";
                  } else {
                    echo "Участник";
                  }?> </span>
                  <?php
                } else {
                  ?>
                  <span>Должность: </span>
                  <select class="student-item-text" name="role">
                    <option value="teamleader">Капитан команды</option>
                    <option value="teammember">Член команды</option>
                  </select>
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

              <?php
                if ($_SESSION['role'] == 'teamleader' && $student['role'] != 'teamleader') {
                  ?>
                  <a class="buttontodel" href="user/teammemberdelete.php?id_to_del=<?php echo $student['id']; ?>">
                    <div>
                      Выкинуть из команды
                    </div>
                  </a>
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
