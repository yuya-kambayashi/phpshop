<?php
  session_start();
  session_regenerate_id(true);

  require_once('../common/common.php');

  $post = sanitize($_POST);

  $max = $_POST['max'];
  for($i = 0; $i < $max; $i++){

    $kazu[] = $post['kazu'.$i];
  }

  $_SESSION['kazu'] = $kazu;

  header('Location:shop_cartlook.php');
  exit();
?>