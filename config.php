<?php
// SQLite database configuration
$dbFile = __DIR__ . '/expense_tracker.db';

try {
    $pdo = new PDO("sqlite:$dbFile");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Enable foreign key constraints
    $pdo->exec('PRAGMA foreign_keys = ON');
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper function to check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Helper function to redirect if not logged in
function require_login() {
    if (!is_logged_in()) {
        header('Location: index.html');
        exit;
    }
}
?>