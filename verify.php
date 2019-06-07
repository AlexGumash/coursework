<?php
session_start();
function is_root($string){
  if (((stristr($string, 'DELETE') or stristr($string, 'INSERT') or stristr($string, 'UPDATE')  or stristr($string, 'users')) and ($_SESSION['rights'] == 'user')) and ($_SESSION['rights'] == 'admin') or ($_SESSION['rights'] == 'moder')) {
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

function is_drop($string) {
  if (stristr(strtoupper($string), 'DROP')) {
    return TRUE;
  } else {
    return FALSE;
  }
}

function can_modify($teamleader_id, $user_id, $role) {
  if (is_admin()) {
    return TRUE;
  } else if ($role != 'teamleader') {
    return FALSE;
  } else if ($teamleader_id != $user_id) {
    return FALSE;
  } else {
    return TRUE;
  }

}
?>
