      <body>
        <section class="section pb-0">
          <div class="container">
            <div class="notification is-warning">
              <h2>Jesteś na stronie demonstracyjnej Price checkera. Dla Twojej wygody utworzyłem sandboxa z instancją prestashop, w którym możesz dodać produkt lub zmienić cenę. Utworzony produkt możesz dodać do PriceCheckera. Możesz też zmienić cenę na sandboxie a następnie włączyć aktualizację, żeby sprawdzić czy PriceChecker pobierze zmienioną cenę. Link do sandboxa: <a href="https://prestasandbox.ferchow.pl/wrezfdffxk1is602/" target="_blank">Sandbox</a>. Dane do logowania to: login: demo@ferchow.pl; hasło: demodemo</h2>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="container">
            <nav class="navbar is-light is-spaced" role="navigation" aria-label="main navigation">
              <div class="navbar-brand">
                <a class="navbar-item">
                  <img src="https://via.placeholder.com/150x60?text=LOGO">
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                </a>
              </div>

              <div id="navbarBasicExample" class="navbar-menu">

                <div class="navbar-start">
                	<a class="navbar-item" href="index.php">Home</a>
                	<div class="navbar-item has-dropdown is-hoverable">
                		<a class="navbar-link">Lista</a>
                		<div class="navbar-dropdown">
                			<a class="navbar-item" href="index.php?page=listProducts">Lista produktów</a>
                			<a class="navbar-item" href="index.php?page=listRivals">Lista konkurentów</a>
                		</div>
                	</div>
                	<div class="navbar-item has-dropdown is-hoverable">
                		<a class="navbar-link">Dodaj</a>
                		<div class="navbar-dropdown">
                			<a class="navbar-item" href="index.php?page=addProducts">Dodaj produkt</a>
                			<a class="navbar-item" href="index.php?page=addRival">Dodaj konkurenta</a>
                			<a class="navbar-item" href="index.php?page=addRivalURL">Dodaj linki</a>
                		</div>
                	</div>
                  <a class="navbar-item" href="index.php?page=scrape">Aktualizuj</a>
                </div>

                <div class="navbar-end">
                  <div class="navbar-item">
                    <div class="buttons">
                      <a class="button is-primary" href="index.php?page=logout">
                        <strong>Wyloguj</strong>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </section>
