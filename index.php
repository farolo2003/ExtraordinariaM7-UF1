<?php
  session_start();
  
  require 'src/routes.php';
  require 'src/router.php';
  
  //enrutament
  try{
      $controller= getControlAction($controllers);
      
      if($controller == null){
        $controller = "home";
    }
  }catch(Exception $e){
      //error($e->getMessage());
      echo $e->getMessage();
  }
  
  //redirigir a ruta capturada
  require 'src/controllers/'.$controller.'Controller.php';