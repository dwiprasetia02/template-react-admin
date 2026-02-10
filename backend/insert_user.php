<?php
require_once 'config/db.php';

$email = 'admin@example.com';
$password = password_hash('password', PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
    $stmt->execute([$email, $password]);
    echo 'User inserted successfully';
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
