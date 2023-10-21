document.addEventListener('DOMContentLoaded', loadTasks);

function addTask() {
    const taskInput = document.getElementById('taskInput');
    const taskList = document.getElementById('taskList');

    if (taskInput.value.trim() !== '') {
        const taskItem = document.createElement('li');
        taskItem.innerHTML = `
            <span>${taskInput.value}</span>
            <span class="delete-btn" onclick="deleteTask(this)">X</span>
        `;
        taskList.appendChild(taskItem);
        taskInput.value = '';

        saveTask(taskItem);
    }
}

function deleteTask(element) {
    const taskList = document.getElementById('taskList');
    const taskItem = element.parentNode;
    taskList.removeChild(taskItem);

    removeTaskFromStorage(taskItem);
}

function saveTask(taskItem) {
    const tasks = getTasksFromStorage();
    tasks.push(taskItem.firstChild.textContent);
    localStorage.setItem('tasks', JSON.stringify(tasks));
}

function removeTaskFromStorage(taskItem) {
    const tasks = getTasksFromStorage();
    const taskText = taskItem.firstChild.textContent;
    const index = tasks.indexOf(taskText);
    
    if (index !== -1) {
        tasks.splice(index, 1);
        localStorage.setItem('tasks', JSON.stringify(tasks));
    }
}

function getTasksFromStorage() {
    return JSON.parse(localStorage.getItem('tasks')) || [];
}

function loadTasks() {
    const tasks = getTasksFromStorage();
    const taskList = document.getElementById('taskList');

    tasks.forEach(task => {
        const taskItem = document.createElement('li');
        taskItem.innerHTML = `
            <span>${task}</span>
            <span class="delete-btn" onclick="deleteTask(this)">X</span>
        `;
        taskList.appendChild(taskItem);
    });
}
