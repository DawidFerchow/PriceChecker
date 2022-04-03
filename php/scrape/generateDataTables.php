<?php

require_once('../../lib/Database.php');
require_once('../../models/Product.php');
require_once('../../models/Rival.php');

switch ($_POST['from']) {
    case 'rivals':
        $rivals = new Rival();
        $allRivals = $rivals->getAllRivals();
        echo json_encode($allRivals);
        break;
    case 'products':
        $products = new Product();
        $allProducts = $products->getProductsWithLowestPrice();
        echo json_encode($allProducts);
        break;
}