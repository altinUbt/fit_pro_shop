<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include_once 'AllProductControll.php';

$controller = new ProductControll();
$controller->loadPurchase();
$controller->handlePurchase();

$products = $controller->getProducts();
$errorMsg = $controller->getErrorMessage();
$succedMsg = $controller->getSuccessMessage();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/AllProduct.css" />
  <title>All</title>
</head>

<body>
  <header>
    <h1>PRODUCTS</h1>
  </header>

  <div class="back-btn">
    <button class="back">BACK</button>
  </div>
  <div style="color: red;">
    <?= htmlspecialchars($errorMsg ? $errorMsg : "") ?>
  </div>
  <div style="color: green;">
    <?= htmlspecialchars($succedMsg ? $succedMsg : '') ?>
  </div>
  <section class="product-grid">
    <div class="product-container">
      <?php foreach ($products as $product): ?>
        <div class="product-card">
          <img src="<?= htmlspecialchars($product->getImage()) ?>" alt="">
          <h3>
            <?= htmlspecialchars($product->getName()) ?>
          </h3>
          <p class="description hidden">
            <?= htmlspecialchars($product->getDescription()) ?>
          </p>
          <p class="price hidden" data-price="<?= htmlspecialchars($product->getPrice()) ?> €">
            <?= htmlspecialchars($product->getPrice()) ?>
          </p>
          <form method="POST" action="">
            <input type="hidden" name="productId" value="<?= htmlspecialchars($product->getId()) ?>">
            <input type="button" name="butNowBtn" class="buy-now-btn" value="Buy">
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </section>


  <div id="ProductModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <header class="modal-header">
        <h2 id="modal-title"></h2>
      </header>
      <div class="modal-body">
        <img src="" alt="" id="modal-image" />
        <div class="text-container">
          <p id="modal-description"></p>
          <p id="modal-price" class="price"></p>
        </div>
      </div>
      <footter class="modal-footer">
        <button class="buy-button">BUY</button>
      </footter>
    </div>
  </div>
  <script src="AllProduct.js"></script>
</body>

</html>