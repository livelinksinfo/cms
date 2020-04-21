

                  <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Comment Post Id</th>
                                <th>Author</th>
                                <th>Content</th>
                                <th>E-mail</th>
                                <th>Status</th>
                                <th>In Response to</th>
                                <th>Date</th>
                                <th>Approved</th>
                                <th>Unapproved</th>
                                <th>Delete</th>


                            </tr>
                        </thead>
                        <tbody>
                        <?php
        $query_comment = "SELECT * FROM comment";
        $select_all_comments = mysqli_query($connection, $query_comment);
        confirm($select_all_comments);
        while($row = mysqli_fetch_assoc($select_all_comments)){
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
        $comment_author = $row['comment_author'];


            
                            echo "<tr>";
                            echo "<td>{$comment_id}</td>";
                            echo "<td>{$comment_post_id}</td>";
                            echo "<td>{$comment_author}</td>";
                            echo "<td>{$comment_content}</td>";

                            echo "<td>{$comment_email}</td>";
                            echo "<td>{$comment_status}</td>";

$comment_query = "SELECT * FROM posts WHERE post_id = {$comment_post_id} ";
$post_comment_query = mysqli_query($connection, $comment_query);
confirm($post_comment_query);
while($row = mysqli_fetch_assoc($post_comment_query)) {
 $post_comment_id = $row['post_id'];
 $post_comment_title = $row['post_title'];
 echo "<td><a href='../post.php?p_id={$post_comment_id}'>{$post_comment_title}</a></td>";

}


                            echo "<td>{$comment_date}</td>";
                            echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";

                            echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                            echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                            echo "</tr>";
        }
                            ?>
                        </tbody>
                    </table>


                    <?php
                    //Unaapproving a comment
if(isset($_GET['unapprove'])) {
    $the_comment_id = $_GET['unapprove'];

$query = "UPDATE comment SET comment_status = 'Unapprove' WHERE comment_id = {$the_comment_id}";
$udtate_query = mysqli_query($connection, $query);


header("Location: ./comments.php");
}

                    //Aapproving a comment

if(isset($_GET['approve'])) {
    $the_comment_id = $_GET['approve'];

$query = "UPDATE comment SET comment_status = 'Approved' WHERE comment_id = {$the_comment_id}";
$update_query = mysqli_query($connection, $query);


header("Location: ./comments.php");
}







     // DELETE POST QUERY
if(isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];

$query = "DELETE FROM comment WHERE comment_id = {$comment_id}";
$delete_query = mysqli_query($connection, $query);


header("Location: ./comments.php");
}
?>
