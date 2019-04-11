<?php
include "koneksi.php";  //memanggil fungsi koneksi di file db.php

//deklarasi
$email =$_POST['username'];
$password=$_POST['password'];
$response = array();

//perintah SQL untuk meampilkan data
$query = "SELECT * FROM tb_user WHERE username ='$email' AND password='$password'";
$hasil = $con->query($query);

//jika data nya ada atau lebih dari 0
if(mysqli_num_rows($hasil)> 0){
	while ($data = mysqli_fetch_array($hasil)) {
		if ($data["id_type_user"]!=5) {
			$response['result']= false ;
			$response['msg']="Maaf! Anda Bukan Anggota Tingkat 1";
			echo json_encode($response);
			echo $email, $password;
		}
		$response['result']= true ;
		$response['msg']="Login Berhasil";
		echo json_encode($response);
	}

} else {  
	$response['result']= false ;
	$response['msg']="Username / Password Salah";
	echo json_encode($response);
	echo $email, $password;
}
?>