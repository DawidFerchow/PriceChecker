<?php
session_start();

require_once('../../lib/Database.php');
require_once('../../models/User.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'login') {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $user = new User();

  if($user->checkLoginExist($email) === 1) {
    if($user->checkPasswordMatch($email, $password) === true) {
      $user->login($email);
    }
    else {
      echo 'Takie dane logowania nie istnieją';
    }
  }
  else {
    echo 'Takie dane logowania nie istnieją';
  }

}