<?php

require_once('lib/Database.php');
require_once('models/Rival.php');

$rival_id = $_GET['id'];

$rival = new Rival();
$rivalInfo = $rival->getRivalName($rival_id);
$rivalURLs = $rival->getAllRivalURL($rival_id);

?>

<div class="modal" id="myModal">
  <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title has-text-center">Usunąć konkurenta?</p>
      </header>
      <section class="modal-card-body">
        <p>Czy na pewno chcesz usunąć tego konkurenta? Zostaną usunięte również linki przypisane do tego konkurenta. Nie da się cofnąć tej operacji.</p>
      </section>
      <footer class="modal-card-foot">
        <button class="button is-danger" id="removeRival">Tak, chce usunąć</button>
        <button class="button" data-bulma-modal="close">Nie, nie chce usuwać</button>
      </footer>
    </div>
</div>

<div id="notification"></div>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Lista linków konkurenta</h1>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="content">
      <h1 class="title is-3"><?php echo $rivalInfo->name ?></h1>
    <?php
      echo '
        <div><a href="index.php?page=updateRival&id='. $rival_id .'">Edytuj konkurenta</a></div>
        <div id="openModal"><a class="has-text-danger">Usuń konkurenta</a></div>
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
          <th>Produkt</th>
          <th class="has-text-right">Ostatnia aktualizacja</th>
          <th class="has-text-right">Cena</th>
          <th class="has-text-centered">Link</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Produkt</th>
          <th class="has-text-right">Ostatnia aktualizacja</th>
          <th class="has-text-right">Cena</th>
          <th class="has-text-centered">Link</th>
        </tr>
      </tfoot>
      <tbody>
      <?php
        foreach ($rivalURLs as $rivalURL) {

          echo '
            <tr>
              <th scope="row" class="is-family-monospace">'.$rivalURL->id.'</td>
              <td><a href="index.php?page=listProductURLs&id='. $rivalURL->product .'">'. $rivalURL->product_name .'</a></td>
              <td class="has-text-right is-family-monospace">' . ((($rivalURL->update_date == null) ? 'true' : false) ? '-' : $rivalURL->update_date) . '</td>
              <td class="has-text-right has-money is-family-monospace">'. number_format($rivalURL->cur_price, 2, '.', '') .'</td>
              <td class="has-text-centered"><a href="'.$rivalURL->url.'" target="_blank"><ion-icon name="open-outline"></ion-icon></a></td>
            </tr>
          ';
          //
        }
        ?>
      </tbody>
    </table>

  </div>
</section>