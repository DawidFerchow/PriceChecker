<?php
require_once('../../lib/Database.php');
require_once('../../models/Product.php');
require_once('../../models/Rival.php');
require_once('../../models/Scrape.php');

// maybe in future add, for example, wholesaler
// or simple product
switch ($_POST['from']) {
  case 'rivals':
    $ids = $_POST['ids'];
    $url = new Rival();
    foreach ($ids as $id) {
      $urls[] = $url->getRivalURLs($id);
    }
    break;
  case 'products':
    $ids = $_POST['ids'];
    $url = new Product();
    foreach ($ids as $id) {
      $urls[] = $url->getSimpleURL($id);
    }
    break;
}

// now have array of array of array..
// want simples to format [ID] => URL and convert to json
// so..
// prepareURLs function echo'es proper, json formatted urls

$scrape = new Scrape();
$scrape->prepareURLs($urls);