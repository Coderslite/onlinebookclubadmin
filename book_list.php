<?php
include "php/session.php";
include "includes/header.php";

?>


<div class="page-wrapper">
    <div class="row py-5">
        <i class="fas fa-angle-right p-1"></i>
        <h5>Book List</h5>
    </div>
    <div class="container">
    <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <?php 
                                        echo ErrorMessage();
                                        echo SuccessMessage();
                                        ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Books
</button>

                                        <thead>
                                                <th class="border-top-0">id</th>
                                                <th class="border-top-0">Book Author</th>
                                                <th class="border-top-0">Book Name</th>
                                                <th class="border-top-0">File</th>
                                                <th class="border-top-0">recommended</th>
                                                <th class="border-top-0">Edit</th>
                                                <th class="border-top-0">Delete</th>
                                                <th class="border-top-0">Date</th>
                                                <th>Mark</th>
                                  
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include "php/db_config.php";
                                            $query = mysqli_query($con, "SELECT * FROM books");
                                            if(mysqli_num_rows($query)>0){
                                                $i = 0;
                                                while($row = mysqli_fetch_assoc($query)){
                                                    $i = $i+1;
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $row['book_author'];?></td>
                                                <td><?php echo $row['book_name'];?></td>
                                                <td><a href="<?php echo $row['book_url'];?>">view book</a></td>
                                                <td><?php if($row['recommended'] == 1){
                                                    echo "recommend";}
                                                    else{
                                                        echo "not recommended";
                                                        }?></td>
                                                <td><button class="btn btn-success">Edit</button></td>
                                                <td>
                                                    <form action="php/delete_book.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                        <button Type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                                <td><?php echo $row['date'];?></td>
                                                <td><?php if($row['recommended'] == 1){
                                                    ?>
                                                      <form action="php/unrecommend.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                        <button Type="submit" class="btn btn-danger">Unrecommend</button>
                                                    </form>
                                                    <?php 
                                                }
                                                    else{
                                                        ?>
                                                              <form action="php/recommend.php" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                                        <button Type="submit" class="btn btn-success">Recommend</button>
                                                    </form>
                                                    <?php
                                                        }?></td>
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
       <form id="addBook">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Book to Database</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        <label for="">Book Name</label>
             <input type="text" name="book_name" class ="form-control">
        </div>
        <div class="form-group">
        <label for="">Book Author</label>
             <input type="text" name="book_author" class ="form-control">
        </div>
        <div class="form-group">
        <label for="">Select Book</label>
             <input type="file" name="file" class ="form-control">
        </div>
        <div class="form-group">
            <select name="category" id="" class="form-control">
            <option value="">select book department</option>
                <?php 
                include "php/db_config.php";
                $query = mysqli_query($con, "SELECT department FROM book_category");
                if(mysqli_num_rows($query)>0){
                    while ($row = mysqli_fetch_assoc($query)){
            
                ?>
                <option value="<?php echo $row['department']?>"><?php echo $row['department']?></option>
                <?php }
                }
                else{
                    echo "<option value=''>no department available</option>";
                } ?>
            </select>
        </div>
        <div class="form-group">
        <label for="">Book Description</label>
        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
             <!-- <input type="text" name="book_author" class ="form-control"> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Book</button>
      </div>
    </div>
    </form>

  </div>
</div>


<script>
    $(document).ready(function () {
        $("#addBook").on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: 'php/add_book.php',
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
                            html: '<div class="">Book Added</div>',
                            showConfirmButton: true,
                            allowOutsideClick: false,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            location.href = "book_list.php";
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