<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form action="index.php" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit" name="submit_search" value="search">Go!</button>
                </span>
                </div>
            </form>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <?php
                    include_once ("functions.php");
                    $categories = getAllCategories();
                    $categories_count = count($categories);
                ?>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <?php

                                for($i = 0; $i<ceil($categories_count/2); $i++) {
                                    echo <<<CATEGORY
<li>
<a href="#">{$categories[$i]['cat_title']}</a>
</li>
CATEGORY;
                                }
                                ?>
                            </ul>
                        </div>

                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <?php

                        for($i = ceil($categories_count/2); $i<$categories_count; $i++) {
                            echo <<<CATEGORY
<li>
<a href="#">{$categories[$i]['cat_title']}</a>
</li>
CATEGORY;
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
        </div>
    </div>

</div>