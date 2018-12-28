<?php

    $page_title = "Home";

    $active_page = 'home';
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

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>

            <!-- Blog Post -->

            <?php
                include_once ("includes/connection.php");

                if(isset($_GET['submit_search'])){
                    $key = $_GET['search'];
                }else{
                    $key = "";
                }
                $query_all_posts = "SELECT * FROM posts WHERE post_title like '%{$key}%' or post_tags like '%{$key}%' or post_author like '%{$key}%'";
                $all_posts_result = mysqli_query($connection, $query_all_posts);
                while($post = mysqli_fetch_assoc($all_posts_result)) {
                    $post_title = $post['post_title'];
                    $post_author = $post['post_author'];

                    $post_date = $post['post_date'];
                    $post_content = $post['post_content'];
                    $post_tags = $post['post_tags'];
                    $post_image = $post['post_image'];
            ?>

                <div class="card mb-4">
                    <img class="card-img-top" src="images/<?php echo $post_image;?>" alt="<?php echo $post_title;?>">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $post_title; ?></h2>
                        <p class="card-text"><?php echo $post_content; ?></p>
                        <a href="#" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer-tags text-muted">

                        <ul>
                            <?php
                                $tags = explode(",", $post_tags);
                                for($i=0; $i<count($tags); $i++){
                                    $tag = trim($tags[$i]);
                                    echo "<li>{$tag}</li>";
                                }
                            ?>

                        </ul>

                    </div>
                    <div class="card-footer text-muted">
                        <?php echo $post_date;?>
                        <a href="#"><?php echo $post_author;?></a>
                    </div>
                </div>

            <?php
                }
            ?>

            <!-- End of Blog Post -->

          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php
            include_once ("includes/sidebar.php");
        ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <?php
        include_once ("includes/footer.php");
    ?>

    <!-- Bootstrap core JavaScript -->
    <?php
        include_once ("includes/core-scripts.php");
    ?>

  </body>

</html>
