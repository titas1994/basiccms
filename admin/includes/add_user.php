<?php include_once 'db.php'; ?>
<?php
	
	add_user();

?>

<form action="" method="post" enctype="multipart/form-data" autocomplete="off"> 

	<div class="form-group">
		<label for="title">Username</label>
		<input type="text" class="form-control" name="username" pattern="[a-z]{4,8}" title="4 to 8 letters" placeholder="Please Type UserName" required>		
		</label>	
	</div>
	<div class="form-group">
		<label for="user_password">Password</label>
		<input type="Password" class="form-control" name="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Please Type Password" required>		
		</label>	
	</div>
	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" class="form-control" name="user_firstname" placeholder="Please Type First Name" required>	
		
	</label>	
	</div>
	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input type="text" class="form-control" name="user_lastname" placeholder="Please Type Last Name" required>	
		
	</label>	
	</div>
	<div class="form-group">
		<label for="user_email">Email</label>
		<input type="email" class="form-control" name="user_email" placeholder="Please Type Email" required>	
		
	</label>	
	</div>
	<div class="form-group">
		<label for="user_image">Image</label>
		<input class="form-control" type="file" name="user_image" required>	
	</label>	
	</div>
	 <div class="form-group">
		<label for="post_category">User Role </label>

			<select class="form-control" name="user_role" required>
				<option value="">--Select User Role--</option>
				<option value="Admin">Admin</option>
				<option value="Subcriber">Subcriber</option>
			</select>
		<!--<select class="form-control" name="user_role" id="">
			<?php

			$query ="SELECT * from users";
            $select_user=mysqli_query($connection,$query);
            //confirmQuery($select_categories);
            while ($row = mysqli_fetch_assoc($select_user)) {
                $user_id =   $row['user_id'];
                $user_role =   $row['user_role'];

                	echo "<option value='$user_id'>$user_role</option>";
            }
			?>
		</select> -->		
		</label>
	</div> 
	<div class="form-group">
		<input type="submit" class="btn btn-primary" type="submit" name="create_user" value="Create User">	
	</label>	
	</div>
</form>