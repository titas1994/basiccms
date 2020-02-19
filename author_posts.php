<?php include 'includes/header.php';  ?>

    <!-- Navigation -->
<?php include 'includes/navigation.php';  ?>   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <?php

                    if(isset($_GET['p_id'])){

                       $the_post_id = $_GET['p_id'];

                    }


                    $query = "SELECT * FROM posts WHERE post_id=$the_post_id";
                    $select_all_post_query=mysqli_query($connection,$query);
                        while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                            $post_id =  $row['post_id'];
                            $post_tittle =  $row['post_title'];
                            $post_author =  $row['post_author'];
                            $post_date =  $row['post_date'];
                            $post_image =  $row['post_image'];
                            $post_content =  $row['post_content'];    
                        
                        ?>

                        <h1 class="page-header">
                    Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href=""><?php echo $post_tittle;  ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $post_author;  ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date;  ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image;  ?>" alt="">
                    <hr>
                    <p><?php echo $post_content;  ?></p>
                    <!--<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->

                <hr>

                <?php

                        }

                ?>
 <!-- Blog Comments -->
                <?php

                    if (isset($_POST['submit'])) {

                        $the_post_id = $_GET['p_id'];
                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $comment_date = date('d-m-y');


                   if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ){

                            //echo "string" . $comment_email;
                   $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ($the_post_id,'$comment_author','$comment_email','$comment_content','unapproved',now())";
                    $result = mysqli_query($connection,$query);
                    if (!$result) {
                        
                        die("Query failed". mysqli_error($connection));
                    }
                    else{

                        echo "Comments Post Successful";
                    }
                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $the_post_id"; //Comments count update for posts
                    $update_comment_count = mysqli_query($connection,$query);


                        }
                        else{

                            echo "<script>alert('Fileds Cannot be empty')</script>";
                        }       
                    
                }

                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="comment_author" placeholder="Please Enter your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="comment_email" placeholder="Please Enter your Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Please Enter your Comments Here" name="comment_content"></textarea>
                        </div>
                       <input type="submit" class="btn btn-primary" type="submit" name="submit" value="Create Comment">
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php

                $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} AND comment_status = 'approve' ORDER BY comment_id DESC";
                $select_comments_query = mysqli_query($connection,$query);
                if(!$select_comments_query){

                    die('Query Failed' . mysqli_query($connection));

                }
                while ($row = mysqli_fetch_assoc($select_comments_query)) {

                    $comment_date = $row['comment_date'];
                    $comment_content = $row['comment_content'];
                    $comment_author = $row['comment_author'];

                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <image class="media-object" src="<?php echo $_SESSION['image']; ?>">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                        <!-- End Nested Comment -->
                    </div>
        </div>


             <?php } ?>

                               
                
        </div>

            <!-- Blog Sidebar Widgets Column -->
<?php include 'includes/sidebar.php'; ?>           

        </div>
        <!-- /.row -->

        <hr>
<?php include 'includes/footer.php'; ?>
        
