<?php

  if(isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $commentsValueId) {
      
      $bluk_options = $_POST['bluk_options'];

      switch ($bluk_options) {
        case 'approve':

          $query = "UPDATE comments SET comment_status = '{$bluk_options}' WHERE comment_id = '$commentsValueId'";
          $update_to_comments_status = mysqli_query($connection,$query);

          if(!$update_to_comments_status){

            die("error". mysqli_error($connection));
          }
          
        break;

        case 'unapprove':
          $query = "UPDATE comments SET comment_status = '{$bluk_options}' WHERE comment_id = '$commentsValueId'";
          $update_to_comments_status = mysqli_query($connection,$query);

          if(!$update_to_comments_status){

            die("error". mysqli_error($connection));
          }
          break;

          case 'delete':
            $query = "DELETE FROM comments WHERE comment_id = '$commentsValueId'";
            $update_to_comments_status = mysqli_query($connection,$query);

            if(!$update_to_comments_status){

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
<div id="bulkOptionsContainer" class="col-xs-4" style="padding:0px;"> <!-- col-xs-4 :-widht 33 % --->
        
        <select class="form-control" name="bluk_options" id="">

          <option value=""> --- Select Option --- </option>
          <option value="approve">Approve</option>
          <option value="unapprove">Unapprove</option>
          <option value="delete">Delete</option>
          
        </select>
</div>
<div class="col-xs-4">
          <input type="submit" name="submit" class="btn btn-success" value="Apply">          
</div>  
<table class="table table-bordered table-hover">
<thead>
  <tr>
    <th><input type="checkbox" id="selectAllBoxes" name=""></th>
    <th>ID</th>
    <th>Post ID</th>
    <th>Author</th>
    <th>Email</th>
    <th>Comments</th>
    <th>Status</th>
    <th>In Response to</th>
    <th>Date</th>
    <!-- <th>Approve</th>
    <th>Un Approve</th>
    <th>Delete</th> -->
    <!--<th>Update</th>-->
  </tr> 
</thead>
<tbody>
    <?php
      show_all_comments();
    ?>            
</tbody>
</table>
<?php
  delete_comments();
?>
</form>
