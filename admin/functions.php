<?php

function insert_categories() {
    global $connection;
    if(isset($_POST['submit'])){
        $category = $_POST['category'];

            if($category == "" || empty($category)){
            echo "This field cannot be empty";
            }else{

            // fixing the add  category query

            $query = "INSERT INTO category(cat_title) VALUES( '{$category}')";
            $insert_category_query = mysqli_query($connection, $query);
            if(!$insert_category_query){
            die ("QUERY FAILED !!!" . mysqli_error($connection));
            }
            }


            }
}

function findAllCategories() {
    global $connection;

    $select = 'SELECT * FROM category';
    $query = mysqli_query($connection, $select);
    while ($row = mysqli_fetch_assoc($query)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    // echo "<li></li>";
    // echo "<li></li>";
    echo "<tr>";
    echo "<td><a href='#'>{$cat_id}</a></td>";
    echo "<td><a href='#'>{$cat_title}</a></td>";
    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";

    }
}

function deleteCategory() {
    global $connection;

    if(isset($_GET['delete'])){
        $delete_category = $_GET['delete'];

        $query = "DELETE FROM category WHERE cat_id = {$delete_category}";
        $delete_cat_query = mysqli_query($connection, $query);
        header("Location:categories.php");
        if(!$delete_cat_query){
            die("Delete Query Failed" . mysqli_error($connection));
        }
    }
}

function confirm($result) {
    global $connection;
    if(!$result){
        die("Query Failed! " . mysqli_error($connection));
    }
}

?>