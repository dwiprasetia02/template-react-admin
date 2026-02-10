<?php
require_once '../vendor/autoload.php';
require_once '../config/db.php';

use Firebase\JWT\JWT;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit(0);
}

$secret = 'your_secret_key';

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['email']) || !isset($input['password'])) {
    echo json_encode(['success' => false, 'message' => 'Email and password required']);
    exit;
}

$email = $input['email'];
$password = $input['password'];

try {
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $payload = [
            'iss' => 'admin_app',
            'aud' => 'admin_app',
            'iat' => time(),
            'exp' => time() + 14400, // 4 hours
            'data' => [
                'id' => $user['id'],
                'email' => $user['email']
            ]
        ];

        $token = JWT::encode($payload, $secret, 'HS256');

        echo json_encode(['success' => true, 'token' => $token]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Server error']);
}
?>
