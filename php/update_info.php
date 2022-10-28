<?php
session_start();
include "db_config.php";
include "session.php";
$email = $_POST['email'];
$fname = $_POST['fname'];
$password = $_POST['password'];
$phone = $_POST['phone'];

$query = mysqli_query($con, "UPDATE users SET fullName= '$fname', password = '$password', phone ='$phone' WHERE email ='$email' ");
if($query){
    $_SESSION['SuccessMessage'] = "Information Updated Successfully";
    header('location:../profile.php');
}
else{
    $_SESSION['ErrorMessage'] = "Fail to update profile";
    header('location:../profile.php');
}
?>