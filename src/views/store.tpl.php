<?php include 'partials/header.tpl.php'; ?>
<main>
  <h1>Store</h1><br><br>
  <h4>Bienvenido <?php echo $_SESSION['user']['first_name']; ?></h4><br><br>
  <?php include 'partials/navig.tpl.php'; ?>
  <main>
    <div class="container">

      <br><br>

      <div class="products">
        <?php if ($products): ?>
          <?php foreach ($products as $product): ?>
            <div class="product">

              <h4><?= $product['name']; ?></h4>
              <h5>Stock: <?= $product['stock_quantity']; ?></h5>
              <form action="cart-add-item" method="POST">
                <input type="number" name="quantity-<?= $product['product_id']; ?>" placeholder="Quantity"
                  max=" <?= $product['stock_quantity']; ?>">
                <input type="submit" value="Add to cart">
              </form>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div>
            <p>No hay productos disponibles en este momento.</p>
          </div>
        <?php endif; ?>
      </div>
      
    </div>
    <h4><a href="addProduct">Añadir producto</a></h4>
  </main>
  <?php include 'partials/footer.tpl.php'; ?>
