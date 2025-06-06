<?php
$host = 'sql200.infinityfree.com';
$db = 'epiz_31121671_sup25';
$user = 'epiz_31121671';
$pass = '7XhEahxb5zgcPgN';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Greška u konekciji: " . $e->getMessage());
}
