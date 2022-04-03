<?php
require_once('../../lib/Database.php');
require_once('../../models/Product.php');
require_once('../../models/Rival.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'addProduct') {

  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $rec_price = $_POST['rec_price'];

  $products = new Product();
  $product = $products->addProduct($sku, $name, $rec_price);

}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'addRival') {

  $name = $_POST['name'];

  $rivals = new Rival();
  $rival = $rivals->addRival($name);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'addRivalURL') {

  $product = $_POST['product'];
  $rival = $_POST['rival'];
  $cur_price = $_POST['cur_price'];
  $url = $_POST['url'];

  if (isset($_POST['rival_product_option'])) {
  $rival_product_option = $_POST['rival_product_option'];
  }

  else {
    $rival_product_option = null;
  }

  if (isset($_POST['rival_product_id'])) {
  $rival_product_id = $_POST['rival_product_id'];
  }

  else {
    $rival_product_id = null;
  }


  $products = new Rival();
  $product = $products->addRivalURL($product, $rival, $cur_price, $url, $rival_product_option, $rival_product_id);

}