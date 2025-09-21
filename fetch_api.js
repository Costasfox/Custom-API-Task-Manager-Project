/**
 * API endpoint for fetching tasks.
 * @constant {string}
 */
const API_URL = 'http://localhost/tasks/api.php';

/**
 * Fetches tasks from the API and renders them in the DOM.
 *
 * This function sends a GET request to the API_URL, parses the JSON response,
 * and updates the innerHTML of the element with id 'taskList' to display the list of tasks.
 * Each task is rendered as a <li> element showing its title.
 *
 * @async
 * @function loadTasks
 * @returns {Promise<void>}
 */
async function loadTasks() {
  // Fetch tasks from the API
  const res = await fetch(API_URL);

  // Parse the response as JSON
  const tasks = await res.json();

  // Render the tasks in the DOM
  document.getElementById('taskList').innerHTML = tasks.map((t) => `<li>${t.title}</li>`).join('');
}

// Load tasks when the script is executed
loadTasks();
