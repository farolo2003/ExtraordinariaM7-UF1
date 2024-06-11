<?php 

function getControlAction($controllers)
{
    $url=$_SERVER['REQUEST_URI'];
    $uri_parts = explode('/', $url);
    $uri_parts = array_filter($uri_parts);
    $controller = reset($uri_parts);
    
    if (empty($controller) || $controller == 'index.php') {
        return "home";
    }

    if(!in_array($controller,$controllers)){
        throw new Exception('Route not found');
    }else{
        return $controller;
    }
}
