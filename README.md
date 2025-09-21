# Custom-API Task Manager Project

## Overview

The Task Manager Project is a simple web application that allows users to manage tasks through a RESTful API. It provides functionalities to create and retrieve tasks stored in a MySQL database. The application is built using PHP for the backend and JavaScript for the frontend, styled with Tailwind CSS.

## Project Structure

```
tasks
├── api.php            # Implements the RESTful API for managing tasks
├── db.php             # Contains database connection settings
├── fetch_api.js       # Fetches tasks from the API and updates the DOM
├── index.php          # Main entry point of the application
├── tailwind_config.js # Configures Tailwind CSS for styling
└── README.md          # Documentation for the project
```

## Setup Instructions

1. **Clone the Repository**

   ```bash
   git clone https://github.com/Costasfox/tasks.git
   cd tasks
   ```

2. **Database Configuration**

   - Create a MySQL database named `todo_app`.
   - Update the `db.php` file with your database connection settings:
     ```php
     $db_server   = 'localhost';   // MySQL server hostname
     $db_username = 'root';        // MySQL username
     $db_pass     = '';            // MySQL password
     $db_name     = 'todo_app';    // Database name
     ```

3. **Create the Tasks Table**
   Execute the following SQL command to create the `tasks` table:

   ```sql
   CREATE TABLE tasks (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL
   );
   ```

4. **Run the Application**
   - Start your local server (e.g., WAMP, XAMPP).
   - Access the application in your web browser at `http://localhost/tasks/index.php`.

## Usage Examples

- **Adding a Task**
  Use the form on the main page to add a new task. The task will be stored in the database.

- **Fetching Tasks**
  The application automatically fetches and displays tasks from the database using the API when the page loads.

## License

This project is free to use and modify. Please credit the author if you use or distribute it. Released under a permissive license for educational and personal use.

## Author

CostasCh
GitHub: [Costasfox](https://github.com/Costasfox/tasks)
