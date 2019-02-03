<div class="row">
    <div class="col-md-12">
        <a href="posts.php?source=add_post" class="btn btn-primary">Add Post</a>
    </div>
    <div class="mb-5"></div>
</div>


<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include_once ("../includes/functions.php");
                $posts = getAllPosts("post_author = {$_SESSION['user_id']}");
                $i = 0;
                while($i < count($posts)) {
                    $cat_id = $posts[$i]['post_cat_id'];
                    $post_category = getAllCategories("cat_id = $cat_id");
                    echo <<<POSTS
    <tr>
        <td>{$posts[$i]['post_id']}</td>
        <td>{$posts[$i]['post_author']}</td>
        <td>{$posts[$i]['post_title']}</td>
        <td>{$post_category[0]['cat_title']}</td>
        <td>{$posts[$i]['post_status']}</td>
        <td><img src="../images/{$posts[$i]['post_image']}" class = "img-fluid" width = "100px" alt=""></td>
        <td>{$posts[$i]['post_tags']}</td>
        <td>{$posts[$i]['post_comment_count']}</td>
        <td>{$posts[$i]['post_date']}</td>
        <td><a href="posts.php?source=delete_post&post_id={$posts[$i]['post_id']}" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
        <td><a href="posts.php?source=edit_post&post_id={$posts[$i]['post_id']}" class="btn btn-warning"><span class="fa fa-edit"></span></a></td>
    </tr>
POSTS;
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
