<?php
require_once('lib/Database.php');
require_once('models/Rival.php');

?>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Lista Konkurentów</h1>
  </div>
</section>

<section class="section">
  <div class="container">

    <table id="table" class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nazwa</th>
          <th class="has-text-right">Liczba linków</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Nazwa</th>
          <th class="has-text-right">Liczba linków</th>
        </tr>
      </tfoot>
      <tbody>
        <?php

          $rivals = new Rival();
          $allRivals = $rivals->getAllRivals();

          foreach ($allRivals as $rival) {
            $numberOfLinks = $rivals->getNumberOfRivalURLs($rival->id);

            echo '
              <tr>
                <th class="is-family-monospace">'.$rival->id.'</th>
                <td><a href=index.php?page=listRivalURLs&id='. $rival->id .'>'.$rival->name.'</a></td>
                <td class="has-text-right is-family-monospace">'.$numberOfLinks.'</td>
              </tr>
            ';
          }
        ?>
      </tbody>
    </table>

  </div>
</section>