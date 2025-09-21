<?php
/**
 * Task Manager Project
 * Copyright (c) 2025 CostasCh
 *
 * This project is free to use and modify.
 * Please credit the author if you use or distribute it.
 *
 * Released under a permissive license for educational and personal use.
 *
 * GitHub: https://github.com/Costasfox/tasks
 */

// Include database connection file
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom Tailwind config -->
    <script src="tailwind_config.js"></script>
</head>
<body class="bg-darkbg min-h-screen text-gray-200 flex flex-col items-center justify-start pt-10">

<div class="w-full max-w-md mx-auto">
    <!-- Page Title -->
    <h2 class="text-3xl font-bold mb-6 text-accent text-center">Task Manager</h2>
    <!-- Task Add Form -->
    <form action="index.php" method="post" class="bg-darkcard rounded-lg shadow-lg p-6 mb-8 flex flex-col gap-4">
        <label for="task" class="text-lg font-semibold">Add a Task via SQL query</label>
        <input type="text" name="task" class="rounded bg-darkbg border border-gray-700 px-3 py-2 text-gray-200 focus:outline-none focus:border-accent" placeholder="Your task...">
        <input type="submit" name="submit" value="Add Task" class="bg-accent text-white font-bold py-2 rounded hover:bg-indigo-700 cursor-pointer transition">
    </form>
    <!-- Section for tasks loaded via API -->
    <h3 class="text-3xl font-bold mb-6 text-accent text-center">Loaded with API</h3>
    <ul id="taskList" class="bg-darkcard rounded-lg shadow-lg p-6 space-y-3">
        <!-- Tasks will be dynamically loaded here by fetch_api.js -->
    </ul>
</div>

<!-- JavaScript to fetch and display tasks from API -->
<script src="fetch_api.js"></script>

</body>
</html>

<?php
/**
 * Handles form submission for adding a new task.
 * - Checks if the form is submitted.
 * - Validates that the task field is not empty.
 * - Escapes the input to prevent SQL injection.
 * - Inserts the new task into the 'tasks' table.
 */
if (isset($_POST['submit'])){
    $task = $_POST['task'];
    if(!empty($task)){
        // Escape special characters for use in SQL statement
        $task = mysqli_real_escape_string($conn, $task);
        // Insert the new task into the database
        $sql = "INSERT INTO tasks (title) VALUES ('$task')";
        mysqli_query($conn, $sql);
    }
}
?>