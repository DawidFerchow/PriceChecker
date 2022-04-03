<?php
require_once('../../lib/Database.php');
require_once('../../models/Product.php');
require_once('../../models/Rival.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'updateRivalURL') {

  $id = $_POST['id'];
  $product = $_POST['product'];
  $rival = $_POST['rival'];
  $cur_price = $_POST['cur_price'];
  $url = $_POST['url'];

  $products = new Product();
  $product = $products->updateRivalURL($id, $product, $rival, $cur_price, $url);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'updateProduct') {

  $id = $_POST['id'];
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $rec_price = $_POST['rec_price'];
  $url = $_POST['url'];

  $products = new Product();
  $product = $products->updateProduct($id, $sku, $name, $rec_price, $url);

}