<div class="row">
    <div class="col-md-12">
        <a href="users.php?source=add_user" class="btn btn-primary">Add User</a>
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
                    <th>Username</th>
                    <th>Password</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Role</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include_once ("../includes/functions.php");
                $users = getAllUsers();
                $i = 0;
                while($i < count($users)) {
                    echo <<<POSTS
    <tr>
        <td>{$users[$i]['user_id']}</td>
        <td>{$users[$i]['username']}</td>
        <td>{$users[$i]['password']}</td>
        <td>{$users[$i]['first_name']}</td>
        <td>{$users[$i]['last_name']}</td>
        <td>{$users[$i]['email']}</td>
        <td><img src="images/users/{$users[$i]['user_image']}" class="img-fluid rounded-circle"></td>
        <td>{$users[$i]['role']}</td>
        <td><a href="users.php?source=delete_user&user_id={$users[$i]['user_id']}" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
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
