<?php

require_once('../lib/Database.php');
require_once('../models/Rival.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $value = $_POST['value'];
  $from = $_POST['from'];
  $where = $_POST['where'];

  $rival = new Rival();
  $isExist = $rival->checkIsExist($value, $from, $where);

  if($isExist->count == 1){
    echo "1";
  }
  else {
    echo "0";
  }

}
