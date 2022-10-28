<?php
// $servername = "sql301.unaux.com";
// $username = "unaux_31306838";
// $password = "Mesomorph";
// $dbname = "unaux_31306838_broker";
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-library";
$con = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
// else{
//     exit("db connected");
// }

?>