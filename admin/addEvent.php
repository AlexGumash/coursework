<div class="addEvent">
  <form class="" action="addEventListener.php" method="post">
    <div class="form-container">
      <div class="form-input-div">
        <span>
          Название этапа:
        </span>
        <input type="text" name="name" class="form-input" required>
      </div>
      <div class="form-input-div">
        <span>
          Место проведения:
        </span>
        <input type="text" name="location" class="form-input" required>
      </div>
      <div class="form-input-div">
        <span>
          Год регламента:
        </span>
        <select class="form-input" name="rules" required>
          <option value="2015">2015</option>
          <option value="2016">2016</option>
          <option value="2017">2017</option>
          <option value="2018">2018</option>
          <option value="2019">2019</option>
          <option value="2020">2020</option>
        </select>
      </div>
      <div class="form-input-div">
        <span>
          Трасса:
        </span>
        <select class="form-input" name="track">
          <?php
            $query = "SELECT * FROM track";
            $result = mysqli_query($date, $query);
            while ($track = mysqli_fetch_array($result, MYSQL_ASSOC)) {
              $name = $track['track_name'];
              $location = $track['location'];
              $length = $track['length'];
              ?>
              <option value="<?php echo $name; ?>"><?php echo $name ?></option>
              <?php
            }
          ?>
        </select>
      </div>
      <div class="form-input-div">
        <span>
          Дата начала:
        </span>
        <input type="date" name="date-begin" class="form-input" required>
      </div>
      <div class="form-input-div">
        <span>
          Дата окончания:
        </span>
        <input type="date" name="date-end" class="form-input" required>
      </div>
      <div>
        <input class="post-request" type="submit" name="postRequestEvent" value="Отправить заявку">
      </div>
    </div>
  </form>
</div>
