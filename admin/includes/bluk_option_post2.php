<?php

  if(isset($_POST['checkBoxArray'])){

    foreach ($_POST['checkBoxArray'] as $postValueId) {
      
      $bulk_options = $_POST['checkBoxArray'];

      if (isset($_POST["checkBoxArray"])) {

    foreach ($_POST["checkBoxArray"] as $checkboxValue) {

       $bulk_options = $_POST["bulk_options"];

     if ($bulk_options == "published") {

        $query = "UPDATE posts SET post_status = '$bulk_options'";

        $query .= "WHERE post_id = '$checkboxValue'";

        $run_query = mysqli_query($connection, $query);

         

           

    }elseif ($bulk_options == 'draft') {

         $query = "UPDATE posts SET post_status = 'bulk_options' WHERE post_id = '$checkboxValue'";

         $run_query = mysqli_query($connection, $query);

           

           

    }else {

         $query = "DELETE FROM posts WHERE post_id = '$checkboxValue'";

         $result = mysqli_query($connection, $query);

               

        }       

            }

        }
    }


  }



?>