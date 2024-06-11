<?php

require_once 'src/render.php';
require_once 'src/db.php';
require_once 'src/conexion.php';

try {
    if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['stock_quantity'])) {
        
        $fields = [
            'name' => $_POST['name'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'stock_quantity' => $_POST['stock_quantity'],
        ];
        
        if (addProduct($db, $fields)) {
            header('Location: store'); 
            exit();  
        } else {
            throw new Exception("Error al añadir el producto.");
        }
    } else {
        throw new Exception("Por favor, completa todos los campos.");
    }
} catch (Exception $e) {
    echo "Se ha producido un error: " . $e->getMessage();
}

