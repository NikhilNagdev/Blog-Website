<?php
    $page_title = "POST";
?>


<!DOCTYPE html>
<html lang="en">

    <?php
        include_once ("includes/header.php");
    ?>

  <body>

    <!-- Navigation -->
    <?php
        include_once ("includes/navigation-header.php");
    ?>
<!--    <div class="clearfix"></div>-->

    <!-- Page Content -->
    <div class="container">


      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <?php
            include_once ("includes/connection.php");

            if(isset($_GET['post_id'])){
                $post_cat_id = $_GET['post_id'];
                $query_all_posts = "SELECT * FROM posts WHERE post_cat_id = $post_cat_id";
                $all_posts_result = mysqli_query($connection, $query_all_posts);
                while ($post = mysqli_fetch_assoc($all_posts_result)) {
            $post_title = $post['post_title'];
            $post_author = $post['post_author'];
            $post_id = $post['post_id'];
            $post_date = $post['post_date'];
            $post_content = $post['post_content'];
            $post_tags = $post['post_tags'];
            $post_image = $post['post_image'];
            ?>

            <!-- Title -->
            <h1 class="mt-4">
                <?php echo $post_title; ?>
            </h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#"><?php echo $post_author; ?></a>
            </p>

            <hr>


            <!-- Preview Image -->
            <img class="img-fluid rounded" src="images/<?php echo $post_image; ?>" alt="">

            <hr>

            <!-- Post Content -->
            <p>
                <?php echo $post_content; ?>
            </p>

            <hr>
            <!-- Date/Time -->
            <p>Posted on <?php echo $post_date; ?></p>

            <?php

            if (isset($_POST['post_comment'])) {
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];
                $comment_date = date("Y-m-d");
                include_once("includes/connection.php");
                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_date) VALUES($post_id, '$comment_author', '$comment_email', '$comment_content', '$comment_date')";
                mysqli_query($connection, $query);
                if (mysqli_errno($connection)) {
                    die(mysqli_error($connection));
                }
            }

            ?>

            <!--Leave a comment-->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="comment_author">Author</label>
                            <input type="text" name="comment_author" id="comment_author" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment_email">Email</label>
                            <input type="text" name="comment_email" id="comment_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="comment_content">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"
                                      id="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="post_comment">Submit</button>
                    </form>
                </div>
            </div>
            <!--End of Leave a Comment-->


            <?php
            $condition = "comment_post_id = $post_id and comment_status='approved'";
            $i = 0;
            while ($i < count($comments = getAllComments($condition))) {
//                die(print_r($comments));
                $comment_author = $comments[$i]['comment_author'];
                $comment_date = $comments[$i]['comment_date'];
                $comment_content = $comments[$i]['comment_content'];
                $i++;
                ?>
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo $comment_author; echo $comment_date; ?></h5>
                        <p>
                            <?php echo $comment_content; ?>
                        </p>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
          <!-- Sidebar Widgets Column -->


      </div>
        <?php
        include_once("includes/sidebar.php");
        ?>
        <!-- /.row -->

    </div>
        <!-- /.container -->

        <!-- Footer -->

    <?php

    ?>
    <?php
    }
    }
        include_once ("includes/footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <?php
        include_once ("includes/core-scripts.php");
    ?>

  </body>

</html>
