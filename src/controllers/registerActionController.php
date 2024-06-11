<?php

require_once 'src/render.php';
require_once 'src/db.php';
require_once 'src/conexion.php';

try {

    if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password'])) {

        $fields = [
            'first_name' => $_POST['name'],
            'last_name' => $_POST['lastname'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ];

        if (reg($db, $fields)) {
            header('Location: login');
            exit();
        } else {
            throw new Exception("Error al añadir el registro.");
        }

    }else{
        throw new Exception("Por favor, completa todos los campos.");
    }
}catch(Exception $e){
    echo "Se ha producido un error: " . $e->getMessage();
}


