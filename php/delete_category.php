<?php
session_start();
include "session.php";
include "db_config.php";
$id = $_POST['id'];

$query = mysqli_query($con,"DELETE FROM book_category WHERE id = '$id'");
if($query){
    $_SESSION['SuccessMessage']= "Book Deleted Successfully";
    header('location:../department_list.php');
}
else{
    $_SESSION['ErrorMessage'] = "Something went wrong";
    header('location:../department_list.php');

}

?>