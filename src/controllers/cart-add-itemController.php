<?php 
require 'src/db.php';
require 'src/render.php';

function cart_add($cart,$product){
    $cart[]=$product;
    return $cart;
}
    //process form
    $array_quantity_pre=$_POST;
   
    foreach($array_quantity_pre as $item=>$qty){
    $product_id=explode('-',$item)[1];
    try{ 
        $db=connectSqlite();
        $stmt=$db->prepare("SELECT * FROM products WHERE product_id=:product_id");
        $stmt->execute([':product_id'=>$product_id]);
        $prods=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $name=$prods[0]['name'];
    }catch(Exception $e){
        error("No hi dades");
    }

    $cart[]=['product_id'=>$product_id,
        'product_name'=>$name,
        'quantity'=>$qty];
   }
   $_SESSION['cart']=$cart;
   echo render('cart',['cart'=>$_SESSION['cart']]);