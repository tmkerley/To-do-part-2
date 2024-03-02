<?php 

function create_task($taskName, $dueDate, $taskDesc) {
    global $db;
    //a new task isn't completed by default
    $completed = 0;
    //due date wasn't assigned
    if(!$dueDate) {
        $dueDate = date('m/d/Y h:i:s a', time());
    }
    $query = 'INSERT INTO todoitems
            (title, description, dueDate, completed)
                VALUES
                (:taskName, :taskDesc, :dueDate, :completed)';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskName', $taskName);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':taskDesc', $taskDesc);
    $statement->bindValue(':completed', $completed);
    $statement->execute();
    $statement->closeCursor();
}

function get_all_active_tasks() {
    global $db;
    $query = 'SELECT * FROM todoitems
                WHERE completed = 0 || completed = NULL';
    $statement = $db->prepare($query);
    $statement->execute();
    $taskList = $statement->fetchAll();
    $statement->closeCursor();
    return $taskList;
}

function get_tasks_by_category($categoryID) {
    global $db;
    $query = 'SELECT * FROM todoitems
                WHERE categoryID = :categoryID && (completed = 0 || completed = NULL)';
    $statement = $db->prepare($query);
    $statement->execute();
    $taskList = $statement->fetchAll();
    $statement->closeCursor();
    return $taskList;
}

function update_task($taskID, $taskName, $dueDate, $taskDesc, $category) {
    global $db;
    $query = 'UPDATE todoitems
            SET title = :taskName, 
                dueDate = :dueDate,
                description = :taskDesc,
                category = :category    
            WHERE itemNum = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->bindValue(':taskName', $taskName);
    $statement->bindValue(':dueDate', $dueDate);
    $statement->bindValue(':taskDesc', $taskDesc);
    $statement->bindValue(':category', $category);
    $statement->execute();
    $statement->closeCursor();
}

function complete_task($taskID) {
    global $db;
    $query = 'UPDATE todoitems
            SET completed = 1
            WHERE itemNum = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $statement->closeCursor();
}

function delete_task($taskID) {
    global $db;
    $query = 'DELETE FROM todoitems 
                WHERE itemNum = :taskID';
    $statement = $db->prepare($query);
    $statement->bindValue(':taskID', $taskID);
    $statement->execute();
    $statement->closeCursor();
}
?>