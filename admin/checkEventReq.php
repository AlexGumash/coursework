
<div class="requests">
  <?php
  $query = "SELECT * FROM requests_event";
  $result = mysqli_query($date, $query);
  while ($request = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $req_id = $request['id'];
    ?>

    <div class="request">
        <div class="request-item">
          <span style="font-weight: bold">Название команды: </span>
          <?php echo $request['team_name']; ?>
        </div>
        <div class="request-item">
          <span>Этап: </span>
          <?php echo $request['event_name']; ?>
        </div>
        <div class="request-item">
          <span>Категория: </span>
          <?php echo $request['category']; ?>
        </div>
        <div class="request-item">
          <span>Дата заявки: </span>
          <?php echo $request['date']; ?>
        </div>

        <div class="buttons">
          <a style="color: black" class="check-button" href="checkEventReqListener.php?action=submit&id=<?php echo $req_id; ?>">
            <div>
              Подтвердить заявку
            </div>
          </a>
          <a style="color: black" class="check-button" href="checkEventReqListener.php?action=delete&id=<?php echo $req_id; ?>">
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
