<?php
  $login = $_SESSION['login'];

  $query = "SELECT * FROM users WHERE login = '$login'";
  $result = mysqli_query($date, $query);
  $user = mysqli_fetch_array($result, MYSQL_ASSOC);
  $team_id = $user['team_id'];
  if (!$user) {
    echo mysqli_error($date);
  }
?>

<div class="about">
  <form class="" action="personal.php" method="post">
    <div class="about-item">
      <span style="font-weight: bold; margin-right: 40px;"><?php echo $user['login'] ?></span>
      <?php
      if ($user['team_id']) {
        $query = "SELECT * FROM team WHERE id = $team_id";
        $result = mysqli_query($date, $query);
        $team = mysqli_fetch_array($result, MYSQL_ASSOC);
        ?>
        <span><?php echo $team['team_name'] ?></span>
        <?php
      }
      ?>
    </div>

    <div class="about-item">
      <span style="margin-right:40px">Имя</span>
      <input type="text" name="name" value="<?php echo $user['name']; ?>">
    </div>

    <div class="about-item">
      <span style="margin-right:40px">Фамилия</span>
      <input type="text" name="surname" value="<?php echo $user['surname']; ?>">
    </div>

    <div class="about-item">
      <span style="margin-right:40px">Отчество</span>
      <input type="text" name="patronymic" value="<?php echo $user['patronymic']; ?>">
    </div>

    <div class="about-item">
      <span style="margin-right:40px">Логин</span>
      <input type="text" name="login" value="<?php echo $user['login']; ?>">
    </div>
    <div>
      <input class="post-request" type="submit" name="changeInfo" value="Изменить">
    </div>
  </form>
</div>
