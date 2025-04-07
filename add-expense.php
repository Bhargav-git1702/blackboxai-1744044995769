<?php
require 'config.php';
require_login();

header('Content-Type: application/json');

// Get input data
$data = json_decode(file_get_contents('php://input'), true);
$date = $data['date'] ?? '';
$category_id = $data['category_id'] ?? '';
$description = trim($data['description'] ?? '');
$amount = $data['amount'] ?? '';

// Validate input
if (empty($date) || empty($category_id) || empty($description) || empty($amount)) {
    http_response_code(400);
    echo json_encode(['error' => 'All fields are required']);
    exit;
}

if (!is_numeric($amount) || $amount <= 0) {
    http_response_code(400);
    echo json_encode(['error' => 'Amount must be a positive number']);
    exit;
}

// Insert expense
$stmt = $pdo->prepare("
    INSERT INTO expenses (user_id, date, category_id, description, amount)
    VALUES (?, ?, ?, ?, ?)
");
$stmt->execute([
    $_SESSION['user_id'],
    $date,
    $category_id,
    $description,
    $amount
]);

// Return success response
http_response_code(201);
echo json_encode(['message' => 'Expense added successfully']);
?>