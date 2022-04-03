<div id="notification"></div>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Dodaj produkt</h1>
  </div>
</section>

<section>
  <div class="container is-max-desktop">
    <form action="api/products/add.php" method="post" id="addProduct">

        <div class="field">
          <label class="label">Symbol produktu</label>
          <p class="control has-icons-left">
            <input class="input" type="text" placeholder="SKU" name="sku" id="sku" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </p>
          <p id="help" class="help">Wprowadź symbol produktu - nasz lub z hurtowni / od instrybutora</p>
        </div>

        <div class="field">
          <label class="label">Nazwa produktu</label>
          <p class="control has-icons-left">
            <input class="input" type="text" placeholder="Nazwa produktu" name="name" id="name" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </p>
          <p class="help">Wprowadź przyjazną nazwę produktu np. Harvia Vega BC90</p>
        </div>

        <div class="field">
          <label class="label">Cena detaliczna</label>
          <p class="control has-icons-left">
            <input class="input" type="number" name="rec_price" min="0" max="99999" step="0.01" placeholder="Cena rekomendowana" id="rec_price" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </p>
          <p class="help">Wprowadź cenę detaliczną lub taką, którą mamy na aukcji</p>
        </div>

        <div class="control">
          <button id="submit" class="button is-primary is-pulled-right" type="submit" name="submit">
            Wyślij
          </button>
        </div>

    </form>
  </div>
</section>