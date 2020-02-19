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
                        
                        <?php

                            if(isset($_GET['source'])){

                                $source = $_GET['source'];

                            } 
                            else{

                                $source = '';
                            }

                            switch ($source) {
                                case 'add_post':
                                    include 'includes/add_comments.php';
                                    break;
                                case 'edit_post':
                                    include 'includes/edit_comments.php';
                                    break;
                                case '200':
                                    echo "Hello 200";
                                    break;
                                default:
                                    # code...
                                    include 'includes/view_all_comments.php';
                                    break;
                            }

                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php'; ?>
    