<?php
require 'config.php';

try {
    // Read and execute the SQL file
    $sql = file_get_contents('db.sql');
    $pdo->exec($sql);
    
    echo "Database initialized successfully!";
} catch (PDOException $e) {
    die("Database initialization failed: " . $e->getMessage());
}
?>