<?php
require 'config.php';
require_login();

header('Content-Type: application/json');

// Get expenses for the current user
$stmt = $pdo->prepare("
    SELECT e.id, e.date, c.name AS category, e.description, e.amount 
    FROM expenses e
    JOIN categories c ON e.category_id = c.id
    WHERE e.user_id = ?
    ORDER BY e.date DESC
");
$stmt->execute([$_SESSION['user_id']]);
$expenses = $stmt->fetchAll();

echo json_encode($expenses);
?>