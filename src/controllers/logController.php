<?php
require_once 'src/db.php';
require_once 'src/render.php';


if(isset($_POST['email']) && isset($_POST['password'])){
    
    $fields = [
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];
    $db = connectSqlite();

    if (verifyField($db, 'email', $fields['email'], 'customers', 'email', '=')) {
        $passwordDb = getResponse($db,
            select($db, 'customers', ['password' => 'customers']) . 
            condition('email', 'customers', '='), 
            [':email' => $fields['email']]
        )[0]['password'];
        
        if (password_verify($fields['password'], $passwordDb)) {
            $user = getResponse($db,
                select($db, 'customers', ['customer_id' => 'customers', 'first_name' => 'customers', 'email' => 'customers']) . 
                condition('email', 'customers', '='), 
                [':email' => $fields['email']]
            )[0];

            $_SESSION['user'] = $user; 

            header('Location: store'); 
            exit(); 
        }
    }
}
