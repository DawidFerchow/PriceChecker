<?php
require_once('../../lib/Database.php');
require_once('../../models/Product.php');
require_once('../../models/Rival.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'removeProduct') {

  $id = $_POST['id'];

  $products = new Products();
  $product = $products->removeProduct($id);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'removeRival') {

  $id = $_POST['id'];

  $products = new Rival();
  $product = $products->removeRival($id);

}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form'] === 'removeURL') {

  $id = $_POST['id'];

  $urls = new Rival();
  $url = $urls->removeURL($id);

}