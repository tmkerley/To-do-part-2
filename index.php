<?php 
    require('model\database.php');
    require('model\task_db.php');
    require('model\category_db.php');
    include('views\header.php'); 

    //checks if no action was taken to get to the page, eg first load.
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if($action == NULL) {
            $action = 'listActiveTasks';
        }
    }

    //checks what to run
    switch($action){
        case 'addNewTask':
            // filter & get form data
            //add task
            //rediect to display tasks
            //future add for checking date input validations
            $taskName = filter_input(INPUT_POST, 'taskName');
            $taskDesc = filter_input(INPUT_POST, 'taskDesc');
            $dueDate = filter_input(INPUT_POST, 'dueDate');
            
            if($taskName == NULL || $taskName ==  FALSE) {
                $error = "Invalid task name. Check all fields and try again.";
                include ('views\error.php');
            }
            else {
                create_task($taskName, $dueDate, $taskDesc);
                header("Location: .");
            }
            break;

        case 'listActiveTasks':    
            // get active task list and display
            // add a sorted by categories
            $updateID = NULL;
            $categories = get_all_categories();
            if(empty($categories)) {
                $categories = NULL;
            }

            $activeCategoryID = filter_input(INPUT_GET, 'activeCategoryID');
            if(isset($activeCategoryID)) {
                $activeCategory = get_category_name($activeCategoryID);
                $taskList = get_tasks_by_category($activeCategoryID);
            }
            else{
                $activeCategoryID = NULL;
                $taskList = get_all_active_tasks();
            }
            include('views\categoryDropdown.php');
            include('views\taskListDisplay.php');
            break;

        case 'Update':
            // filter and get task ID
            // validate input
            // select old data
            // compare and if updated data
            $updateID = filter_input(INPUT_POST, 'updateID', FILTER_VALIDATE_INT);
            if(!$updateID){
                // if updateID isn't set, assign to the task
                $updateID = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
                $taskList = get_all_active_tasks();
                $categories = get_all_categories();
                include('views\taskListDisplay.php');
            }
            else if($updateID != FALSE) {
                // perform update
                // future add for checking date input validations
                $taskName = filter_input(INPUT_POST, 'taskName');
                $dueDate = filter_input(INPUT_POST, 'dueDate');
                $taskDesc = filter_input(INPUT_POST, 'taskDesc');
                $categoryID = filter_input(INPUT_POST, 'categoryID');
                update_task($updateID, $taskName, $dueDate, $taskDesc, $categoryID);
                // clear update
                $updateID = NULL;
                // redirect
                header("Location: .");
            }
            break;

        case 'Complete':
            // filter id
            // send task complete update
            // redirect
            $taskID = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
            if($taskID != NULL && $taskID != FALSE) {
                complete_task($taskID);
                header("Location: .");
            }    

        case 'Delete':
            //delete a task using the PRG pattern
            // assign inputs
            // filter inputs
            // delete and redirect
            $taskID = filter_input(INPUT_POST, 'taskID', FILTER_VALIDATE_INT);
            if($taskID != NULL && $taskID != FALSE) {
                delete_task($taskID);
                header("Location: .");
            }
            break;
        case 'Add Category':
            // load new category form page
            $categoryName = filter_input(INPUT_POST, 'categoryName');
            create_category($categoryName);
            header("Location: .");
            break;
        case 'UpdateCategory':
            // pull catergory id
            // update database
            // redirect to index
            $categoryID = filter_input(INPUT_POST, 'catergoryID', FILTER_VALIDATE_INT);
            if($categoryID != NULL && $categoryID != FALSE) {
                update_category($categoryID);
                header("Location: .");
            }
        default:
            echo "Default action taken. There's something wrong.";
            break;
    }

    include('views\footer.php');
?>