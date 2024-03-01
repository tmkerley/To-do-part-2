<?php
function create_category($categoryName){
    global $db;
    $query = 'INSERT INTO categories
                (categoryName)
                VALUES
                (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();
}
function get_all_categories() {
    global $db;
    $query = 'SELECT * FROM categories';
    $statement = $db->prepare($query);
    $statement->execute();
    $categoryList = $statement->fetchAll();
    $statement->closeCursor();
    return $categoryList;
}
function update_category($categoryName) {
    global $db;
    $query = 'UPDATE categories
        SET categoryName = :categoryName, 
    WHERE category = :categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
}
function delete_category($categoryID) {
    global $db;
    $query = 'DELETE FROM categories 
                WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $statement->closeCursor();
}
?>