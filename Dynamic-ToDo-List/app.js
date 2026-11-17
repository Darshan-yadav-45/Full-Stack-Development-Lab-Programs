
// Select HTML elements
const taskInput = document.querySelector('#taskInput');
const addBtn = document.querySelector('#addBtn');
const taskList = document.querySelector('#taskList');
const taskCount = document.querySelector('#taskCount');

// Add a new task using arrow function
const addTask = () => {

    const taskText = taskInput.value.trim();

    // Check empty input
    if (!taskText) {
        alert('Please enter a task!');
        return;
    }

    // Create new list item
    const li = document.createElement('li');

    // Create task text
    const span = document.createElement('span');
    span.className = 'task-text';
    span.textContent = taskText;

    // Create buttons
    const buttons = document.createElement('div');
    buttons.className = 'task-buttons';

    buttons.innerHTML = `
        <button class="checkBtn">✔</button>
        <button class="deleteBtn">✖</button>
    `;

    // Add elements to list item
    li.appendChild(span);
    li.appendChild(buttons);

    // Add task to the list
    taskList.appendChild(li);

    // Clear input field
    taskInput.value = '';

    // Update task count
    updateTaskCount();
};

// Update total task count
const updateTaskCount = () => {

    const totalTasks = taskList.children.length;

    taskCount.textContent = `Total Tasks: ${totalTasks}`;
};

// Handle check and delete buttons
const handleTaskClick = (e) => {

    const li = e.target.closest('li');

    if (!li) return;

    // Mark task as completed
    if (e.target.classList.contains('checkBtn')) {

        li.querySelector('.task-text')
          .classList.toggle('completed');
    }

    // Delete task
    if (e.target.classList.contains('deleteBtn')) {

        li.remove();
    }

    updateTaskCount();
};

// Add button event listener
addBtn.addEventListener('click', addTask);

// Task list event listener
taskList.addEventListener('click', handleTaskClick);

// Add task when pressing Enter
taskInput.addEventListener('keyup', (e) => {

    if (e.key === 'Enter') {
        addTask();
    }

});
