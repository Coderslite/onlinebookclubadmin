<?php 
session_start();
include "db_config.php";

$id = $_POST['id'];

$query = mysqli_query($con, "UPDATE books SET recommended = 0 WHERE id = '$id'");

if($query){
    $_SESSION['SuccessMessage'] = "Book UnRecommended Successfully";
    header('location:../book_list.php');
}
else{
    $_SESSION['ErrorMessage'] = "Recommendation Failed";
    header('location:../book_list.php');
}

?>