<?php
require_once('../../lib/Database.php');
require_once('../../lib/simple_html_dom/simple_html_dom.php');
require_once('../../models/Product.php');
require_once('../../models/Scrape.php');
require_once('../../models/ExtractingPrice.php');
require_once('../../config.php');

ignore_user_abort(true);

$productsID = $_POST['ids'];

if ($_POST['data']) {
  $sites = json_decode($_POST['data'], true);
  scrape($log_file, $dateFormat, $proxyList, $proxyCredentials, $sites, $classes);
}

// foreach all recipes for geting price
// recipies are avaliable in ExtractingPrice.php
function getinPrice($classes, $getWebsite)
{
  foreach ($classes as $class) {
    return $class->extractPrice($getWebsite);
    if ($class->extractPrice($getWebsite) != null){
      break;
    }
  }
}

function scrape($log_file, $dateFormat, $proxyList, $proxyCredentials, $sites, $classes){

  // variable for logs
  $i = 1;
  $sitesCount = count($sites);

  foreach ($sites as $id => $site) {

    // select rand proxy from list
    $selectProxy = array_rand($proxyList);
    $selectedProxy = $proxyList[$selectProxy];

    // write simple log
    error_log(PHP_EOL.'----------', 3, $log_file);
    error_log(PHP_EOL.'['.date("F j, Y, g:i:s".substr((string)microtime(), 1, 8)).'] Site: '.$i.' of: '.$sitesCount.'', 3, $log_file);
    error_log(PHP_EOL.'['.date("F j, Y, g:i:s".substr((string)microtime(), 1, 8)).'] Do site: '.$site.'', 3, $log_file);
    error_log(PHP_EOL.'['.date("F j, Y, g:i:s".substr((string)microtime(), 1, 8)).'] Choose proxy: '.$selectedProxy.'', 3, $log_file);

    // cURL website
    $scrape = new Scrape();
    $getWebsite = $scrape->getWebsite($site, $selectedProxy, $proxyCredentials);

    // load cURL'ed website to simple_html_dom
    $html = new simple_html_dom();
    $html->load($getWebsite);

    // It's big. Foreach all extends ExtractingPrice class for search
    // proper price form website
    // look at this: ExtractingPrice.php
    $extractedPrice = getinPrice($classes, $html);

    // write simple log
    error_log(PHP_EOL.'['.date("F j, Y, g:i:s".substr((string)microtime(), 1, 8)).'] Get price: '.$extractedPrice.'', 3, $log_file);

    // random sleep time
    $sleepTime = rand(5,10);

    // write simple log
    error_log(PHP_EOL.'['.date("F j, Y, g:i:s".substr((string)microtime(), 1, 8)).'] Wait '.$sleepTime.' second', 3, $log_file);

    // scrape good practices
    sleep($sleepTime);

    $product = new Product();

    // save get price to db
    // if not get price, save scrape try date
    if (!empty($extractedPrice)) {
      $newprice = $product->updateRivalPrice($id, $extractedPrice);
    }
    else {
      $update_date = $product->addUpdateDate($id);
    }

    flush();
    ob_flush();

    if(connection_aborted()){
      error_log(PHP_EOL.'['.date("F j, Y, g:i:s".substr((string)microtime(), 1, 8)).'] User abort script, exit', 3, $log_file);
      exit;
    }

    $i++;

    }

}

