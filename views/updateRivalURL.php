<?php

require_once('lib/Database.php');
require_once('models/Product.php');

$url_id = $_GET['id'];
$product = new Product();
$urlInfo = $product->getURL($url_id);

 ?>

<div id="notification"></div>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Edytuj link do śledzenia.</h1>
  </div>
</section>

<section>
  <div class="container is-max-desktop">
    <form action="api/products/update.php" method="post" id="updateRivalURL">

      <div class="field">
      <label class="label">ID wewnętrzne</label>
        <p class="control has-icons-left">
          <input class="input" type="text" placeholder="<?php echo $url_id ?>" name="id" id="id" value="<?php echo $url_id ?>" required disabled>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </p>
      </div>

      <div class="field is-fullwidth">
        <label class="label">Przyjazna nazwa produktu</label>
          <select id='productSelect' name="product" class="is-fullwidth has-icons-left">
            <option value="<?php echo $urlInfo->product ?>"><?php echo $urlInfo->product_name ?></option>
            <option>With options</option>
          </select>
      </div>

      <div class="field is-fullwidth has-icons-left">
        <label class="label">Konkurent</label>
          <select id='rivalSelect' name="rival" class="is-fullwidth has-icons-left">
            <option value="<?php echo $urlInfo->rival ?>"><?php echo $urlInfo->rival_name ?></option>
            <option>With options</option>
          </select>
      </div>

      <div class="field">
        <label class="label">Link do oferty konkurenta</label>
        <p class="control">
          <input class="input" type="url" name="url" id="url" pattern="https?://.+" placeholder="<?php echo $urlInfo->url ?>" value="<?php echo $urlInfo->url ?>" required />
        </p>
        <p class="help">Wprowadź link do ofery konkurenta</p>
      </div>

      <div class="field is-narrow">
        <label class="label">Cena z oferty konkurenta</label>
        <p class="control">
          <input class="input" type="number" name="cur_price" id="cur_price" min="0" max="99999" step="0.01" placeholder="<?php echo $urlInfo->cur_price ?>" value="<?php echo $urlInfo->cur_price ?>" id="cur_price" required>
        </p>
        <p class="help">Wprowadź cenę konkurenta z linku, który dodajesz</p>
      </div>

      <div class="buttons is-pulled-right">
        <a class="button is-secondary" href="index.php?page=rivalURLs&id=<?php echo $urlInfo->product ?>">
          Wróć
        </a>
        <button id="submit" class="button is-primary" type="submit" name="submit">
          Wyślij
        </button>
      </div>

    </form>
  </div>
</section>