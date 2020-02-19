<?php

include "includes/db.php";

function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
          
          die("QUERY FAILED ." . mysqli_error($connection));
   
          
      }
    

}

function insert_categories(){
	global $connection;
	if(isset($_POST['submit'])){

  $cat_title=$_POST['cat_title'];
  $check = "SELECT * FROM categories where cat_title ='$_POST[cat_title]'"; // check the categories name is exit or not 
  $rs = mysqli_query($connection,$check);
  if ($cat_title == "" || empty($cat_title)) {
                                    
      echo "This Filed Should not be empty";
    }
                               
  elseif($rs->num_rows) {
      echo "categories Already in Exists<br/>";
      }
  else{

      $query = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";
      $create_category_query =mysqli_query($connection,$query);
      if(!$create_category_query){

        die('query failed'. mysqli_error());

      }

    }
  }
}
function findallcategories(){
	global $connection;
	$query ="SELECT * from categories";
    $select_categories=mysqli_query($connection,$query);
    while ($row = mysqli_fetch_assoc($select_categories)) {
          $cat_id =   $row['cat_id'];
          $cat_tittle =   $row['cat_title'];
          echo "<tr>";
          echo "<td>{$cat_id}</td>";
          echo "<td>{$cat_tittle}</td>";
          echo "<td><a href='categories.php?edit={$cat_id}'>Update</a></td>";
          echo "<td><a onclick=\"javascript: return confirm('Are you sure to delete?');\" href='categories.php?delete={$cat_id}'>Delete</a></td>";
          echo "</tr>";
                                
    }

}
function  delete_categories(){
	global $connection;
	 if(isset($_GET['delete']))
	 {

        $the_cat_id = $_GET['delete'];
        $query= "DELETE FROM categories WHERE cat_id = {$the_cat_id }";
        $delete_query = mysqli_query($connection,$query);
        header("Location: categories.php");

     }

}
function add_posts(){

  global $connection;
  if(isset($_POST['submit'])){

    $post_title = mysqli_real_escape_string($connection,$_POST['post_title']);
    $post_author = mysqli_real_escape_string($connection,$_POST['post_author']);
    $post_category_id = mysqli_real_escape_string($connection,$_POST['post_category_id']);
    $post_status = mysqli_real_escape_string($connection,$_POST['post_status']);
    $post_image = mysqli_real_escape_string($connection,$_FILES ['image'] ['name']);
    $post_image_temp = $_FILES ['image'] ['tmp_name'];
    $post_tags = mysqli_real_escape_string($connection,$_POST['post_tags']);
    $post_content = mysqli_real_escape_string($connection,$_POST['post_content']);
    $post_date = date('d-m-y');
    //$post_comment_count = 0;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query ="INSERT INTO posts(post_title,post_author,post_category_id,post_status,post_image,post_tags,post_content,post_date) VALUES ('$post_title','$post_author','$post_category_id','$post_status','$post_image','$post_tags','$post_content',now())"; 
    $create_post_query = mysqli_query($connection,$query);
    echo "<h1>Post Create Successfull</h1>";
    confirmQuery($create_post_query);
    $the_post_id = mysqli_insert_id($connection);
    echo "<p class='bg-sucess'>Post Created.<a href='../post.php?p_id={$the_post_id}'> View Posts</a> or <a href='posts.php'>Edit More Posts</a></P>";
   // header("Location: posts.php");
  }



}
function show_allposts(){

  global $connection;
  $query ="SELECT * from posts";
  $select_posts=mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($select_posts)) {
  $post_id =   $row['post_id'];
  $post_author = $row['post_author'];
  $post_tittle = $row['post_title'];
  $post_category_id = $row['post_category_id'];
  $post_status = $row['post_status'];
  $post_image = $row['post_image'];
  $post_tags =  $row['post_tags'];
  $post_comment_count = $row['post_comment_count'];
  $post_date = $row['post_date'];
      echo "<tr>";
      ?>

        <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>

      <?php
      
      echo "<td>{$post_id }</td>";   
      echo "<td>{$post_author}</td>"; 
      echo "<td>{$post_tittle}</td>";
      $query ="SELECT * from categories WHERE cat_id={$post_category_id}";
      $select_categories_id=mysqli_query($connection,$query);
      while ($row = mysqli_fetch_assoc($select_categories_id)) {
      $cat_id =   $row['cat_id'];
      $cat_title =   $row['cat_title'];

      echo "<td>{$cat_title}</td>"; 
    }

      echo "<td>{$post_status}</td>"; 
      echo "<td><img class='img-responsive' width='100' src='../images/$post_image' alt='image'></td>"; 
      echo "<td>{$post_tags}</td>"; 
      echo "<td>{$post_comment_count}</td>"; 
      echo "<td>{$post_date}</td>";
      echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
      //echo "<td><a onclick=\"javascript: return confirm('Are you sure to delete?');\" href='posts.php?delete={$post_id}'>Delete</a></td>";
      echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Update</a></td>";  
      echo "</tr>";

  }
}
function delete_posts(){

  global $connection;
  if (isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts where post_id={$the_post_id}";
    $delete_query = mysqli_query($connection,$query);
    echo "<h1>Post Delete Successfull</h1>";
    confirmQuery($delete_query);
    header("Location: posts.php");
  }

}
function show_all_comments(){

  global $connection;
  $query ="SELECT * from comments";
  $select_posts=mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($select_posts)) {
  $comment_id =   $row['comment_id'];
  $comment_post_id = $row['comment_post_id'];
  $comment_author = $row['comment_author'];
  $comment_email = $row['comment_email'];
  $comment_content = $row['comment_content'];
  $comment_status = $row['comment_status'];
  $comment_date = $row['comment_date'];
      echo "<tr>";
      ?>
      <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $comment_id; ?>'></td>
      <?php
      echo "<td>{$comment_id}</td>";
      echo "<td>{$comment_post_id}</td>";   
      echo "<td>{$comment_author}</td>"; 
      echo "<td>{$comment_email}</td>";
      echo "<td>{$comment_content}</td>"; 
      echo "<td>{$comment_status}</td>"; 
      

      $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
      $select_posts_id_query = mysqli_query($connection,$query);
      while ($row = mysqli_fetch_assoc($select_posts_id_query)) {
        
        $post_id = $row['post_id'];
        $post_tittle = $row['post_title'];
        echo "<td><a href='../post.php?p_id=$post_id'>$post_tittle</a></td>";
      }
       
      echo "<td>{$comment_date}</td>";
      //echo "<td><a href='comments.php?approve={$comment_id}'<>Approve</a></td>";
      //echo "<td><a href='comments.php?unapprove={$comment_id}'<>Unapprove</a></td>";
      //echo "<td><a href='comments.php?delete={$comment_id}'<>Delete</a></td>";
      // echo "<td><a href='comments.php?source=edit_post&p_id={$comment_id}'<>Update</a></td>";  
      echo "</tr>";

  }
  // /// ------ Approve and Unapprove Comments ----- /////
  // if (isset($_GET['unapprove'])) {
  //   $comment_id = $_GET['unapprove'];
  //   $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = '$comment_id' ";
  //   $unapprove_comments_query = mysqli_query($connection,$query);
  //   //echo "<h1>Comments Delete Successfull</h1>";
  //   confirmQuery($unapprove_comments_query);
  //   header("Location: comments.php");
  // }
  // if (isset($_GET['approve'])) {
  //   $comment_id = $_GET['approve'];
  //   $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = '$comment_id'";
  //   $approve_comments_query = mysqli_query($connection,$query);
  //   //echo "<h1>Comments Delete Successfull</h1>";
  //   confirmQuery($approve_comments_query);
  //   header("Location: comments.php");
  // }
  // /// ------ Approve and Unapprove Comments ----- /////

}
function delete_comments(){

  global $connection;
  if (isset($_GET['delete'])) {
    $comment_id = $_GET['delete'];
    $query = "DELETE FROM comments where comment_id={$comment_id}";
    $delete_query = mysqli_query($connection,$query);
    echo "<h1>Comments Delete Successfull</h1>";
    confirmQuery($delete_query);
    header("Location: comments.php");
  }

}
function show_all_user(){

  global $connection;
  $query ="SELECT * from users";
  $select_posts=mysqli_query($connection,$query);
  while ($row = mysqli_fetch_assoc($select_posts)) {
  $user_id =   $row['user_id'];
  $username = $row['username'];
  $user_firstname = $row['user_firstname'];
  $user_lastname = $row['user_lastname'];
  $user_email = $row['user_email'];
  $user_image = $row['user_image'];
  $user_role = $row['user_role'];
      echo "<tr>";
      ?>
      <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $user_id; ?>'></td>
      <?php
      echo "<td>{$user_id}</td>";
      echo "<td>{$username}</td>";   
      echo "<td>{$user_firstname}</td>"; 
      echo "<td>{$user_lastname}</td>";
      echo "<td>{$user_email}</td>";
      echo "<td><img class='img-responsive' width='50' src='../images/$user_image' alt='image'></td>"; 
      echo "<td>{$user_role}</td>";
     // echo "<td><a href='users.php?delete={$user_id}'<>Delete</a></td>";
      echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'<>Update</a></td>";  
      echo "</tr>";

  }

}

function delete_user(){

  global $connection;
  if (isset($_GET['delete'])) {
    $user_id = $_GET['delete'];
    $query = "DELETE FROM users where user_id={$user_id}";
    $delete_query = mysqli_query($connection,$query);
    echo "<h1>User Data Delete Successfull</h1>";
    confirmQuery($delete_query);
    header("Location: users.php");
  }

}

function add_user(){

  global $connection;
  if (isset($_POST['create_user'])) {
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
         $user_password = crypt($user_password, $salt);
    //$randsalt = 'none';
    $query = "INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_image,user_role) VALUES('$username','$user_password','$user_firstname','$user_lastname','$user_email','$user_image','$user_role')";
    $user_query = mysqli_query($connection,$query);

    //echo "User Created: "." "."<a href='users.php'>View Users</a>" ;
    if(!$user_query){

      die("Query Failed". mysqli_error($connection));
    }
    header("Location: users.php");
  }
}

?>