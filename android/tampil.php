<?php  
 include 'koneksi.php'; // konek database
 include 'login.php';

 $ukm = $_SESSION['id_ukm'];
 $daftar_proker = $_SESSION['id_proker'];
 $sie = $_SESSION['id_sie'];
 $periode = $_SESSION['id_periode'];
 echo $_SESSION['id_user'];

 $query = ("SELECT * FROM tb_panitia_proker");
 $hasil = $con->query($query);


 $response = array();
 
//jika data nya ada atau lebih dari 0
if(mysqli_num_rows($hasil)> 0){

    $response['result']= "true" ;
    $response['msg']="Data ditemukan";
    $response["data"] = array();

    // fungsi perulangan
    while ($row = mysqli_fetch_array($hasil)) {

       $pl = array();

       $pl["id_proker"] = $row["id_proker"];
       $pl["id_sie"] = $row["id_sie"];
       $pl["jenis_sie"] = $row["jenis_sie"];

       array_push($response["data"], $pl);

   }

   echo json_encode($response);

} else {  
   $response['result']= "false" ;
   $response['msg']="maaf,terjadi kesalahan";
}

?>