<?php
/**
 * Database Connection Script for ToDo App
 *
 * This file sets up a connection to the MySQL database using mysqli.
 * Update the configuration variables below to match your database settings.
 */

/* Database Configuration */
$db_server   = 'localhost';   // MySQL server hostname
$db_username = 'root';        // MySQL username
$db_pass     = '';            // MySQL password
$db_name     = 'todo_app';    // Database name

// Create a new mysqli connection
$conn = new mysqli($db_server, $db_username, $db_pass, $db_name);

// Check for connection errors and terminate script if any
if ($conn->connect_error) {
    // Output error message and stop execution
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment the line below for debugging successful connection
// echo "Connect successfully";
?>