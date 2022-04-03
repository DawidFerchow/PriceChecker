<?php

require_once('lib/Database.php');
require_once('models/Product.php');

$product_id = $_GET['id'];

$product = new Product();
$productInfo = $product->getProduct($product_id);
$rivalURLs = $product->getProductRivalsURLs($product_id);
$rivalMinPrice = $product->getProductRivalsLowestPrice($product_id);

if ($productInfo) {
?>

<div class="modal" id="removeProductModal">
  <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title has-text-center">Usunąć konkurenta?</p>
  <!--      <button class="delete" aria-label="close" data-bulma-modal="close"></button>-->
      </header>
      <section class="modal-card-body">
        <p>Czy na pewno chcesz usunąć tego konkurenta? Nie da się cofnąć tej operacji.</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-danger" id="removeProduct" data-bulma-modal="close">Tak, chce usunąć</button>
        <button class="button" data-bulma-modal="close">Nie, nie chce usuwać</button>
      </footer>
    </div>
</div>
<div class="modal" id="removeURLmodal">
  <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title has-text-center">Usunąć URL?</p>
  <!--      <button class="delete" aria-label="close" data-bulma-modal="close"></button>-->
      </header>
      <section class="modal-card-body">
        <p>Czy na pewno chcesz usunąć tego konkurenta? Nie da się cofnąć tej operacji.</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-danger" id="removeURL" data-urlid="" data-bulma-modal="close">Tak, chce usunąć</button>
        <button class="button" data-bulma-modal="close">Nie, nie chce usuwać</button>
      </footer>
    </div>
</div>

<div id="notification"></div>

<section class="section">
  <div class="container">
    <div class="content">
      <?php
        $acceptedPrice = $productInfo->rec_price - $productInfo->rec_price * 0.05;
        $productURL = $productInfo->url;
        echo '
          <h1 class="title is-3">'. $productInfo->name .'</h2>
          <h2 class="subtitle is-4">'. $productInfo->sku .'</h2>
          <p class="subtitle is-5">Nasza cena: '. $productInfo->rec_price .'zł</p>
          ' . (($productInfo->rec_price == $rivalMinPrice ? 'true' : false) ? '<p class="subtitle is-5"><span class="tag is-success">Mam na równi z najtańszym</span></p>' : '') . '
          ' . (($productInfo->rec_price < $rivalMinPrice ? 'true' : false) ? '<p class="subtitle is-5"><span class="tag is-warning">Można podnieść</span></p>' : '') . '
          ' . (($productInfo->rec_price > $rivalMinPrice && $acceptedPrice > $rivalMinPrice ? 'true' : false) ? '<p class="subtitle is-5"><span class="tag is-danger">Ktoś ma taniej</span></p>' : '') . '
          ' . (($productInfo->rec_price > $rivalMinPrice && $acceptedPrice < $rivalMinPrice ? 'true' : false) ? '<p class="subtitle is-5"><span class="tag is-warning">Ktoś ma taniej do 5%</span></p>' : '') . '
          <div><a href="'. $productURL .'" target="_blank">Link do produktu</a></div>
          <div><a href="index.php?page=updateProduct&id='. $product_id .'">Edytuj produkt</a></div>
          <div><a id="removeProductModalButton" class="has-text-danger">Usuń produkt</a></div>
        ';
      ?>
   </div>
  </div>
</section>

<section class="section">
  <div class="container">

    <table id="table" class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Konkurent</th>
          <th class="has-text-centered">Link konkurenta</th>
          <th class="has-text-right">Cena konkurenta</th>
          <th class="has-text-right">Ostatnia aktualizacja</th>
          <th class="has-text-centered">Status</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Konkurent</th>
          <th class="has-text-centered">Link konkurenta</th>
          <th class="has-text-right">Cena konkurenta</th>
          <th class="has-text-right">Ostatnia aktualizacja</th>
          <th class="has-text-centered">Status</th>
          <th></th>
          <th></th>
        </tr>
      </tfoot>
      <tbody>
        <?php
          foreach ($rivalURLs as $rivalURL) {
            echo '
              <tr>
                <th scope="row">'. $rivalURL->id .'</th>
                <td><a href=index.php?page=listRivalURLs&id='. $rivalURL->rival .'>'. $rivalURL->name .'</a></td>
                <td class="has-text-centered"><a href="'. $rivalURL->url .'" target="_blank"><ion-icon name="open-outline" size="small"></ion-icon></a></td>
                <td class="has-text-right has-money is-family-monospace" id="'. $rivalURL->id .'">'. number_format($rivalURL->cur_price, 2, '.', '') .'</td>
                <td class="has-text-right is-family-monospace">'. $rivalURL->update_date .'</td>
                <td class="has-text-centered">' . (($productInfo->rec_price > $rivalURL->cur_price ? 'true' : false) ? '<span class="tag is-danger">Ten zaniża!</span>' : '<span class="tag is-success">Trzyma cenę!</span>') . '</td>
                <td><a href="index.php?page=updateRivalURL&id='. $rivalURL->id .'"><ion-icon name="create-outline" size="small" data-tooltip="Tooltip content"></ion-icon></a></td>
                <td><a class="removeURL" href="index.php?page=updateRivalURL&id='. $rivalURL->id .'" data-urlid="'. $rivalURL->id .'"><ion-icon name="trash-outline" size="small" data-tooltip="Tooltip content"></ion-icon></a></td>
              </tr>
              ';
          }
        ?>
      </tbody>
    </table>
  </div>
</section>

<?php
}
else {
?>
<section class="section">
  <div class="container is-max-desktop">
    <div class="notification is-warning">
      Najwyraźniej nie ma produktu o takim ID w bazie danych. Być może został usunięty.
    </div>
  </div>
</section>
<?php
}
?>