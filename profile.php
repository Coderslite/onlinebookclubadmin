<?php
include "includes/header.php";
include "php/session.php";
?>


 <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Profile</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
                                    $email =$_SESSION['email'];
                                    $fetchDetails = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");
                                    if (mysqli_num_rows($fetchDetails) > 0) {
                                      while ($row = mysqli_fetch_assoc($fetchDetails)) {
                                
                                     ?>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body profile-card">
                                <center class="m-t-30">
                                     <!-- <img src="assets/images/users/5.jpg"
                                        class="rounded-circle" width="150" /> -->
                                        <?php if(empty($row['image'])){
                                       echo '<form method="post" action="php/image_update.php" enctype="multipart/form-data">
                                            <img src="../images/avatar.jpg" onClick="triggerClick()" id="profileDisplay" class="rounded-circle" width="150px" height="150px">
                                                <input type="hidden" name="email" value="'.$row['email'].'" /> 
                                                <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" style="display:none" />
                                                <input type="hidden" name="email" value="'.$row['email'].'" >
                                                <input type="hidden" name="image_name" value="'.$row['image'].'" >
                                                <button type="submit" name="upload" id="upload_image" class="btn btn-primary" style="display:none; width:150px; height:30px;">Upload Image</button>
                                                </form>';
                                        }
                                        else{
                                            echo '  
                                            <form method="post" action="php/image_update.php" enctype="multipart/form-data">
                                            <img src="images/'.$row['email'].'/'.$row['image'].'?time=.time()" onClick="triggerClick()" id="profileDisplay" class="rounded-circle" width="150px" height="150px">
                                                 <input type="hidden" name="email" value="'.$row['email'].'" /> 
                                                 <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" style="display:none" />
                                                 <input type="hidden" name="email" value="'.$row['email'].'" >
                                                 <input type="hidden" name="image_name" value="'.$row['image'].'" >
                                                 <button type="submit" name="upload" id="upload_image" class="btn btn-primary" style="display:none; width:150px; height:30px;">Upload Image</button>
                                            </form>
                                            ';
                                          }
                                                ?>
                                    <h4 class="card-title m-t-10"><?php echo $row['fullName']?></h4>
                                    <!-- <h6 class="card-subtitle">Accoubts Manager Amix corp</h6> -->
                                    <!-- <div class="row justify-content-center">
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                                <i class="icon-people" aria-hidden="true"></i>
                                                <span class="font-normal">254</span>
                                            </a></div>
                                        <div class="col-4">
                                            <a href="javascript:void(0)" class="link">
                                                <i class="icon-picture" aria-hidden="true"></i>
                                                <span class="font-normal">54</span>
                                            </a></div>
                                    </div> -->
                                </center>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                            <?php
                                    echo SuccessMessage();
                                    echo ErrorMessage();
                                ?>
                                <form class="form-horizontal form-material" action="php/update_info.php" method="POST">
                             <div class="row">
                             <div class="form-group col-md-12">
                                        <label class="col-md-12 mb-0">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="fname" value="<?php echo $row['fullName']; ?>"
                                                class="form-control pl-0 form-control-line"  required>
                                        </div>
                                    </div>
                                    
                             </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" value="<?php echo $row['email'] ?>"
                                                class="form-control pl-0 form-control-line" name="example-email"
                                                id="example-email" disabled>
                                                <input type="hidden" name="email" value="<?php echo $row['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Password</label>
                                        <div class="col-md-12">
                                            <input type="text" name="password" value="<?php echo $row['password'] ?>"
                                                class="form-control pl-0 form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone" value="<?php echo $row['phone']?>"
                                                class="form-control pl-0 form-control-line" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Update
                                                Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <?php
                                      }
                                    }
                                    ?>
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                © 2020 Monster Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

<?php 
include "includes/footer.php";
?>

<script>
          function triggerClick(e){
        document.querySelector("#profileImage").click();
      }
      function displayImage(e){
        if(e.files[0]){
          var reader = new FileReader();
          reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            $('#upload_image').show('show')
          }
          reader.readAsDataURL(e.files[0]);
        }
      }
</script>