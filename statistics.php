<?php
require 'config.php';
require_login();

header('Content-Type: application/json');

// Get expense statistics
$stats = [];

// Total expenses
$stmt = $pdo->prepare("
    SELECT SUM(amount) AS total 
    FROM expenses 
    WHERE user_id = ?
");
$stmt->execute([$_SESSION['user_id']]);
$stats['total'] = $stmt->fetch()['total'] ?? 0;

// Monthly expenses
$stmt = $pdo->prepare("
    SELECT DATE_FORMAT(date, '%Y-%m') AS month, SUM(amount) AS total
    FROM expenses
    WHERE user_id = ?
    GROUP BY DATE_FORMAT(date, '%Y-%m')
    ORDER BY month DESC
    LIMIT 6
");
$stmt->execute([$_SESSION['user_id']]);
$stats['monthly'] = $stmt->fetchAll();

// Category breakdown
$stmt = $pdo->prepare("
    SELECT c.name AS category, SUM(e.amount) AS total
    FROM expenses e
    JOIN categories c ON e.category_id = c.id
    WHERE e.user_id = ?
    GROUP BY c.name
    ORDER BY total DESC
");
$stmt->execute([$_SESSION['user_id']]);
$stats['categories'] = $stmt->fetchAll();

echo json_encode($stats);
?>