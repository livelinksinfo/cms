<div class="col-md-4">


<!-- Blog Search Well -->
<div class="well">

    <h4>Blog Search</h4>
   <form action="search.php" method="post">
    <div class="input-group">
    
        <input type="text" class="form-control" name="search">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    <!-- /.input-group -->
    </form>
</div>




<!-- Blog Categories Well -->
<div class="well">



    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php 
$select = 'SELECT * FROM category';
$query = mysqli_query($connection, $select);
while ($row = mysqli_fetch_assoc($query)){
$cat_title = $row['cat_title'];
$cat_id = $row['cat_id'];

echo "<li><a href='category.php?category=$cat_id'>$cat_title</a></li>";
}
?>
          </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>