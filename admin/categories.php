<!-- Header -->
<?php include 'includes/admin_header.php'; ?>
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
                            <small>Titas</small>
                        </h1>
                        <div class="col-xs-6">
                        <!-- Add Category Form --->
                          <?php
                                insert_categories();
                          ?>
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Categoy</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                            <?php

                                if(isset($_GET['edit'])){

                                    $cat_id = $_GET['edit'];

                                    include "includes/update_categories.php";
                                }

                            ?>
                             
                            </div> <!-- Add Category Form --->
                        <div class="col-xs-6">
                        <!-- Add Category show table --->
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php // show all categories query
                                
                                    findallcategories();

                            ?>
                            <!-- Delete Category Query -->
                            <?php

                               delete_categories();

                            ?>
                            <!-- Delete Category Query -->
                            <!-- Add Category show table --->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php'; ?>
    