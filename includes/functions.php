<?php

    include_once ("connection.php");

    /**
     * This function is used to get the posts according to the condition specified.
     */
    function getAllComments($condition = 1){
        global $connection;;
        $query = "SELECT * FROM comments WHERE $condition";
        $posts_result = mysqli_query($connection, $query);
        $comments = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($posts_result)) {
            $single_comment = array();
            $single_comment['comment_id'] = $row['comment_id'];
            $single_comment['comment_post_id'] = $row['comment_post_id'];
            $single_comment['comment_author'] = $row['comment_author'];
            $single_comment['comment_content'] = $row['comment_content'];
            $single_comment['comment_email'] = $row['comment_email'];
            $single_comment['comment_status'] = $row['comment_status'];
            $single_comment['comment_date'] = $row['comment_date'];
            $comments[$i] = $single_comment;
            $i++;
        }
        return $comments;
    }


    /**
     * This function is used to get the posts according to the condition specified.
     */
    function getAllPosts($condition = 1){
        global $connection;
        $query = "SELECT * FROM posts WHERE $condition";
        $posts_result = mysqli_query($connection, $query);
        $posts = array();
        $i = 0;

        while($row = mysqli_fetch_assoc($posts_result)) {
            $single_post = array();
            $single_post['post_id'] = $row['post_id'];
            $single_post['post_author'] = $row['post_author'];
            $single_post['post_title'] = $row['post_title'];
            $single_post['post_cat_id'] = $row['post_cat_id'];
            $single_post['post_status'] = $row['post_status'];
            $single_post['post_image'] = $row['post_image'];
            $single_post['post_tags'] = $row['post_tags'];
            $single_post['post_date'] = $row['post_date'];
            $single_post['post_comment_count'] = $row['post_comment_count'];
            $posts[$i++] = $single_post;
        }
        return $posts;
    }

/**
 * This function is used to get the posts according to the condition specified.
 */
function getAllUsers($condition = 1){
    global $connection;
    $query = "SELECT * FROM users WHERE $condition";
    $users_result = mysqli_query($connection, $query);
    $users = array();
    $i = 0;
    while($row = mysqli_fetch_assoc($users_result)) {
        $single_user = array();
        $single_user['user_id'] = $row['user_id'];
        $single_user['username'] = $row['username'];
        $single_user['password'] = $row['password'];
        $single_user['first_name'] = $row['first_name'];
        $single_user['last_name'] = $row['last_name'];
        $single_user['email'] = $row['email'];
        $single_user['user_image'] = $row['image'];
        $single_user['role'] = $row['role'];
        $users[$i++] = $single_user;
    }
    return $users;
}

    /**
     * This function is used to get the categories according to the condition specified.
    */
    function getAllCategories($condition=1){
        global $connection;
        $query = "SELECT * FROM categories WHERE $condition";
        $categories_result = mysqli_query($connection, $query);
        $categories = array();
        $i = 0;
        while($row = mysqli_fetch_assoc($categories_result)) {
            $single_category = array();
            $single_category['cat_id'] = $row['cat_id'];
            $single_category['cat_title'] = $row['cat_title'];
            $categories[$i++] = $single_category;
        }
        return $categories;
    }

?>