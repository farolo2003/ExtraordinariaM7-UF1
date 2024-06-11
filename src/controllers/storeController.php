<?php 
   require 'src/render.php';
   require 'src/db.php';
   $db=connectSqlite();

  $stmt = $db->prepare(
    "SELECT * from  products"
  );
  $res=$stmt->execute();
  $rows=$stmt->fetchAll();

  echo render('store',['products'=>$rows]);