<!-- Header -->
<?php include 'includes/admin_header.php'; ?>

<?php

    if(isset($_SESSION['username'])){

        //echo $_SESSION['username'];

        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user_query = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($select_user_query)) {
            $user_id =   $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            
        }

    }


?>
<?php

    if (isset($_POST['update_user'])) {
            
            $username =mysqli_real_escape_string($connection,$_POST['username']);
            $user_password = mysqli_real_escape_string($connection,$_POST['user_password']);
            $user_firstname = mysqli_real_escape_string($connection,$_POST['user_firstname']);
            $user_lastname = mysqli_real_escape_string($connection,$_POST['user_lastname']);
            $user_email = mysqli_real_escape_string($connection,$_POST['user_email']);
            $user_image = mysqli_real_escape_string($connection,$_FILES ['user_image'] ['name']);
            $user_image_temp = $_FILES ['user_image'] ['tmp_name'];
            $user_role = mysqli_real_escape_string($connection,$_POST['user_role']);
            move_uploaded_file($user_image_temp, "../images/$user_image");
              $query = "UPDATE users SET ";
              $query .="username  = '{$username}', ";
              $query .="user_password = '{$user_password}', ";
              $query .="user_firstname   =  '{$user_firstname}', ";
              $query .="user_lastname = '{$user_lastname}', ";
              $query .="user_email = '{$user_email}', ";
              $query .="user_image  = '{$user_image}', ";
              $query .="user_role  = '{$user_role}' ";
              $query .= "WHERE username = '{$username}' "; 
            $result = mysqli_query($connection,$query);
            //confirmQuery($result);
            if(!$result){
                die("Error". mysqli_error($connection));
            }
            else{

                echo "Update Sucessfull";

            }
            
    }



?>
<!-- Header end here -->
    <div id="wrapper">

        <!-- Navigation -->
<?php include 'includes/admin_navigation.php'; ?>       
        <!-- Navigation end here -->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <h1 class="page-header">
                            Welcome To Admin Panel  
                            <small><?php echo $_SESSION['firstname']. $_SESSION['lastname']; ?></small>
                        </h1>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username" value="<?php  echo $username; ?>" pattern="[a-z]{4,8}" title="4 to 8 letters" placeholder="Please Type UserName">       
        </label>    
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="Password" class="form-control" name="user_password" value="<?php  echo $user_password; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">       
        </label>    
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php  echo $user_firstname; ?>">  
        
    </label>    
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php  echo $user_lastname; ?>">    
        
    </label>    
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php  echo $user_email; ?>"> 
        
    </label>    
    </div>
    <div class="form-group">
        <label for="user_image">Image</label>
        <br>
        <img width="80" src="../images/<?php echo $user_image; ?>">
        <input class="form-control" type="file" name="user_image">  
    </label>    
    </div>
     <div class="form-group">
        <label for="post_category">User Role </label>
        <!--<select class="form-control" name="user_role" id="">
            <option value=""> --- Select Role --- </option>
            <option value="Admin" <?php if ($user_role=='Admin') { echo "SELECTED"; } ?>>Admin</option>
            <option value="Subcriber" <?php if ($user_role=='Subcriber') { echo "SELECTED"; } ?>>Subcriber</option>
        </select> --->
        <select name="user_role" id="" class="form-control">
            <option value='Subcriber'><?php echo $user_role; ?></option>
            <?php

                if($user_role == 'Admin'){

                    echo "<option value='Subcriber'>Subcriber</option>";
                }
                else{

                    echo "<option value='Admin'>Admin</option>";
                }
            ?>

        </select>       
        </label>
    </div> 
    <div class="form-group">
        <input type="submit" class="btn btn-primary" type="submit" name="update_user" value="Update Profile">  
    </label>    
    </div>
</form>
                        
                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php'; ?>
    