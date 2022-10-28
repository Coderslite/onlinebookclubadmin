<?php
include "db_config.php";

$bookName = $_POST['book_name'];
$bookAuthor = $_POST['book_author'];
$category = $_POST['category'];
$description = $_POST['description'];
$date = date("l jS \of F Y");

if (!empty($_FILES['file'])) {

    // File upload configuration 
    $targetDir = "../../books/";
    $allowTypes = array('pdf', 'doc');
    // $allowTypes = strtolower($allowTypes); 

    // $fileName = basename($_FILES['file']['name']); 
    $temp = explode(".", strtolower($_FILES["file"]["name"]));
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $targetFilePath = $targetDir . $newfilename;
    // Check whether file type is valid 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    if (in_array($fileType, $allowTypes)) {
        // Upload file to the server 
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {

$query = mysqli_query($con, "INSERT INTO books(book_name, book_author, book_url, category,description,date) VALUES ('$bookName','$bookAuthor','$newfilename','$category','$description','$date')");
    if($query){
        $data = "success";
    }
    else{
        $data = "failed";
    }
        }
    }
}
    header('content-Type: application/json');
    echo json_encode($data);

?>