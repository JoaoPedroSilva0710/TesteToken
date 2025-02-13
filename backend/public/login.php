<?php

require '../vendor/autoload.php';

use Dotenv\Dotenv;
use Firebase\JWT\JWT;
use app\database\Connection;

header("Access-Control-Allow-Origin: *");

$dotenv = Dotenv::createImmutable(dirname(__FILE__, 2));
$dotenv->load();

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// $pdo = Connection::connect();

// $prepare = $pdo->prepare("select * from users where email = :email");

// $prepare->execute([
//     'email' => $email
// ]);

// $userFound = $prepare->fetch();

$userFound = [
    'email' => 'joao',
    'password' => '123'
];


if(!$userFound) {
    http_response_code(401);
    die();
}

if($password !== $userFound['password']) {
    http_response_code(401);
    die();
}

$payload = [
    'exp' => time() + 30,
    'iat' => time(),
    'email' => $email

];

try {
    $encode = JWT::encode($payload, $_ENV['KEY'], 'HS256');
} catch (\Throwable $th) {
    echo json_encode($th->getMessage());

}


echo json_encode($encode);