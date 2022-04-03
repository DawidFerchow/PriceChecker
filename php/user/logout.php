<?php
require_once('lib/Database.php');
require_once('models/User.php');

$user = new User();
$user->logout();