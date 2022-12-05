<?php

function connection() {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;

    $pdo = NEW \PDO("mysql:host=127.0.0.1;dbname=db_curso","root","5141");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}       

?>