
<?php include "includes/header.php";?>


    <!-- Navigation -->
    
<?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php


if (isset($_POST['submit'])){   
    $search = $_POST['search'];

    $search_all_post = "SELECT * FROM posts WHERE post_tag LIKE '%$search%'";
    $result = mysqli_query($connection, $search_all_post);
    if(!$result){
        die("query failed". mysqli_error($connection));
    }
    $rowcount = mysqli_num_rows($result);
    if($rowcount == 0 ){
        echo "<h1>NO RESULT FOUND</h1>";
     }
    else{
        while($row = mysqli_fetch_assoc($result)){
            $post_title = $row['post_title'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_image = $row['post_image'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
        
?>

    <h2>
        <a href="#"><?php echo $post_title; ?></a>
    </h2>
    <p class="lead">
        by <a href="index.php"><?php echo $post_author; ?></a>
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
    <hr>
    <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="">
    <hr>
    <p><?php echo $post_content; ?></p>
    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr>
    <?php
        }


    } 
}   
?>

               
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
           <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php include "includes/footer.php";?>
