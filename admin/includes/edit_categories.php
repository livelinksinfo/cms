<form action="" method="post">
 <div class="form-group">
<?php

// SELECTING DATA TO BE UPDATED FROM THE DATABASE QUERY 

        if(isset($_GET['edit'])){
            $edit_cat_id = $_GET['edit'];
            $select_edit = "SELECT * FROM category WHERE cat_id = $edit_cat_id";
            $query = mysqli_query($connection, $select_edit);
            if(!$query){
                echo "no";
            }
            while ($row = mysqli_fetch_assoc($query)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];  
      
       ?>
                        <label for="edit_category">Update Category</label>
<input type="text" id="edit_category" name="edit_category" class="form-control" value="<?php if(isset($cat_title)) {echo $cat_title; } ?>">

  
<?php } }?>
   <?php
    if(isset($_POST['edit_btn'])){
        $the_cat_title = $_POST['edit_category'];
        $edit_query = "UPDATE category SET cat_title =  '{$the_cat_title}' WHERE cat_id = {$edit_cat_id} ";
        $update = mysqli_query($connection, $edit_query);
        if(!$update){
            die("Query Failed" . mysqli_error($connection));
        }
    }
   ?>

                        </div>
                        <input type="submit" value="Update Category" class="btn btn-primary" name="edit_btn">
                    </form>   
                </div>
                <div class="col-lg-6">
