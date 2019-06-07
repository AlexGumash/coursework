<?php
  $id = $_REQUEST['id'];

  $query = "DELETE FROM team WHERE id = '$id'";

  mysqli_query($date, $query);

  header('Location: admin.php?content=ruleTeams');
?>
