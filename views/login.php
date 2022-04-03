<div id="notification"></div>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Zaloguj się</h1>
  </div>
</section>

<section>
  <div class="container is-max-desktop">
    <div class="columns">
      <div class="column is-6 is-offset-3">

        <form method="post" id="loginForm">
          <div class="field">
            <label class="label">Login</label>
            <p class="control">
              <input class="input" type="text" name="email" id="email" required />
            </p>
          </div>

          <div class="field is-narrow">
            <label class="label">Hasło</label>
            <p class="control">
              <input class="input" type="password" name="password" id="password" required>
            </p>
          </div>

          <div class="control">
            <button id="submit" class="button is-primary is-pulled-right mt-4" type="submit" name="submit">
              Zaloguj
            </button>
          </div>

        </form>

      </div>
    </div>
  </div>
</section>