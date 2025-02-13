<?php

require '../vendor/autoload.php';

use app\database\Connection;

header("Access-Control-Allow-Origin: *");

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

$pdo = Connection::connect();

$prepare = $pdo->prepare("select * from users where email = :email");

$prepare->execute([
    'email' => $email
]);

$userFound = $prepare->fetch();


echo json_encode('teste');