<?php
include "php/session.php";
include "includes/header.php";

?>


<div class="page-wrapper">
    <div class="row py-5">
        <i class="fas fa-angle-right p-1"></i>
        <h5>Department List</h5>
    </div>
    <div class="container">
    <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                    <?php 
                                        echo ErrorMessage();
                                        echo SuccessMessage();
                                        ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add department
</button>

                                        <thead>
                                                <th class="border-top-0">id</th>
                                                <th class="border-top-0">department</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                  
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include "php/db_config.php";
                                            $query = mysqli_query($con, "SELECT * FROM book_category");
                                            if(mysqli_num_rows($query)>0){
                                                $i = 0;
                                                while($row = mysqli_fetch_assoc($query)){
                                                    $i = $i+1;
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row['department'];?></td>
                                                <td><button class="btn btn-success">Edit</button></td>
                                                <td>
                                                    <form action="php/delete_category.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                        <button Type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                           <?php
                                                }
                                            }
                                            else{
                                                echo "<td>no data</td>";
                                            }?>
                                        </tbody>
                                    </table>
                                </div>

    </div>
</div>

       
<?php
include "includes/footer.php";

?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <form id="addDepartment">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Department to Database</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <label for="">Add Department</label>
             <input type="text" name="department" class ="form-control">
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Department</button>
      </div>
    </div>
    </form>

  </div>
</div>


<script>
    $(document).ready(function () {
        $("#addDepartment").on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'php/add_department.php',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                // dataType: 'json',
                beforeSend: function () {
                    Swal.fire({
                        html: '<div style="font-size: 15px; width:4rem; height:4rem;" class="spinner-border"></div>',
                        showConfirmButton: false
                    });
                },
                success: function (data) {
                    if (data.trim() == "success") {
                        Swal.fire({
                            icon: 'success',
                            html: '<div class=""> Department Added Successfully</div>',
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            location.href = "department_list.php";
                        })
                    }
                    else {
                        Swal.fire({
                            icon: 'error',
                            html: `<div class=""> ${data} </div>`,
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            confirmButtonText: 'Ok'
                        })
                    }
                },
                error: function (data) {
                    Swal.fire({
                        icon: 'error',
                        html: '<div class"">Failed</div>',
                        showConfirmButton: true,
                        allowOutsideClick: true,
                    })
                }
            })

        })
    })
</script>