<?php 

	include_once 'db.php'; 
	
?>
<form action="" method="post" enctype="multipart/form-data"> 
	<?php

		if(isset($_GET['p_id'])){

		  $the_post_id = $_GET['p_id']; 

		  $query ="SELECT * from posts WHERE post_id =$the_post_id ";
		  $select_posts_id=mysqli_query($connection,$query);
		  while ($row = mysqli_fetch_assoc($select_posts_id)) {
		  $post_id =   $row['post_id'];
		  $post_author = $row['post_author'];
		  $post_tittle = $row['post_title'];
		  $post_category_id = $row['post_category_id'];
		  $post_status = $row['post_status'];
		  $post_image = $row['post_image'];
		  $post_tags =  $row['post_tags'];
		  $post_comment_count = $row['post_comment_count'];
		  $post_date = $row['post_date'];
		  $post_content =$row['post_content'];
  }

}
	if (isset($_POST['update_post'])) {
			
		 	$post_title = mysqli_real_escape_string($connection,$_POST['post_title']);
		 	$post_category_id = mysqli_real_escape_string($connection,$_POST['post_category_id']);
		    $post_author = mysqli_real_escape_string($connection,$_POST['post_author']);
		    $post_status = mysqli_real_escape_string($connection,$_POST['post_status']);
		    $post_image = mysqli_real_escape_string($connection,$_FILES ['image'] ['name']);
		    $post_image_temp = $_FILES ['image'] ['tmp_name'];
		    $post_tags = mysqli_real_escape_string($connection,$_POST['post_tags']);
		    $post_content = mysqli_real_escape_string($connection,$_POST['post_content']);
		    move_uploaded_file($post_image_temp, "../images/$post_image");
		      $query = "UPDATE posts SET ";
	          $query .="post_title  = '{$post_title}', ";
	          $query .="post_category_id = '{$post_category_id}', ";
	          $query .="post_date   =  now(), ";
	          $query .="post_author = '{$post_author}', ";
	          $query .="post_status = '{$post_status}', ";
	          $query .="post_tags   = '{$post_tags}', ";
	          $query .="post_content= '{$post_content}', ";
	          $query .="post_image  = '{$post_image}' ";
	          $query .= "WHERE post_id = {$the_post_id} "; 
		    $result = mysqli_query($connection,$query);
		    //confirmQuery($result);
		    if(!$result){
		    	die("Error". mysqli_error($connection));
		    }
		    else{

		    	echo "<p class='bg-success'>Post Update Sucessfull<a href='../post.php?p_id={$the_post_id}'> View Post</a></p>";

		    }
		    
	}

	?>
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="post_title" value="<?php  echo $post_tittle; ?>">		
		</label>	
	</div>
	<div class="form-group">
		<label for="post_category">Post Category ID </label>
		<select name="post_category_id" id="" class="form-control">
				<?php
				$query = "SELECT * from categories";
				$select_categories = mysqli_query($connection, $query);
				//confirmQuery($select_categories);
				while ($row = mysqli_fetch_assoc($select_categories)) {
				    $cat_id = $row['cat_id'];
				    $cat_title = $row['cat_title'];
				    
				    if ($cat_id === $post_category_id) {
				        echo "<option value='$cat_id' selected>$cat_title</option>";
				    } else {
				        echo "<option value='$cat_id'>$cat_title</option>";
				    }
				    
				}
				?>
        </select>	
		</label>
	</div>
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<!--<input type="text" class="form-control" name="post_author" value="<?php  echo $post_author; ?>"> --->
		<input type="text" class="form-control" name="post_author" value="<?php echo $_SESSION['firstname']."&nbsp;". $_SESSION['lastname']; ?>" readonly="readonly">	
		</label>	
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select class="form-control" name="post_status">	
		<option value='<?php echo $post_status;?>'><?php echo $post_status;?></option>
		<?php
		if($post_status == 'Published'){

		echo "<option value='Draft'>Draft</option>";
	}
	else{

		echo "<option value='Published'>Published</option>";
	} 
	?>
	</select>
	</label>	
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<br>
		<img width="100" src="../images/<?php echo $post_image; ?>">
		<input type="file" name="image">	
	</label>	
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php  echo $post_tags; ?>">	
	</label>	
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="body" cols="30" rows="10"><?php  echo $post_content; ?></textarea>	
	</label>	
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" type="submit" name="update_post" value="Update Post">	
	</label>	
	</div>
</form>