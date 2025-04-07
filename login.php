<?php
require 'config.php';

header('Content-Type: application/json');

// Get input data
$data = json_decode(file_get_contents('php://input'), true);
$username = trim($data['username'] ?? '');
$password = $data['password'] ?? '';

// Validate input
if (empty($username) || empty($password)) {
    http_response_code(400);
    echo json_encode(['error' => 'Username and password are required']);
    exit;
}

// Get user from database
$stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch();

// Verify credentials
if (!$user || !password_verify($password, $user['password'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid username or password']);
    exit;
}

// Start session and store user ID
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];

// Return success response
echo json_encode([
    'message' => 'Login successful',
    'user' => [
        'id' => $user['id'],
        'username' => $user['username']
    ]
]);
?>