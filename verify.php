<?php
session_start();
function is_root($string){
  if (((stristr($string, 'DELETE') or stristr($string, 'INSERT') or stristr($string, 'UPDATE') or stristr($string, 'DROP') or stristr($string, 'users')) and ($_SESSION['rights'] == 'user')) or (stristr($string, 'DROP')) and ($_SESSION['rights'] == 'admin')) {
    return FALSE;
  } else
    return TRUE;
}

function is_admin(){
  if ($_SESSION['rights'] == 'admin') {
    return TRUE;
  } else {
    return FALSE;
  }
}
?>
