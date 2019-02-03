<!--
FORM TAG VAHI FIELDS BHEJTA HAI JIS FILED KA name attribute set ho
-->

<div class="col-md-4">


    <!-- Login section-->
    <?php
    error_reporting(0);
    if(!isUserLoggedIn()) {
        ?>
        <div class="card my-4">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
                <form action="includes/process-login.php" method="post">

                    <!--Username-->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>

                    <!--Password-->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <input type="submit" class="btn btn-primary" name="login" id="login" value="Login">

                </form>
            </div>
        </div>
        <?php
    }
    ?>
    <!-- Login section-->


    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form action="index.php" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                  <button class="btn btn-secondary" value="search">Go!</button>
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
<a href="index.php?post_cat_id={$categories[$i]['cat_id']}">{$categories[$i]['cat_title']}</a>
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
<a href="index.php?cat_id={$categories[$i]['cat_id']}">{$categories[$i]['cat_title']}</a>
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