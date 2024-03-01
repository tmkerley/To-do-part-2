<section id="taskList" class="container-lg justify-content-center bg-secondary-subtle">
    <ul>
        <?php if($taskList) { foreach($taskList as $task) : 
            if($task['itemNum'] != $updateID) {
                include('taskCard.php');
            }
            else {
                include('taskUpdateCard.php');
            }
        endforeach; }
        else { ?>
            <p class="text-center">
                No items in the list.
            </p>
        <?php } 
        if(!$updateID) {
            include('newTask.php'); 
        } ?>
    </ul>
</section>