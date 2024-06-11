<?php 
  require 'src/render.php';
  require 'src/db.php';
  //data extract
  $db=connectSqlite();

  $stmt = $db->prepare(
    "SELECT * from  products"
  );
  $res=$stmt->execute();
  $rows=$stmt->fetchAll();
  //render data 
  echo render('home',['products'=>$rows]);