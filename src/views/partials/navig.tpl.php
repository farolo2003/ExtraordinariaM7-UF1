<div class="navig">
  <ul>
  <?php if(isset($_SESSION['display'])):?>
    <a href="home"><?=$_SESSION['display']?></a>
    <?php else:?>
     <a href="home">Home</a>
     <?php endif;?>
    <?php if(!isset($_SESSION['user'])):?>
      <a href="login">Sign in</a> 
      <a href="register">Register</a> 
      <?php else:?>
      <a href="logout">logout</a> 
      <a href="cart">Cart</a>
    <?php endif;?>
  </ul>
  
   
  </div>