<?php

require 'vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$secret = $_ENV['APP_SECRET'];

$payload = [
    'iss' => 'yourdomain.com',    // 簽發者
    'aud' => 'yourapp',           // 接收者
    'iat' => time(),              // 簽發時間
    'exp' => time() + 3600,       // 過期時間：1 小時
    'uid' => 12345,               // 自訂資料
];

try {

    // 編碼（產生 token）
    $jwt = JWT::encode($payload, $secret, 'HS256');

    $decoded = JWT::decode($jwt, new Key($secret, 'HS256'));

    dd($jwt, $decoded);
} catch (Exception $e) {
    dd($e->getMessage());
}
