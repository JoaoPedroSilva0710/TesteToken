<?php

declare(strict_types=1);

namespace app\database;

use PDO;
use PDOException;

class Connection
{

public static function connect()
{
    try {
        $dsn = "pgsql:host=127.0.0.1;port=5432;dbname=db_slim_test_php";

        $pdo = new PDO($dsn, 'joao', '123');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    
        return $pdo;
    } catch (PDOException $e) {
        echo "Erro de conexão: " . $e->getMessage();
    }
    
}


}