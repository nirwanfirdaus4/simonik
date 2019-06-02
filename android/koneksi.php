<?php

$server ="localhost"; // server nya
 
$username   = "root";  //username nya
 
$password   ="";  //password nya
 
 
$database   ="simonik";   //nama database
 
$con=mysqli_connect($server, $username, $password) or die("Koneksi tidak ada");    //untuk koneksi nya$
 
mysqli_select_db($con, $database ) or die("Database tidak ditemukan");  //memilih database
?>