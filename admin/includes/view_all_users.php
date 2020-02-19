<?php

  if(isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $userValueId) {
      
      $bluk_options = $_POST['bluk_options'];

      switch ($bluk_options) {
        case 'Admin':

          $query = "UPDATE users SET user_role = '{$bluk_options}' WHERE user_id = '$userValueId'";
          $update_to_users_status = mysqli_query($connection,$query);

          if(!$update_to_users_status){

            die("error". mysqli_error($connection));
          }
          
        break;

        case 'Subcriber':
          $query = "UPDATE users SET user_role = '{$bluk_options}' WHERE user_id = '$userValueId'";
          $update_to_users_status = mysqli_query($connection,$query);

          if(!$update_to_users_status){

            die("error". mysqli_error($connection));
          }
          break;

          case 'delete':
            $query = "DELETE FROM users WHERE user_id = '$userValueId'";
            $update_to_users_status = mysqli_query($connection,$query);

            if(!$update_to_users_status){

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
          <option value="Admin">Admin</option>
          <option value="Subcriber">Subcriber</option>
          <option value="delete">Delete</option>          
        </select>
      </div>
      <div class="col-xs-4">
          <input type="submit" name="submit" class="btn btn-success" value="Apply">
          <a class="btn btn-primary" href="users.php?source=add_user">Add New</a>  
</div>
<thead>
  <tr>
    <th><input type="checkbox" id="selectAllBoxes" name=""></th>
    <th>ID</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Image</th>
    <th>Role</th>
    <!--<th>Delete</th>-->
    <th>Update</th>
  </tr> 
</thead>
<tbody>
<?php

    show_all_user();

?>            
</tbody>
</table> 
<?php

  //delete_user();

?> 
</form>

