<?php include 'partials/header.tpl.php';?>
<main>
  <h1>Home</h1>
  <?php include 'partials/navig.tpl.php';?>
<main>
  <div class="products">
    <?php if($products): ?>
      <?php foreach($products as $product): ?>
        <div class="product">
          <h4><?= $product['name'];?></h4>
        </div>
        
      <?php endforeach;?>
    <?php endif;?>
  </div>

</main>
<?php include 'partials/footer.tpl.php';?>