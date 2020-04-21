<?php
if(isset($_GET['p_id'])){

    $the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
        $select_all_posts = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_all_posts)){
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_category = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_tag = $row['post_tag'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
        $post_image = $row['post_image'];
        $post_author = $row['post_author'];
        $post_comment_count = $row['post_comment_count'];
        


        }
    if(isset($_POST['update-post'])) {
        
    $post_title = $_POST['post-title'];
    $post_author = $_POST['post-author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post-status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tag = $_POST['post-tag'];
    $post_content = $_POST['post-content'];
    $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp, "images/$post_image");


    
//  Problem on update Image need to be fixed




if(empty($post_image)) {
    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_image = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_image)) {
        echo $post_new_image = $row['post_image'];
    }
}

    $query = "UPDATE posts SET ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_tag = '{$post_tag}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_date = now(), ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = $post_id ";

    $update_query = mysqli_query($connection, $query);
 
    confirm($update_query);


    }
?>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">Post Title</label>
    <input type="text" value="<?php echo $post_title; ?>" name="post-title" class="form-control"> 
</div>

<div class="form-group">


<label for="cat_id">Post Category Id</label>
<select name="post_category_id" id="cat_id" class="form-control">

<?php
$query = "SELECT * FROM category";
$cat_id_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($cat_id_query)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
echo "<option value='$cat_id'>{$cat_title}</option>";

}
?>

</select>
</div>

<div class="form-group">
<label for="author">Post Author</label>
    <input type="text" value="<?php echo $post_author; ?>" name="post-author" class="form-control"> 
</div>

<div class="form-group">
<label for="title">Post Status</label>
    <input type="text" value="<?php echo $post_status; ?>" name="post-status" class="form-control"> 
</div>

<div class="form-group">
<label for="title">Post image</label>
<img width="100" alt="post-image" src="images/<?php echo $post_image; ?>">
    <input type="file" name="image" class="form-control"> 
</div>

<div class="form-group">
<label for="title">Post tag</label>
    <input type="text" value="<?php echo $post_tag; ?>" name="post-tag" class="form-control"> 
</div>

<div class="form-group">
<label for="title">Post Content</label>
    <textarea name="post-content" cols="155" rows="10"><?php echo $post_content; ?></textarea>
</div>

<div class="form-group">

    <input type="submit" name="update-post" value="Update Post" class="btn btn-primary"> 
</div>
</form>

