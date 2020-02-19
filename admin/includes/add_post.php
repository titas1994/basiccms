<?php include_once 'db.php'; ?>
<?php
	
	add_posts();

?>

<form action="" method="post" enctype="multipart/form-data"> 

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="post_title">		
		</label>	
	</div>
	<div class="form-group">
		<label for="post_category">Post Category </label>
		<!--<input type="text" class="form-control" name="post_category_id" value="<?php  echo $post_category_id; ?>">--->	
		<select name="post_category_id" id="">
			<?php

			$query ="SELECT * from categories";
            $select_categories=mysqli_query($connection,$query);
            //confirmQuery($select_categories);
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id =   $row['cat_id'];
                $cat_title =   $row['cat_title'];

                	echo "<option value='$cat_id'>$cat_title</option>";
            }
			?>
		</select>		
		</label>
	</div>
	<div class="form-group">
		<label for="post_author">Post Author</label>
		<input type="text" class="form-control" name="post_author" value="<?php echo $_SESSION['firstname']."&nbsp;". $_SESSION['lastname']; ?>" readonly="readonly">		
		</label>	
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<!--<input type="text" class="form-control" name="post_status">	-->
		<select class="form-control" name="post_status">
			<option name="Published">Published</option>
			<option name="Draft">Draft</option>
		</select>
		
	</label>	
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" name="image">	
	</label>	
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">	
	</label>	
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" class="form-control" id="body" cols="30" rows="10"></textarea>	
	</label>	
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" type="submit" name="submit" value="Create Post">	
	</label>	
	</div>
</form>