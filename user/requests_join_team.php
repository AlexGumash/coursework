<form action="personal.php" method="post">
  <div class="form-container">

    <div class="form-input-div">
      <span>
        Выберите команду, чтобы отправить заявку:
      </span>
      <select class="form-input" name="team">
        <?php
          $current_date = date('y.m.d');
          $query = "SELECT * FROM team";
          $result = mysqli_query($date, $query);
          while ($team = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            ?>
              <option style="font-size: 15px" value="<?php echo $team['id']?>"><?php echo $team['team_name']?></option>
            <?php
          }
        ?>
      </select>
    </div>
    <div>
      <input class="post-request" type="submit" name="postRequestTeam" value="Отправить заявку">
    </div>
  </div>
</form>
