<div class="card border-info w-auto">
    <div class="card-header bg-info p-2" id="$task['title']">
        <?php echo $task['title']; ?>
    </div>
    <ul class="list-group list-group-flush">
        <?php if($task['dueDate'] && $task['dueDate'] != '0000-00-00') { ?>
            <li class="list-group-item">
                <?php echo $task['dueDate']; ?>
            </li>
        <?php } 
        if($task['description']) { ?>
            <li class="list-group-item">
                <?php echo $task['description']; ?>
            </li>
        <?php } ?>
        <li class="list-group-item">
            <form action="." method="post" name="action" id="alter<?php echo $task['itemNum']; ?>">
                <input type="hidden" name="taskID" 
                        value="<?php echo $task['itemNum']; ?>">
            </form>
            <input type="submit" name="action" value="Complete" class="btn btn-success"
                    form="alter<?php echo $task['itemNum']; ?>">
            <input type="submit" name="action" value="Update" class="btn btn-primary"
                    form="alter<?php echo $task['itemNum']; ?>">
            <span class="badge rounded-pill">
            <input type="submit" name="action" value="Delete" class="btn btn-danger"
                    form="alter<?php echo $task['itemNum']; ?>">
            </span>
        </li>
    </ul>
</div>