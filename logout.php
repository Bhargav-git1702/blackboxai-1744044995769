<?php
require 'config.php';

header('Content-Type: application/json');

// Destroy the session
session_destroy();

// Return success response
echo json_encode(['message' => 'Logout successful']);
?>