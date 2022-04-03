<section class="section pt-0">
  <div class="container">
    <div id="shortcutTip" class="notification is-info is-light" style="display:none;">
      <button class="delete"></button>
      Mam dla Ciebie świetnego tipa! Tabela obsługuje systemowe skróty klawiaturowe do zaznaczania wierszy. Dla przykładu, jeżeli korzystasz z MacOS możesz zaznaczyć kilka wierszy przytrzymując przycisk Command i klikając myszką w checkboxa. Możesz również zaznaczyć wszystkie, bądź kolejne. Najpierw klikając na pierwszy, interesujący Cię wiersz, następnie klikając Shift i klikając na ostatni interesujący Cię wiersz.
    </div>
  </div>
</section>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Aktualizacja cen</h1>
    <div class="select">
      <select onchange="rivalOrProduct(value);">
        <option value="reset">Kliknij i wybierz co chcesz zaktualizować</option>
        <option value="rivals">Konkurent</option>
        <option value="products">Produkt</option>
      </select>
    </div>

  </div>
</section>

<section class="section">
  <div class="container">

    <table id="products" class="table is-fullwidth is-hoverable" style="display: none; width: 100%">
      <thead>
        <tr>
          <th></th>
          <th>ID</th>
          <th>SKU</th>
          <th>Nazwa</th>
          <th>Rekomendowana</th>
          <th>Najniższa</th>
          <th>Ost. Akt.</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th></th>
          <th>ID</th>
          <th>SKU</th>
          <th>Nazwa</th>
          <th>Rekomendowana</th>
          <th>Najniższa</th>
          <th>Ost. Akt.</th>
        </tr>
      </tfoot>
    </table>

    <table id="rivals" class="table is-fullwidth is-hoverable" style="display: none; width: 100%">
      <thead>
        <tr>
          <th></th>
          <th>ID</th>
          <th>Nazwa</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th></th>
          <th>ID</th>
          <th>Nazwa</th>
        </tr>
      </tfoot>
    </table>

  </div>

  <div id="logView" class="section" style="display: none">
    <div class="buttons is-centered">
      <button id="stopAutoScrape" class="button">Anuluj aktualizację cen</button>
      <button id="clearLog" class="button">Wyczyść log</button>
    </div>
    <div class="container is-max-desktop">
      <pre>
        <div id="containerDiv" style="height:500px; overflow-y:auto"></div>
      </pre>
    </div>
  </div>

</section>