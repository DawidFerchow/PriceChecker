<?php

require_once('lib/Database.php');
require_once('models/Rival.php');
require_once('models/Product.php');

?>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Lista produktów</h1>
  </div>
</section>

<section class="section">
  <div class="container">

    <table id="listTable" class="table is-hoverable">
      <thead>
        <tr>
          <th>ID</th>
          <th>SKU</th>
          <th>Nazwa</th>
          <th>Rekomendowana</th>
          <th>Najniższa</th>
          <th>Status</th>
          <th>Stan</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>SKU</th>
          <th>Nazwa</th>
          <th>Rekomendowana</th>
          <th>Najniższa</th>
          <th>Status</th>
          <th>Stan</th>
        </tr>
      </tfoot>
      <tbody>

      <?php

      $product = new Product();
      $allProducts = $product->getProductsWithLowestPrice();

      foreach ($allProducts as $product) {
      $acceptedPrice = $product->rec_price - $product->rec_price * 0.05;
      echo '
        <tr>
          <th scope="row" class="is-family-monospace">'. $product->id .'</th>
          <td class="is-family-monospace">'. $product->sku .'</td>

          <td><a href="index.php?page=listProductURLs&id='. $product->id .'">'. $product->name .'</a></td>
          <td class="has-text-right has-money is-family-monospace">' . number_format($product->rec_price, 2, '.', '') . '</td>
          <td class="has-text-right has-money is-family-monospace">' . number_format($product->min_cur_price, 2, '.', '') . '</td>
          <td class="has-text-right">
          ' . (($product->rec_price == $product->min_cur_price ? 'true' : false) ? '<p class="subtitle is-5"><span class="tag is-success">Rekomendowanie</span></p>' : '') . '
          ' . (($product->rec_price < $product->min_cur_price ? 'true' : false) ? '<p class="subtitle is-5"><span class="tag is-warning">Mamy za tanio</span></p>' : '') . '
          ' . (($product->rec_price > $product->min_cur_price && $acceptedPrice > $product->min_cur_price ? 'true' : false) ? '<p class="subtitle is-5"><span class="tag is-danger">Mamy za drogo</span></p>' : '') . '
          ' . (($product->rec_price > $product->min_cur_price && $acceptedPrice < $product->min_cur_price ? 'true' : false) ? '<p class="subtitle is-5"><span class="tag is-warning">Ma taniej do 5%</span></p>' : '') . '
          </td>
          <td class="has-text-right is-family-monospace">' . $product->update_date . '</td>
        </tr>
        ';

      }
      ?>
      </tbody>
    </table>
  </div>
</section>
