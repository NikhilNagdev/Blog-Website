<?php

    include_once ("connection.php");

    /**
     * This function is used to get the posts according to the condition specified.
     */
    function getAllPosts($condition = 1){
        global $connection;;
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