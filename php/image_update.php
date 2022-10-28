<?php
session_start();
require "db_config.php";

if(isset($_POST['upload'])){
    if(!empty($_FILES['profileImage'])){ 
        // $date = date('l jS\ F Y ');
        // date_default_timezone_set("Africa/Lagos");
        // $time = date('h:i:s A');
        // $last_update = $date ." " .$time;
        $email = $_POST['email'];
        $image_name = $_POST['image_name'];

        // File upload configuration 
        $targetDir = "../images/$email/"; 
        if(!file_exists($targetDir)){
            mkdir($targetDir);
        }
        $allowTypes = array('jpg', 'png', 'jpeg');  
    //   $fileName = basename($_FILES['file']['name']); 
         $temp = explode(".",strtolower($_FILES['profileImage']["name"]));
         $newfilename = $email . '.' . end($temp);
         $targetFilePath = $targetDir.$newfilename; 
      // Check whether file type is valid 
         $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
          if(in_array($fileType, $allowTypes)){
            $fileLocation = "../images/$email/$image_name";
            unlink($fileLocation);
         // Upload file to the server 
              if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath)){ 
                $query = mysqli_query($con, "UPDATE users SET image = '$newfilename' WHERE email='$email'");          
             if($query){
                $_SESSION['SuccessMessage'] = "Image Updated";
                header('location:../profile.php');
             }
             else{
                $_SESSION['ErrorMessage'] = "Image not update";
                header('location:../profile.php');           
             }
            } 
        } 
        else{
            $_SESSION['ErrorMessage'] = "Image is empty";
            header('location:profile.php');
        }
    
    }
    else{
        echo "failed";
        header('location:code.php');
    }
}
?>