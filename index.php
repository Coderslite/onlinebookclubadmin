<?php
require_once "includes/header.php";
?>
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- <div class="col-md-6 col-4 align-self-center">
                        <div class="text-right upgrade-btn">
                            <a href="https://wrappixel.com/templates/monsteradmin/"
                                class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Upgrade to
                                Pro</a>
                        </div>
                    </div> -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <?php
    include "php/db_config.php";
    $email = $_SESSION['email'];
    $fetchUsers = mysqli_query($con, "SELECT * FROM users");
        $totalUsers = mysqli_num_rows($fetchUsers);
    ?>
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->
        <?php
             $fetchBooks = mysqli_query($con, "SELECT * FROM books");
            $totalBooks = mysqli_num_rows($fetchBooks);
            ?>
        <div class="row">
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Registered Users</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0"><?php echo  $totalUsers ?></h2>
                        </div>
                        <a  href="registered_users.php" class="btn btn-success text-white">View Users</a>

                    </div>
                </div>
            </div>
            <!-- Column -->
       
            <!-- Column -->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Total Books</h4>
                        <div class="text-right">
                            <h2 class="font-light m-b-0"><?php echo $totalBooks?></h2>
                        </div>
                        <a href="book_list.php" class="btn btn-danger ">View Books</a>
                    </div>
                </div>
            </div>
            <!-- Column -->

        </div>
        <!-- ============================================================== -->
       
    </div>

</div>


    <?php include "includes/footer.php"; ?>