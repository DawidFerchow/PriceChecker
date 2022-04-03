<div id="notification"></div>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Dodaj konkurenta</h1>
  </div>
</section>

<section>
  <div class="container is-max-desktop">
    <form method="post" id="addRival">

      <div class="field">
        <div class="field-body">
          <div class="field">
            <label class="label">Konkurent</label>
            <p class="control has-icons-left">
              <input class="input" type="text" placeholder="Konkurent" name="rival" id="rival" required>
              <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
              </span>
            </p>
            <p class="help" id="help">Wprowadź przyjazną nazwę</p>
          </div>
        </div>
      </div>

      <div class="control">
        <button id="submit" class="button is-primary is-pulled-right" type="submit" name="submit">
          Wyślij
        </button>
      </div>

    </form>
  </div>
</section>