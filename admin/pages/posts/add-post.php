<?php

    if(isset($_POST['publish_post'])){
        $post_author = $_POST['post_author'];
        $post_title = $_POST['post_title'];
        $post_cat_id = $_POST['post_cat_id'];
        $post_status = $_POST['post_status'];

        /**
         * _FILES is used to get the files that are uploaded
         * ['name'] returns the name of the file uploaded
         * ['tmp_name'] returns the path of the file that is stored in temp space of server
        */
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];

        $post_date = date("Y-m-d");

        move_uploaded_file($post_image_temp, "../images/$post_image");

        /************************INSERTING VALUES********************************************************/

        include_once ("../includes/connection.php");
        $query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $ps = mysqli_prepare($connection, $query);

        mysqli_stmt_bind_param($ps, "dsssssss", $post_cat_id, $post_title, $post_author, $post_date, $post_image, $post_content, $post_tags, $post_status);

        mysqli_stmt_execute($ps);

        if(mysqli_errno($connection)){
            die(mysqli_error($connection));
        }
        else{
            header("Location: posts.php");
        }

        /**********************END OF INSERTING VALUES IN DB**********************************************/
    }

?>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <legend>Add New Post</legend>
            <hr>

            <!--POST TITLE-->
            <div class="form-group">
                <label for="post_title">Post Title</label>
                <input type="text" class="form-control" name="post_title" id="post_title" placeholder="">
            </div>

            <!--POST CATEGORY ID-->
            <div class="form-group">
                <label for="post_cat_id">Post Category Id</label>
                <?php
                    include_once ("../includes/functions.php");
                    $categories = getAllCategories();
                ?>
                <select class="form-control" name="post_cat_id" id="post_cat_id" placeholder="">
                    <?php
                        $i = 0;
                        while($i < count($categories)){
                            $cat_id = $categories[$i]['cat_id'];
                            $cat_title = $categories[$i]['cat_title'];
                            echo "<option value = '{$cat_id}'>$cat_title</option>";
                            $i++;
                        }
                    ?>
                </select>
            </div>

            <!--POST AUTHOR-->
            <div class="form-group">
                <label for="post_author">Post Author</label>
                <input type="text" class="form-control" name="post_author" id="post_author" placeholder="">
            </div>

            <!--POST STATUS-->
            <div class="form-group">
                <label for="post_status">Post Status</label>
                <select name="post_status" id="post_status" class="form-control">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <!--POST IMAGE-->
            <div class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file" class="form-control-file" name="post_image" id="post_image" placeholder="">
            </div>

            <!--POST TAGS-->
            <div class="form-group">
                <label for="post_tags">Post Tags</label>
                <input type="text" class="form-control" name="post_tags" id="post_tags" placeholder="">
            </div>

            <!--POST CONTENT-->
            <div class="form-group">
                <label for="post_content">Post Content</label>
                <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"></textarea>
            </div>

            <!--PUBLISH POST-->
            <button type="submit" name="publish_post" id="publish_post" class="btn btn-primary">Publish Post</button>
        </form>
    </div>
</div>

<div class="mb-4"></div>