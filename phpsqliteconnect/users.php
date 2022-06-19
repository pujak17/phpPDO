<?php

// require 'vendor/autoload.php';
use App\Config;
require 'vendor/autoload.php';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   
    PDO::ATTR_EMULATE_PREPARES => false,                
];





function allusers() {
    $pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
    $id = $_GET['id'] ? $_GET['id'] : "";
    if($id) {
        $statement = $pdo->query("SELECT * FROM users WHERE ID = $id");
        $rows = json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
        return  $rows;
    } else{
        $statement = $pdo->query("SELECT * FROM users");
    $rows = json_encode($statement->fetchAll(PDO::FETCH_ASSOC));
    return  $rows;
            
    }
}

print allusers();
