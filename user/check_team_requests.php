<div class="requests">
  <span style="margin-bottom: 20px; padding-left: 10px; font-weight: bold">Заявки на вступление в вашу команду</span>
  <?php
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM requests_join_team WHERE team_id = (SELECT id FROM team WHERE teamleader_id = '$user_id')";
    $result = mysqli_query($date, $query);
    while ($request = mysqli_fetch_array($result, MYSQL_ASSOC)) {
      $user_req_id = $request['user_id'];
      $query = "SELECT * FROM users WHERE id = $user_req_id";
      $result2 = mysqli_query($date, $query);
      $user_req = mysqli_fetch_array($result2, MYSQL_ASSOC);

      $full_name = $user_req['surname'] . " " . $user_req['name'] . " " . $user_req['patronymic'];
      ?>

      <div class="request">
        <div class="request-item" style="font-weight: bold">
          <span>ФИО</span>
          <span><?php echo $full_name ?></span>
        </div>
        <div class="request-item">
          <span>Логин</span>
          <span><?php echo $user_req['login'] ?></span>
        </div>
        
        <div class="buttons" style="width: 100%">
          <a class="check-button" style="margin-right:10px; color: black" href="req_team_listener.php?action=submit&req_id=<?php echo $request['id']; ?>">
            <div>
              Подтвердить заявку
            </div>
          </a>
          <a class="check-button" style=" color: black" href="req_team_listener.php?action=delete&req_id=<?php echo $request['id']; ?>">
            <div>
              Отклонить заявку
            </div>
          </a>
        </div>
      </div>

      <?php
    }
  ?>
</div>
