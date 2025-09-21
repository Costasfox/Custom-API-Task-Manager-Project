<?php
declare(strict_types=1);

/**
 * Simple Tasks API
 *
 * This API allows you to interact with a 'tasks' table in a MySQL database.
 *
 * Supported Endpoints:
 *   GET    /api.php   - Returns all tasks as JSON.
 *   POST   /api.php   - Creates a new task. Expects JSON body: { "title": "Task title" }
 *
 * Usage:
 *   - GET Example:
 *       curl http://localhost/tasks/api.php
 *   - POST Example:
 *       curl -X POST -H "Content-Type: application/json" -d '{"title":"New Task"}' http://localhost/tasks/api.php
 *
 * Requirements:
 *   - db.php must define $db_server, $db_name, $db_username, $db_pass.
 *   - The 'tasks' table must exist with at least columns: id (int, auto_increment), title (varchar).
 */

include('db.php');

// Create DSN for PDO connection
$dsn = "mysql:host=$db_server;dbname=$db_name";

// PDO options for error handling and fetch mode
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

// Create PDO instance
$pdo = new PDO($dsn, $db_username, $db_pass, $options);

// Get HTTP request method
$method = $_SERVER['REQUEST_METHOD'];

// Handle GET requests: Return all tasks
if ($method == 'GET') {
    // Fetch all tasks ordered by id
    $stmt = $pdo->query("SELECT * FROM tasks ORDER BY id ASC");
    // Output as pretty-printed JSON
    echo json_encode($stmt->fetchAll(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

// Handle POST requests: Create a new task
if ($method === 'POST') {
    // Read JSON body
    $data = json_decode(file_get_contents("php://input"), true);
    // Check if 'title' is provided
    if (!empty($data['title'])) {
        // Insert new task
        $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (?)");
        $stmt->execute([$data['title']]);
        // Return success and new task id
        echo json_encode(["success" => true, "id" => $pdo->lastInsertId()]);
    }
}

?>