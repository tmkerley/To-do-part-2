<div class="card border-info w-auto">
    <form action="." autocomplete="off" method="post" id="updateForm">
        <input type="hidden" name="action" value="Update">
        <input type="hidden" name="updateID" value="<?php echo $task['itemNum']; ?>">
        <div class="card-header bg-info p-2">
            <label for="taskName"></label>
            <input type="text" name="taskName" value="<?php echo $task['title']; ?>" required>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">
                <label for="dueDate">Due Date:</label>
                <?php if ($task['dueDate'] != NULL) { ?>
                    <input type="date" name="dueDate" value="<?php echo $task['dueDate']; ?>">
                <?php }
                else { ?>
                    <input type="date" name="dueDate">
                <?php } ?>
            </li> 
            <li class="list-group-item">
                <?php if($task['description']) { ?>
                    <label for="Task Description"></label>
                    <textarea name="taskDesc" rows="4" cols="50">
                        <?php echo $task['description']; ?>
                    </textarea>
                <?php } 
                else { ?>
                    <textarea name="taskDesc" placeholder="Enter new Description" 
                                rows="4" cols="50"></textarea>
                <?php } ?>
            </li>
            <li class="list-group-item">
                <input type="submit" value="Submit" class="btn btn-primary">
            </li>
        </ul>
    </form>
</div>