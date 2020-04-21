<?php
if(isset($_POST['create-post'])){

    $post_title = $_POST['post-title'];
    $post_author = $_POST['post-author'];
    $post_category_id = $_POST['post-cat-id'];
    $post_status = $_POST['post-status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tag = $_POST['post-tag'];
    $post_content = $_POST['post-content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;



    move_uploaded_file($post_image_temp, "images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_comment_count, post_status) ";
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tag}', {$post_comment_count}, '{$post_status}' )";

    $insert_post_query = mysqli_query($connection, $query);
    confirm($insert_post_query);

    } else {
    }

?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="title">Post Title</label>
    <input type="text" name="post-title" class="form-control"> 
</div>

<div class="form-group">


<label for="cat_id">Post Category Id</label>
<select name="post-cat-id" id="cat_id" class="form-control">

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
    <input type="text" name="post-author" class="form-control"> 
</div>

<div class="form-group">
<label for="title">Post Status</label>
    <input type="text" name="post-status" class="form-control"> 
</div>

<div class="form-group">
<label for="title">Post image</label>
    <input type="file" name="image" class="form-control"> 
</div>

<div class="form-group">
<label for="title">Post tag</label>
    <input type="text" name="post-tag" class="form-control"> 
</div>

<div class="form-group">
<label for="title">Post Content</label>
    <textarea name="post-content" id="" cols="155" rows="10"></textarea>
</div>

<div class="form-group">

    <input type="submit" name="create-post" value="Publish" class="btn btn-primary"> 
</div>
</form>