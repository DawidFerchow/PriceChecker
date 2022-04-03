<div id="notification"></div>

  <section class="section">
    <div class="container has-text-centered">
      <h1 class="title">Dodaj link do śledzenia.</h1>
    </div>
  </section>

    <section>
      <div class="container is-max-desktop">
        <form action="api/products/add.php" method="post" id="addRivalURL">
          <label class="label">Nazwa produktu</label>
            <div class="field is-fullwidth">
                <select id='productSelect' name="product" class="is-fullwidth has-icons-left" required>
                  <option value="">Produkt</option>
                  <option>With options</option>
                </select>
            </div>
            <label class="label">Nazwa konkurenta</label>
            <div class="field is-fullwidth has-icons-left">
                <select id='rivalSelect' name="rival" class="is-fullwidth has-icons-left" required>
                  <option value="">Konkurent</option>
                  <option>With options</option>
                </select>
            </div>
            <div class="field">
              <label class="label">Link</label>
              <p class="control">
                <input class="input" type="url" name="url" id="url" pattern="https?://.+" placeholder="Link" required />
              </p>
              <p class="help">Wprowadź link do ofery konkurenta</p>
            </div>
            <div class="field is-narrow">
              <label class="label">Cena</label>
              <p class="control">
                <!--<input class="input" type="text" placeholder="Cena rekomendowana">-->
                <input class="input" type="number" name="cur_price" id="cur_price" min="0" max="99999" step="0.01" placeholder="Cena konkurenta" id="cur_price" required>
              </p>
              <p class="help">Wprowadź cenę konkurenta z linku, który dodajesz</p>
            </div>

        <div class="control">
          <button id="submit" class="button is-primary is-pulled-right" type="submit" name="submit">
            Wyślij
          </button>
        </div>

      </form>
      </div>
    </section>