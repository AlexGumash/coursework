<?php include '../database/connection.php' ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../styles/main.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="../usable/jquery-3.4.1.min.js"></script>
  <title>Document</title>
  <script type="text/javascript">
  function checkRequest(id, tl_id){
    $.ajax({
      type: "post",
      url: "../update/checkTeamRequest.php",
      data: {request_id: id, teamleader_id: tl_id}
    }).done(function(result){
      // console.log(result);
      location.reload();
    })
  }
  function deleteRequest(id){
    $.ajax({
      type: "post",
      url: "../update/deleteTeamRequest.php",
      data: {request_id: id}
    }).done(function(result){
      location.reload();
    })
  }
  </script>
</head>
<body>
  <?php include '../usable/header.php' ?>
  <div class="main">
    <div class="container container-main">
      <div class="check-requests" style="display:flex; flex-direction:column; margin-bottom: 20px;">

        <?php
        $query = "SELECT * FROM requests";
        $result = mysqli_query($date, $query);
        while ($request = mysqli_fetch_array($result, MYSQL_ASSOC)) {

          ?>
          <div class="check-request">
            <div class="check-request-item">
              <span style="font-weight: bold">Название команды: </span>
              <?php echo $request['team_name']; ?>
            </div>
            <div class="check-request-item">
              <span>Университет: </span>
              <?php echo $request['university']; ?>
            </div>
            <div class="check-request-item">
              <span>Категория: </span>
              <?php echo $request['category']; ?>
            </div>
            <div class="check-buttons">
              <div class="check-button" onclick="checkRequest(<?php echo $request['id'] . ", " . $request['teamleader_id'] ?>)">
                Подтвердить заявку
              </div>
              <div class="check-button" onclick="deleteRequest(<?php echo $request['id']; ?>)">
                Отклонить заявку
              </div>
            </div>

          </div>
          <?php
        }
        ?>
      </div>


    </div>
  </div>
</body>
</html>
