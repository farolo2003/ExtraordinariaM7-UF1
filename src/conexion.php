<?php

require_once 'src/db.php';

try{
    $db = connectSqlite();
    
} catch (PDOException $e){
    throw new Exception("An unexpected error has occurred");
}

