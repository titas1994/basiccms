<?php 

	include_once 'db.php'; 
	
?>
<form action="" method="post" enctype="multipart/form-data"> 
	<?php

		if(isset($_GET['p_id'])){

		  $the_user_id = $_GET['p_id']; 
		  $query ="SELECT * from users WHERE user_id =$the_user_id";
		  $select_posts=mysqli_query($connection,$query);
		  while ($row = mysqli_fetch_assoc($select_posts)) {
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
			$query = "SELECT randSalt FROM users";
	        $select_randsalt_query = mysqli_query($connection, $query);
	        if(!$select_randsalt_query) {
	            die("QUERY FAILED". mysqli_error($connection));
	        }
	        $row = mysqli_fetch_array($select_randsalt_query);
	        $salt = $row['randSalt'];
	        $hash_password = crypt($user_password, $salt);
		      $query = "UPDATE users SET ";
	          $query .="username  = '{$username}', ";
	          $query .="user_password = '{$hash_password}', ";
	          $query .="user_firstname   =  '{$user_firstname}', ";
	          $query .="user_lastname = '{$user_lastname}', ";
	          $query .="user_email = '{$user_email}', ";
	          $query .="user_image  = '{$user_image}', ";
	          $query .="user_role  = '{$user_role}' ";
	          $query .= "WHERE user_id = {$the_user_id} "; 
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
		<img width="50" src="../images/<?php echo $user_image; ?>">
		<input class="form-control" type="file" name="user_image">	
	</label>	
	</div>
	 <div class="form-group">
		<label for="post_category">User Role </label>
		<select name="user_role" id="" class="form-control">
			<option value='<?php echo $user_role; ?>'><?php echo $user_role; ?></option>
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
		<input type="submit" class="btn btn-primary" type="submit" name="update_user" value="Update User">	
	</label>	
	</div>
</form>