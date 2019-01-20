<?php

if(isset($_POST['add_user'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    /**************HASHING THE PASSWORD**********************/

    $password = password_hash($password, PASSWORD_DEFAULT);

    /*****************************************************/

    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    /**
     * _FILES is used to get the files that are uploaded
     * ['name'] returns the name of the file uploaded
     * ['tmp_name'] returns the path of the file that is stored in temp space of server
     */
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];

    $role = $_POST['role'];

    move_uploaded_file($user_image_temp, "images/users/$user_image");

    /************************INSERTING VALUES********************************************************/

    include_once ("../includes/connection.php");
    $query = "INSERT INTO users(username, password, first_name, last_name, email, image, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $ps = mysqli_prepare($connection, $query);

    mysqli_stmt_bind_param($ps, "sssssss", $username, $password, $first_name, $last_name, $email, $user_image, $role);
    mysqli_stmt_execute($ps);

    if(mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
    else{
        header("Location: users.php");
    }

    /**********************END OF INSERTING VALUES IN DB**********************************************/
}

?>

<div class="row">
    <div class="col-md-12">
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <legend>Add New User</legend>
            <hr>

            <!--USERNAME-->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="">
            </div>

            <!--PASSWORD-->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="">
            </div>

            <!--FIRST NAME-->
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="">
            </div>

            <!--LAST NAME-->
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="">
            </div>


            <!--USER IMAGE-->
            <div class="form-group">
                <label for="user_image">Image</label>
                <input type="file" class="form-control-file" name="user_image" id="user_image" placeholder="">
            </div>

            <!--EMAIL-->
            <div class="form-group">
                <label for="email"Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="">
            </div>

            <!--USER ROLE-->
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="0">Select Role...</option>
                    <option value="admin">Admin</option>
                    <option value="subscriber">Subscriber</option>
                </select>
            </div>

            <!--PUBLISH POST-->
            <button type="submit" name="add_user" id="add_user" class="btn btn-primary">Add user</button>
        </form>
    </div>
</div>

<div class="mb-4"></div>