<?php
session_start();

include 'inc/head.php';

if(isset($_GET['page'])) {
  $page = $_GET['page'];
}
else {
  $page="";
}

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {

  include 'inc/header.php';

  switch($page){
    case 'addProducts';
    include ("views/addProducts.php");
    break;
    case 'addRival';
    include ("views/addRival.php");
    break;
    case 'addRivalURL';
    include ("views/addRivalURL.php");
    break;
    case 'listProductURLs';
    include ("views/listProductURLs.php");
    break;
    case 'listRivals';
    include ("views/listRivals.php");
    break;
    case 'updateProduct';
    include ("views/updateProduct.php");
    break;
    case 'updateRivalURL';
    include ("views/updateRivalURL.php");
    break;
    case 'updateRival';
    include ("views/updateRival.php");
    break;
    case 'listRivalURLs';
    include ("views/listRivalURLs.php");
    break;
    case 'scrape';
    include ("views/scrape.php");
    break;
    case 'listProducts';
    include ("views/listProducts.php");
    break;
    case 'logout';
    include ("php/user/logout.php");
    break;

    default:
    include ("views/index.php");
    break;
  }

}
else {
  include ("views/login.php");
}

include 'inc/footer.php';
