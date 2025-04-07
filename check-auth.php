<?php
require 'config.php';

header('Content-Type: application/json');

// Check if user is authenticated
if (is_logged_in()) {
    echo json_encode(['authenticated' => true]);
} else {
    echo json_encode(['authenticated' => false]);
}
?>