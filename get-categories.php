<?php
require 'config.php';
require_login();

header('Content-Type: application/json');

// Get all categories
$stmt = $pdo->prepare("SELECT id, name FROM categories ORDER BY name");
$stmt->execute();
$categories = $stmt->fetchAll();

echo json_encode($categories);
?>