<?php

include "db_config.php";

$department = $_POST['department'];
$query = mysqli_query($con, "INSERT INTO book_category(department)VALUES('$department')");

if($query){
    $data = "success";
}
else{
    $data = "failed";
}


header('content-Type: application/json');
echo json_encode($data);




?>