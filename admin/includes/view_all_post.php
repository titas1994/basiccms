<?php

  if(isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $postValueId) {
      
      $bluk_options = $_POST['bluk_options'];

      switch ($bluk_options) {
        case 'Published':

          $query = "UPDATE posts SET post_status = '{$bluk_options}' WHERE post_id = '$postValueId'";
          $update_to_published_status = mysqli_query($connection,$query);

          if(!$update_to_published_status){

            die("error". mysqli_error($connection));
          }
          
        break;

        case 'Draft':
          $query = "UPDATE posts SET post_status = '{$bluk_options}' WHERE post_id = '$postValueId'";
          $update_to_published_status = mysqli_query($connection,$query);

          if(!$update_to_published_status){

            die("error". mysqli_error($connection));
          }
          break;

          case 'delete':
            $query = "DELETE FROM posts WHERE post_id = '$postValueId'";
            $update_to_published_status = mysqli_query($connection,$query);

            if(!$update_to_published_status){

              die("error". mysqli_error($connection));
            }
            break;

        default:
          
          echo "No Post Found";

          break;
      }
    }


  }



?>

<form action="" method="post">
  
<table class="table table-bordered table-hover">


      <div id="bulkOptionsContainer" class="col-xs-4" style="padding:0px;"> <!-- col-xs-4 :-widht 33 % --->
        
        <select class="form-control" name="bluk_options" id="">

          <option value=""> --- Select Option --- </option>
          <option value="Published">Published</option>
          <option value="Draft">Draft</option>
          <option value="delete">Delete</option>
          
        </select>

      </div>
      <div class="col-xs-4">

          <input type="submit" name="submit" class="btn btn-success" value="Apply">
          <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        
      </div>

      <thead>
            <tr>
              <th><input type="checkbox" id="selectAllBoxes" name=""></th>
              <th>ID</th>
              <th>Author</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th>Image</th>
              <th>Tags</th>
              <th>Comments</th>
              <th>Date</th>
              <th>View</th>
              <!--<th>Delete</th>-->
              <th>Update</th>
            </tr> 
        </thead>
        <tbody>
            <?php

              show_allposts();

            ?>            
        </tbody>


</table>
<?php

  //delete_posts();

?>


</form>
