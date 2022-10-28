<?php
session_start();
include "session.php";
include "db_config.php";
$id = $_POST['id'];

$query = mysqli_query($con,"DELETE FROM books WHERE id = '$id'");
if($query){
    $_SESSION['SuccessMessage']= "Book Deleted Successfully";
    header('location:../book_list.php');
}
else{
    $_SESSION['ErrorMessage'] = "Something went wrong";
    header('location:../book_list.php');

}

?>