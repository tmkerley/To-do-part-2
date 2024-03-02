<div class="btn-group container-lg justify-content-center ps-4 gap-2">
    <?php if($categories) { ?>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" 
                data-bs-toggle="dropdown" aria-expanded="true" role="button">
                Categories
            </button>
            <ul class="dropdown-menu">
                <?php foreach($categories as $category) : ?>
                    <li>
                        <a class="dropdown-item" 
                            href="?category_id=<?php echo $categories[0]; ?>">
                            <?php echo $categories[1]; ?>
                        </a>
                    </li>
                <?php endforeach; ?> 
            </ul>
        </div>
    <?php }
    else { ?>
        <p class="btn btn-secondary" type="button">
            No categories exist
        </p>
    <?php } ?>
        <div>
            <a class="btn btn-secondary p-2" href="addCategory.php" 
                name="Add Category"> Add Category </a>
        </div>
</div>