<?php

require_once('lib/Database.php');
require_once('models/Product.php');

$product_id = $_GET['id'];

$product = new Product();
$productInfo = $product->getProduct($product_id);

?>

<div id="notification"></div>

<section class="section">
  <div class="container has-text-centered">
    <h1 class="title">Edytuj produkt</h1>
  </div>
</section>

<section>
  <div class="container is-max-desktop">
    <form action="api/products/update.php" method="post" id="updateProduct">
      <div class="field">
        <label class="label">ID wewnętrzne</label>
        <p class="control has-icons-left">
          <input class="input" type="text" placeholder="<?php echo htmlspecialchars($product_id) ?>" name="id" id="id" value="<?php echo htmlspecialchars($product_id) ?>" required disabled>
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
        </p>
      </div>
        <div class="field">
        <label class="label">SKU produktu</label>
          <p class="control has-icons-left">
            <input class="input" type="text" placeholder="<?php echo htmlspecialchars($productInfo->sku) ?>" name="sku" id="sku" value="<?php echo htmlspecialchars($productInfo->sku) ?>" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </p>
        </div>
        <div class="field">
        <label class="label">Przyjazna nazwa produktu</label>
          <p class="control has-icons-left">
            <input class="input" type="text" placeholder="<?php echo htmlspecialchars($productInfo->name) ?>" name="name" id="name" value="<?php echo htmlspecialchars($productInfo->name) ?>" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </p>
          <p class="help">Wprowadź przyjazną nazwę produktu np. Harvia Vega BC90</p>
        </div>
        <div class="field">
        <label class="label">Cena rekomendowana</label>
          <p class="control has-icons-left">
            <input class="input" type="number" name="rec_price" min="0" max="99999" step="0.01" placeholder="<?php echo htmlspecialchars($productInfo->rec_price) ?>" id="rec_price" value="<?php echo htmlspecialchars($productInfo->rec_price) ?>" required>
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </p>
          <p class="help">Wprowadź cenę detaliczną lub taką, którą mamy na aukcji</p>
        </div>

        <div class="buttons is-pulled-right">
            <a class="button is-secondary" href="index.php?page=rivalURLs&id=<?php echo $product_id ?>">
              Wróć
            </a>
          <button id="submit" class="button is-primary" type="submit" name="submit">
            Wyślij
          </button>
        </div>

    </form>
  </div>
</section>
