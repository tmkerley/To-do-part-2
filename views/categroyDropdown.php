<div class="btn-group">
    <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
    </button>
    <div class="dropdown-menu">
        <?php if($categories) { 
            foreach($castegories as $category) : ?>
                <a class="dropdown-item" href="?category_id=<?php echo $categories['categoryID']; ?>">
                    <?php echo $categories['categoryName']; ?>
                </a>
            <?php endforeach; 
        } ?> 
    </div>
</div>
<div>
    <button class="btn-info" href="addCategory.php" name="Add Category">
</div>