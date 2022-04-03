<?php

$log_file = "logfile.txt";

$dateFormat = "Ymd His'.substr((string)microtime(), 1, 8).' e";

/*
$proxyList = [
  "...",
  "..."
];
*/

/*
$proxyCredentials = '...:...';
*/

$classes = [
  new MicroData(),
  new WooCommerce(),
  new Shoper(),
];
