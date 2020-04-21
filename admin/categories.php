<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "includes/admin_navigation.php" ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        
                    </div>
                    
                </div>

                <!-- /.row -->
            <div class="col-lg-6">

            <?php
               insert_categories();
                    ?>

                    <form action="" method="post">
                    <div class="form-group">
                    <label for="category">Add Category</label>
                    <input type="text" id="category" name="category" class="form-control">
                    </div>
                    <input type="submit" value="Add Category" class="btn btn-primary" name="submit">
                    </form>
                  
                  
                    <?php
if(isset($_GET['edit'])){
    $edit_cat_id = $_GET['edit'];

    include "includes/edit_categories.php";
}

?>
                    </div>

                    <div class="col-lg-6">
<table class="table table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>CATEGORIES</th>
    </thead>
    <tbody>
    <tr>
  
    <!-- // Find and Display all Categories in categories.php table -->
       <?php findAllCategories(); ?>

        <?php
        // Delete Category Query
        deleteCategory();
    ?>
    </tbody>
</table>   
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include "includes/admin_footer.php" ?>
    