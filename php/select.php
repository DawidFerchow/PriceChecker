<?php

require_once('../lib/Database.php');
require_once('../models/Select2.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $search = $_POST['searchTerm']; // Search text
  $from = $_POST['from']; // = products or rivals
  $where = $_POST['where'];
  $numberofrecords = 10;

  $select2 = new Select2();
  $suggestions = $select2->getSuggestions($search, $from, $where, $numberofrecords);

}
//prepare to send response to AJAX
$response = array();

foreach($suggestions as $suggestion){

  $response[] = array(
    "id" => $suggestion->id,
    "text" => $suggestion->name
  );

}
echo json_encode($response);
exit();