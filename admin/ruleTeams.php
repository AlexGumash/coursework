
<?php include '../database/connection.php'; ?>


<div class="rule-container">
  <?php
    $query = "SELECT * FROM team";
    $result = mysqli_query($date, $query);
    while ($team = mysqli_fetch_array($result, MYSQL_ASSOC)) {
      ?>
      <div class="team2">
        <div class="team2-item">
          <span style="font-weight:bold">Название команды:</span>
          <span><?php echo $team['team_name'] ?></span>
        </div>
        <div class="team2-item">
          <span>Университет:</span>
          <span><?php echo $team['university'] ?></span>
        </div>
        <div class="team2-item">
          <span>Категория:</span>
          <span><?php echo $team['category'] ?></span>
        </div>
        <a href="deleteTeam.php?id=<?php echo $team['id']; ?>">
          <div class="delete-button">
            Удалить команду
          </div>
        </a>
      </div>
      <?php
    }
  ?>
</div>
