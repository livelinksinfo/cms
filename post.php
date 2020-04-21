
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

if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
    
            }

        $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                $select_all_posts = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_posts)){
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
?>
           



                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                
<?php
if(isset($_GET['p_id'])) {
    $comment_post_id = $_GET['p_id'];
}
if(isset($_POST['comment_button'])) {
    $comment_post_id = $_GET['p_id'];
    $author = $_POST['author'];
    $email = $_POST['email'];
    $date = date('d-m-y');
    $comment = $_POST['comment'];
  
    $query = "INSERT INTO comment(comment_post_id, comment_author, comment_email, comment_content, comment_date, comment_status)";
    $query .= " VALUES({$comment_post_id}, '$author', '$email', '$comment', now(), 'Unapproved')";
    $insert_comment_query = mysqli_query($connection, $query);
    if(!$insert_comment_query){
        die("QUERY FAILED, " . mysqli_error($connection));
    }
}
?>
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post" enctype="multi/">
                        <div class="form-group">
                            <input type="text" class="form-control" name="author" placeholder="Name" >
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="E-mail" >
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment" rows="3"></textarea>
                        </div>
                        <input type="submit" name="comment_button" class="btn btn-primary" value="Submit">
                    </form>

                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">



                        <h4 class="media-heading"> 
                        
<?php 
//displaying comment from the database


$query = "SELECT * FROM comment WHERE comment_post_id = {$comment_post_id}";
$comment_query = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($comment_query)){
    $comment_author = $row['comment_author'];
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_email = $row['comment_email'];
    $comment_status = $row['comment_status'];
    ////////// Displaying only Approved Comment //////////
if($comment_status == "Unapproved"){
    echo "<br>";
echo "Hi ". " <b>$comment_author</b>" . ", your Response is awaiting moderation, Thanks!";
}else {
echo "<h4> $comment_author ";
echo "<small> $comment_date</small></h4>";
echo $comment_content;
echo "<hr>";
}
//header("Location: post.php");

}
?>
                       
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>


            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
       <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php";?>
