<form action="personal.php" method="post">
  <div class="form-container">

    <div class="form-input-div">
      <span>
        Выберите этап:
      </span>
      <select class="form-input" name="event[]" multiple style="height: 70px;">
        <?php
          $current_date = date('y.m.d');
          $query = "SELECT * FROM event WHERE date_begin > '$current_date'";
          $result = mysqli_query($date, $query);
          while ($event = mysqli_fetch_array($result, MYSQL_ASSOC)) {
            ?>
              <option style="font-size: 15px" value="<?php echo $event['name_of_competition']?>"><?php echo $event['name_of_competition']?></option>
            <?php
          }
        ?>
      </select>
    </div>
    <div>
      <input class="post-request" type="submit" name="postRequestEvent" value="Отправить заявку">
    </div>
  </div>
</form>
