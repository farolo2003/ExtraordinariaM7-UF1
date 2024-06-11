<?php include 'partials/header.tpl.php';?>
<main>
  <h1>Cart</h1>
  <?php include 'partials/navig.tpl.php';?>
<main>
  <div class="cart">
    <?php if(isset($cart)): ?>
      <?php foreach($cart as $product): ?>
        <div class="product">
          <h4>Product: <?= $product['product_name'];?></h4>
          <h4>Id: <?= $product['product_id'];?></h4>
          <h4>Quantity:<?= $product['quantity'];?></h4>
        </div>     
      <?php endforeach;?>
      <?php  else:?>
        <h4>No products in the cart!</h4>
    <?php endif;?>
  </div>
<div class="opcions">
  <ul>
    
    <a href="" class="button">Order</a>
    <a href="javascript:history.back()" class="button">Go back</a>
    
    

  </ul>
</div>
</main>
<?php include 'partials/footer.tpl.php';?>