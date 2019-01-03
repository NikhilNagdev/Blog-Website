

<div class="row">
    <div class="col-md-12">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Post Title</th>
                    <th>Date</th>
                    <th></th>
                    <th></th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include_once ("../includes/functions.php");
                $comment = getAllComments();
                $i = 0;
                while($i < count($comment)) {
                    $comment_post_id = $comment[$i]['comment_post_id'];
                    if($post = getAllPosts("post_id = {$comment_post_id}")){
                        $post_title = $post[0]['post_title'];
                    }else{
                        $post_title = "Something went wrong!";
                    }

                    echo <<<COMMENT
    <tr>
        <td>{$comment[$i]['comment_id']}</td>
        <td>{$comment[$i]['comment_author']}</td>
        <td>{$comment[$i]['comment_content']}</td>
        <td>{$comment[$i]['comment_email']}</td>
        <td>{$comment[$i]['comment_status']}</td>
        <td>{$post_title}</td>
        <td>{$comment[$i]['comment_date']}</td>
        <td><a href="http://localhost/php-basics/blog-website/admin/comments.php?source=approved&comment_id={$comment[$i]['comment_id']}" class="btn btn-danger"><span class="fa fa-thumbs-up"></span></a></td>
        <td><a href="http://localhost/php-basics/blog-website/admin/comments.php?source=unapproved&comment_id={$comment[$i]['comment_id']}" class="btn btn-warning"><span class="fa fa-thumbs-down"></span></a></td>
    </tr>
COMMENT;
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
