<?php
session_start();
include "db_config.php";
 $email = $_POST['email'];
 $password = $_POST['password'];

 $query = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");

 if(mysqli_num_rows($query)>0){
    $_SESSION['email'] = $email;
    $data = "success";
 }
else{
    $data = "failed";
}

header('content-Type: application/json');
echo json_encode($data);

?>