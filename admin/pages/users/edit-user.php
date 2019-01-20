<?php
include_once ("../includes/connection.php");
//ON PRESS OF EDIT SUBMIT BUTTON
if(isset($_POST['edit_post']) and isset($_GET['post_id'])){
    $edit_post_id = $_GET['post_id'];
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_cat_id = $_POST['post_cat_id'];
    $post_status = $_POST['post_status'];

    /**
     * _FILES is used to get the files that are uploaded
     * ['name'] returns the name of the file uploaded
     * ['tmp_name'] returns the path of the file that is stored in temp space of server
     */

    $old_image = $_POST['old_image'];
    $post_image = $_FILES['post_image']['name'];
    if($post_image == ""){
        $post_image = $old_image;
    }else{
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($post_image_temp, "../images/$post_image");
    }

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

//    $post_date = date("Y-m-d");

    /************************INSERTING VALUES********************************************************/

    $query = "UPDATE posts SET post_cat_id = ?, post_title = ?, post_author = ?, post_image = ?, post_content = ?, post_tags = ?, post_status = ? WHERE post_id =  ?";
    $ps = mysqli_prepare($connection, $query);

    mysqli_stmt_bind_param($ps, "dssssssd", $post_cat_id, $post_title, $post_author, $post_image, $post_content, $post_tags, $post_status, $edit_post_id);

    mysqli_stmt_execute($ps);

    if(mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
    else{
        header("Location: posts.php");
    }

    /**********************END OF INSERTING VALUES IN DB**********************************************/
}

if(isset($_GET['post_id'])){
    $edit_post_id = $_GET['post_id'];
    $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
    $result = mysqli_query($connection, $query);
    if($row = mysqli_fetch_assoc($result)){
        $post_title = $row['post_title'];
        $post_status = $row['post_status'];
        $post_cat_id = $row['post_cat_id'];
        $post_author = $row['post_author'];
        $post_tags = $row['post_tags'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        ?>

        <div class="row">
            <div class="col-md-12">
                <form action="" method="post" role="form" enctype="multipart/form-data">
                    <legend>Edit Post</legend>
                    <hr>

                    <!--POST TITLE-->
                    <div class="form-group">
                        <label for="post_title">Post Title</label>
                        <input type="text" class="form-control" name="post_title" id="post_title" value="<?php
                        echo $post_title;?>">
                    </div>

                    <!--POST CATEGORY ID-->
                    <div class="form-group">
                        <label for="post_cat_id">Post Category Id</label>
                        <?php
                        include_once ("../includes/functions.php");
                        $categories = getAllCategories();
                        $categories_count = count($categories);
                        ?>
                        <select class="form-control" name="post_cat_id" id="post_cat_id" placeholder="">
                            <?php
                            $i = 0;
                            while($i < $categories_count){
                                $cat_id = $categories[$i]['cat_id'];
                                $cat_title = $categories[$i]['cat_title'];
                                $option_equal = "<option value = '$cat_id' selected>$cat_title</option>";
                                $option_normal = "<option value = '$cat_id'>$cat_title</option>";
                                if($cat_id == $post_cat_id){
                                    echo $option_equal;
                                }else{
                                    echo $option_normal;
                                }
                                $i++;
                            }
                            ?>
                        </select>
                    </div>

                    <!--POST AUTHOR-->
                    <div class="form-group">
                        <label for="post_author">Post Author</label>
                        <input type="text" class="form-control" name="post_author" id="post_author" value="<?php
                        echo $post_author;?>">
                    </div>

                    <!--POST STATUS-->
                    <div class="form-group">
                        <label for="post_status">Post Status</label>
                        <select name="post_status" id="post_status" class="form-control">
                            <option value="draft <?php echo $post_status === "draft"? "selected": ""?>">Draft</option>
                            <option value="published <?php echo $post_status === "published"? "selected": ""?>">Published</option>
                        </select>
                    </div>

                    <!--POST IMAGE-->
                    <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <input type="hidden" class="form-control-file" value="<?php echo $post_image?>" name="old_image" id="old_image" placeholder="">
                        <input type="file" class="form-control-file" name="post_image" id="post_image" placeholder="">
                    </div>

                    <!--POST TAGS-->
                    <div class="form-group">
                        <label for="post_tags">Post Tags</label>
                        <input type="text" class="form-control" name="post_tags" id="post_tags" value="<?php
                        echo $post_tags;?>">
                    </div>

                    <!--POST CONTENT-->
                    <div class="form-group">
                        <label for="post_content">Post Content</label>
                        <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"><?php
                            echo $post_content;?></textarea>
                    </div>

                    <!--PUBLISH POST-->
                    <button type="submit" name="edit_post" id="edit_post" class="btn btn-primary">Edit Post</button>
                </form>
            </div>
        </div>

        <div class="mb-4"></div>

        <?php
    }
}

?>

