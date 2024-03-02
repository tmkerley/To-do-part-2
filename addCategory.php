<?php 
    require('model\database.php');
    require('model\task_db.php');
    require('model\category_db.php');
    include('views\header.php'); 
?>
<form class="align-items-center" action="." autocomplete="off" method="post" id="newCategoryForm">
    <input type="hidden" name="action" value="addCatTask">
    <div class="card border-info w-auto">
        <div class="card-header bg-info p-2">
        <label for="CategoryName"></label>
            <input class="align-items-center" type="text" name="categoryName" placeholder="New Category Name" required>
            <input class="btn btn-primary" type="submit" name="action" value="Add Category">
        </div>
    </div>
</form>
<?php
    include('views\footer.php');
?>