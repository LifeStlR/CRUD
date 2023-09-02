<?php
$host= "localhost";
$user= "root";
$pass= "";
$database= "univ";

$connection = mysqli_connect($host, $user, $pass);
if ($connection){
    $open = mysqli_select_db($connection, $database);

}
else {
    die("Connection failed: " . mysqli_connect_error());
}

?>