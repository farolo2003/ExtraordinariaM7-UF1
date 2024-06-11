<?php 
function connectSqlite(){
    try{
        $db = new PDO('sqlite:db/app.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
        header('Location:public/error.tpl.php');
        exit();
    }
    return $db;
}

function connect(string $dsn, string $userdb, string $passdb): PDO {
    try{
        $db = new PDO($dsn, $userdb, $passdb);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
        header('Location:public/error.tpl.php');
        exit();
    }
    return $db;
}

function sanitizeString(string $input): string {
    $cleaned = trim($input);
    $cleaned = strip_tags($cleaned);
    $cleaned = htmlspecialchars($cleaned, ENT_QUOTES, 'UTF-8');
    return $cleaned;
}


function select($db, string $table, array $fields = [], array $alias = []): string {
    if (sizeof($fields) == 0) $fields = ['*'];      
    $queryFields = setQueryFields($fields);
    $query = "SELECT $queryFields FROM $table";
    return $query;
}

function condition(string $conditionFieldName, string $table, string $symbol): string {
    if($symbol == '=') return " WHERE $table.$conditionFieldName = :$conditionFieldName";
    else return " WHERE $table.$conditionFieldName != :$conditionFieldName";
}

function verifyField($db, string $fieldToVerify, $conditionValue, string $table, string $conditionFieldName, string $symbol): bool {
    $fieldToVerify = [$fieldToVerify => $table];
    $executeOptions = [':' . $conditionFieldName => $conditionValue];
    $query = select($db, $table, $fieldToVerify, []) . condition($conditionFieldName, $table, $symbol);
    $result = $db->prepare($query);
    $result->execute($executeOptions);
    $response = $result->fetchAll(PDO::FETCH_ASSOC);
    return sizeof($response) > 0;
}

function setQueryFields(array $arrayFields): string {
    $query = "";
    $i = 0;
    foreach ($arrayFields as $field => $table) {
        if ($i != sizeof($arrayFields) - 1) {
            $query .= "$table.$field, ";
        } else {
            $query .= "$table.$field";
        }
        $i++;
    }
    return $query;
}

function getResponse($db, string $query, array $options = []): ?array {
    $result = $db->prepare($query);
    $result->execute($options);
    $response = $result->fetchAll(PDO::FETCH_ASSOC);
    return sizeof($response) > 0 ? $response : null;
}

function login($db, string $fieldToVerify, $conditionValue, string $table, string $conditionFieldName, string $symbol, $email, $password): bool {
    if (verifyField($db, $fieldToVerify, $email, $table, $conditionFieldName, '=')) {
        $passwordDb = getResponse($db,
            select($db, 'customers', ['password' => 'customers']) . 
            condition('email', 'customers', '='), 
            [':email' => $email]
        )[0]['password'];
        return password_verify($password, $passwordDb);
    }
    return false;
}

function reg($db, array $registerData) {
    $query = "INSERT INTO customers (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
    $stmt = $db->prepare($query);
    return $stmt->execute([
        ':first_name' => sanitizeString($registerData['first_name']),
        ':last_name' => sanitizeString($registerData['last_name']),
        ':email' => $registerData['email'],
        ':password' => $registerData['password']
    ]);
}

function addProduct($db, array $productData): bool {
    $query = "INSERT INTO products (name, description, price, stock_quantity) VALUES (:name, :description, :price, :stock_quantity)";
    $stmt = $db->prepare($query);
    return $stmt->execute([
        ':name' => sanitizeString($productData['name']),
        ':description' => sanitizeString($productData['description']),
        ':price' => $productData['price'],
        ':stock_quantity' => $productData['stock_quantity']
    ]);
}
