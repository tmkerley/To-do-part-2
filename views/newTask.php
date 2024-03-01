<form action="." autocomplete="off" method="post" id="newTaskForm">
    <input type="hidden" name="action" value="addNewTask">
    <div class="card border-info w-auto">
        <div class="card-header bg-info p-2">
        <label for="taskName"></label>
            <input type="text" name="taskName" placeholder="New Task Name" required>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <label for="dueDate">Due Date:</label>
                <input type="date" name="dueDate">
            </li>  
            <li class="list-group-item">
                <label for="Task Description"></label>
                <textarea name="taskDesc" rows="4" cols="50" placeholder="Description"></textarea>
            </li>
            <li class="list-group-item">
                <input type="submit" value="Submit" class="btn btn-primary">
            </li>
        </ul>
    </div>
</form>