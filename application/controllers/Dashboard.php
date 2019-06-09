<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Dashboard extends REST_Controller {

  function all_post(){
    $idPanitia  = $this->post('idPanitia');
    $query_proker = $this->db->query("SELECT * FROM tb_daftar_proker");
    $query_sie = $this->db->query("SELECT * FROM tb_sie");
        // $query = $this->db->query("SELECT * FROM tb_panitia_proker WHERE id_user=16");
    $query_0 ="SELECT * FROM tb_panitia_proker WHERE id_user=$idPanitia";
    $con=mysqli_connect("localhost","root","","simonik");
    $result=mysqli_query($con,$query_0);


    if(mysqli_num_rows($result)> 0){

      $response['status']= "success" ;
      $response['message']="Data ditemukan";
      $response["result"] = array();       

      $image = array();

      $image[0]=1;
      $image[1]=2;
      $image[2]=3;
      $image[3]=4;

      $no=0;

      while ($row = mysqli_fetch_array($result)) {

       $pl = array();

       $pl["id_panitia"] = $row["id_panitia"];

       foreach ($query_proker->result() as $key_1) {
        if ($key_1->id_proker==$row["id_proker"]) {
          $convert_proker=$key_1->nama_proker;
        }
      }
      foreach ($query_sie->result() as $key_2) {
        if ($key_2->id_sie==$row["id_sie"]) {
          $convert_sie=$key_2->nama_sie;
        }
      }

      $pl["id_proker"] = $convert_proker;
      $pl["id_ukm"] = $row["id_ukm"];
      $pl["id_periode"] = $row["id_periode"];
      $pl["id_user"] = $row["id_user"];
      $pl["id_sie"] = $convert_sie;
      $pl["jenis_panitia"] = $row["jenis_panitia"];

      $pl["id_proker_raw"] = $row["id_proker"];
      $pl["id_sie_raw"] = $row["id_sie"];           
      $pl["warna"] = $image[$no];           

      array_push($response["result"], $pl);
      $no++;
      if ($no==4) {
        $no=0;
      }
    }

  // return
    echo json_encode($response);

  }else{
    $response['status']= "false" ;
    $response['message']="maaf,terjadi kesalahan";       
    echo json_encode($response);
  }
}


function muse_post(){

  $tanggal = date('Y-m-d');
  $bahan_bulan=substr($tanggal,5,2);

  if ($bahan_bulan=="01") {
      $bulan="Jan";
  }elseif ($bahan_bulan=="02") {
      $bulan="Feb";
  }elseif ($bahan_bulan=="03") {
      $bulan="Mar";
  }elseif ($bahan_bulan=="04") {
      $bulan="Apr";
  }elseif ($bahan_bulan=="05") {
      $bulan="Mei";
  }elseif ($bahan_bulan=="06") {
      $bulan="Jun";
  }elseif ($bahan_bulan=="07") {
      $bulan="Jul";
  }elseif ($bahan_bulan=="08") {
      $bulan="Agust";
  }elseif ($bahan_bulan=="09") {
      $bulan="Sept";
  }elseif ($bahan_bulan=="10") {
      $bulan="Okt";
  }elseif ($bahan_bulan=="11") {
      $bulan="Nov";
  }else{
      $bulan="Des";
  }

  $tanggal_sekarang= substr($tanggal,8,2)." - ".$bulan." - ".substr($tanggal,0,4);

  $id_user  = $this->post('idUser');
  $query_data=$this->db->query("SELECT * FROM tb_user where id_user=$id_user");      

  foreach ($query_data->result() as $key_data) {
   $data_nama= $key_data->nama_user;
 }

 $this->response(
   array(
     "status" => "success",
     "message" => "jos",
     "tanggal" => $tanggal_sekarang,
     "result" => $data_nama
   )
 );

}

function viewAnggota_post(){

  $id_proker  = $this->post('idProker');
  $id_sie  = $this->post('idSie');

        // $query_data=$this->db->query("SELECT id_user FROM tb_panitia_proker where id_proker=$id_proker AND id_sie=$id_sie");      
  $query_user=$this->db->query("SELECT * FROM tb_user");      

        // $query_0 ="SELECT id_user FROM tb_panitia_proker where id_proker=$id_proker AND id_sie=$id_sie";
        // $con=mysqli_connect("localhost","root","","simonik");
        // $result=mysqli_query($con,$query_0);

  $query_0 = $this->db->query("SELECT * FROM tb_panitia_proker where id_proker=$id_proker AND id_sie=$id_sie");

          // echo $id_proker."dan sie ".$id_sie;

  if($query_0->num_rows()> 0){

    $response['status']= "success" ;
    $response['message']="Data ditemukan";
    $response["result"] = array();       

        // while ($row = mysqli_fetch_array($result)) {
    foreach ($query_0->result() as $key_ua) {

     $bahan= $key_ua->id_user;

     foreach ($query_user->result() as $key_u) {
      if ($key_u->id_user==$bahan) {
        $nama_user=$key_u->nama_user;
        $email_user=$key_u->email_user;
        $nim=$key_u->nim;
        $jenisPanitia=$key_ua->jenis_panitia;
      }
    }


    $pl = array();

    $pl["nama_user"] = $nama_user;
    $pl["jenis_panitia"] = $jenisPanitia;

    array_push($response["result"], $pl);

  }

      // return
  echo json_encode($response);

}else{
  $response['status']= "false" ;
  $response['message']="Belum ada Anggota";       
  echo "Tidak Ada Data ";
}
}


function ubahProgres_post(){
  $id_jobdesk = $this->post('idJobdesk');      
  $status_jobdesk = $this->post('statusJobdesk');      
  $catatan_progres = $this->post('catatanProgres');      


  $update = $this->db->query("
   UPDATE tb_jobdesk SET
   status_jobdesk = '$status_jobdesk',
   catatan_progres = '$catatan_progres'
   WHERE id_jobdesk = $id_jobdesk");

        // $response['status']= "Sukses update progres";        

  if ($update){
   $this->response(
     array(
       "status"    => "Berhasil diubah"
     )
   );
 }

        // echo json_encode($response);
}

function laporan_post(){
  $id_jobdesk = $this->post('idJobdesk');

  $get_jobdesk=$this->db->query("SELECT * FROM tb_jobdesk where id_jobdesk=$id_jobdesk");

  foreach ($get_jobdesk->result() as $key) {
    $nama_jobdesk=$key->nama_jobdesk;
    $startline=$key->startline;
    $deadline=$key->deadline;
    $status_jobdesk=$key->status_jobdesk;
    $keterangan=$key->catatan_progres;        
  }

  if ($keterangan==null) {
    $keterangan_progres='Belum ada catatan progres';
  }else{
    $keterangan_progres=$keterangan;
  }

  $response['nama_jobdesk']= $nama_jobdesk ;
  $response['jobdesk_mulai']= $startline ;
  $response['jobdesk_deadline']= $deadline ;
  $response['status_progres']= $status_jobdesk ;
  $response['keterangan_progres']= $keterangan_progres ;
  echo json_encode($response);
}

function viewJobdesk_post(){

  $id_proker  = $this->post('idProker');
  $id_sie  = $this->post('idSie');

  $query_user=$this->db->query("SELECT * FROM tb_user");      
  $query_0 = $this->db->query("SELECT * FROM tb_jobdesk where id_proker=$id_proker AND id_sie=$id_sie");


  if($query_0->num_rows()> 0){

    $response['status']= "success" ;
    $response['message']="Data Ditemukan";
    $response["result"] = array();       


    foreach ($query_0->result() as $key_ua) {

     $pl = array();

     $pl["id_jobdesk"] = $key_ua->id_jobdesk;
     $pl["nama_jobdesk"] = $key_ua->nama_jobdesk;

     $hitung=strlen($pl["nama_jobdesk"]);

     if ($hitung<=26) {
      $shrink_namaJobdesk="no";
    }else{
      $shrink_text= substr($pl["nama_jobdesk"],0,23).'...';
      $shrink_namaJobdesk=$shrink_text;
    }
    $pl["shrink_jobdesk"] = $shrink_namaJobdesk;

    array_push($response["result"], $pl);

  }

      // return
  echo json_encode($response);

}else{
  $response['status']= "false" ;
  $response['message']="Belum ada Jobdesk";       
  echo "Tidak Ada Data ";
}
}


function sie_post(){

  $id_proker  = $this->post('idProker');
  $query_sie = $this->db->query("SELECT * FROM tb_sie");
  $query_ukm = $this->db->query("SELECT * FROM tb_ukm");
  $query_data=$this->db->query("SELECT DISTINCT id_sie FROM tb_panitia_proker where id_proker=$id_proker");      


  $query_0 ="SELECT DISTINCT id_sie FROM tb_panitia_proker where id_proker=$id_proker";
  $con=mysqli_connect("localhost","root","","simonik");
  $result=mysqli_query($con,$query_0);


  $response['status']= "success" ;
  $response['message']="Data sie didapat";
  $response["result"] = array();       

  $image = array();

  $image[0]=1;
  $image[1]=2;
  $image[2]=3;
  $image[3]=4;

  $no=0;

  while ($row = mysqli_fetch_array($result)) {

   $pl = array();

   $pl["id_sie"] = $row["id_sie"];
   $pl["warna"] = $image[$no];           
           // $pl["id_ukm"] = $row["id_ukm"];

   foreach ($query_sie->result() as $key_sie) {
    if ($key_sie->id_sie==$row["id_sie"]) {
      $convert_sie=$key_sie->nama_sie;
    }
  }

  $pl["sie_convert"] = $convert_sie;
           // $pl["ukm_convert"] = $convert_ukm;           

  array_push($response["result"], $pl);
  $no++;
  if ($no==4) {
    $no=0;
  }
}

  // return
echo json_encode($response);

}



function login_post($dataPanitia){

  if (empty($dataPanitia['username']) || empty($dataPanitia['password'])){
        // JIKA FIELD PADA FORM TIDAK D ISI
   $this->response(
     array(
       "status" => "failed",
       "message" => "Silahkan isi semua field"
     )
   );
 }else {
        // JIKA FIELD PADA FORM TELAH D ISI
   $username=$dataPanitia['username'];
   $query_user = $this->db->query("SELECT * FROM tb_user where username=$username");

   if ($query_user->num_rows() > 0) {

             // MEMASTIKAN BAHWA AKUN ANGGOTA
    foreach ($query_user->result() as $key_3) {
      $type_user= $key_3->id_type_user;
      if ($type_user==5) {
        $status='anggota';
        $id_user=$key_3->id_user;
      }else{
        $status='!anggota';
        $id_user=0;
      }
    }

         // RESPON SETELAH DIPASTIKAN
    if ($status=='anggota') {
              // JIKA AKUN OC
      $getLogin = $this->db->query("
        SELECT
        id_user,
        nama_user,
        id_type_user,
        id_periode,
        id_ukm
        FROM tb_user WHERE id_user=$id_user")->result();
      $this->response(
       array(
         "status" => "success",
         "result" => $getLogin
       )
     );

    }else{
              // JIKA AKUN BUKAN OC
      $this->response(
       array(
         "status" => "failed",
         "message" => "Anda Bukan Anggota Tingkat 1"
       )
     );
    }

  }else{
              // JIKA TIDAK ADA DATANYA
    $this->response(
     array(
       "status" => "failed",
       "message" => "Username atau Password salah"
     )
   );            
  }
}
}


function pdf_post() {
                 // $response["status"] = "success";  
                 // // $response["result"] = array($dataMakanan);  
                 // $response["message"] = $do_insert;
                 //  echo json_encode($response);
        // $action  = $this->post('action');
  $action  = "insert";
  $dataMakanan = array(
   'id_gambar'  => ' ',
   'gambar'     => $this->post('file')
 );
  switch ($action) {
    case 'insert':
    $this->insertMakanan($dataMakanan);
    break;           
    case 'update':
    $this->updateMakanan($dataMakanan);
    break;           
    case 'delete':
    $this->deleteMakanan($dataMakanan);
    break;          
    default:
    $this->response(
      array(
        "status"  =>"failed",
        "message" => "action harus diisi"
      )
    );
    break;
  }
}

function insertMakanan($laporan){

 $dataMakanan['gambar'] = $this->uploadPhoto();
 $do_insert = $this->db->insert('gambar', $dataMakanan);
 if ($do_insert){

             // $this->response(
                 // array(
                 //     "status" => "success",
                 //     "result" => array($dataMakanan),
                 //     "message" => $do_insert
                 // )
   $response["status"] = "success";  
                 // $response["result"] = array($dataMakanan);  
   $response["message"] = $do_insert;  
   echo json_encode($response);
             // );
 }else{
  $response["status"] = "gagal";
  echo json_encode($response);
}
}


function insertlaporan($laporan){

        // Cek validasi
  if (empty($laporan['action'])){
    $this->response(
      array(
        "status" => "failed",
        "message" => "Silahkan pilih file"
      )
    );
  } else {
    $laporan['id_gambar']='';
    $laporan['gambar'] = $this->uploadPhoto();

    $do_insert = $this->db->insert('gambar', $laporan);

    if ($do_insert){
      $this->response(
        array(
          "status" => "success",
          "result" => array($laporan),
          "message" => $do_insert
        )
      );
    }
  }
}



function uploadPhoto() {
        // Apakah user upload gambar?
  if ( isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0 ){
            // Foto disimpan di android_api/uploads
    $target_dir = "upload/";  
    $config['upload_path'] = realpath(FCPATH . $target_dir);
    $config['allowed_types'] = 'pdf';
         // Load library upload & helper
    $this->load->library('upload', $config);
    $this->load->helper('url');
         // Apakah file berhasil diupload?
    if ( $this->upload->do_upload('gambar')) {
               // jika berhasil, simpan nama file-nya
               // URL image yang disimpan adalah http://localhost/android_api/uploads/namafile

     $img_data = $this->upload->data();
               //-----edit ini------
             // $post_image = base_url(). $this->folder_upload .$img_data['file_name'];

     $post_image = $target_dir .$img_data['file_name'];
   } else {
             // Upload gagal, beri nama image dengan errornya
     $post_image = $this->upload->display_errors();        
   }
 } else {
         // Tidak ada file yang di-upload, kosongkan nama image-nya
   $post_image = '';
 }
 return $post_image;
     // return $config['upload_path'];
}

function uploadImage() {
  $target_dir = "upload/";  
  $target_file_name = $target_dir .basename($_FILES["file"]["name"]);  
  $response = array();  

    // Check if image file is an actual image or fake image  
  if (isset($_FILES["file"]))   
  {  
   if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name))   
   {  
     $success = true;  
     $message = "Successfully Uploaded";  
   }  
   else   
   {  
    $success = false;  
    $message = "Error while uploading";  
  }  
}  
else   
{  
  $success = false;  
  $message = "Required Field Missing";  
}  
$response["success"] = $success;  
$response["message"] = $message;  
echo json_encode($response);
}

function notifikasi_post() {
  $idUser=$this->post('idUser');
      // $idPeriode=$this->post('idPeriode');

  $query_cekProker = $this->db->query("SELECT * FROM tb_panitia_proker where id_user=$idUser");

  $volt=0;
  $json_jobdesk;
  $json_namaJobdesk;
  $json_idProker;
  $json_idSie;
  $json_jobdesk_voltk;
  $json_namaJobdesk_volt;
  $json_idProker_volt;
  $json_idSie_volt;

  $json_tipeNotifikasi;
  $json_tipeNotifikasi_volt;
  $json_notifikasi;
  $upload_penerimaNotifikasi;

  foreach ($query_cekProker->result() as $key) {

    $idProker=$key->id_proker;
    $idSie=$key->id_sie;

    if ($volt==1) {

    }else{
      $query_cekJobdesk = $this->db->query("SELECT * FROM tb_jobdesk where id_proker=$idProker AND id_sie=$idSie");

      foreach ($query_cekJobdesk->result() as $key2) {

        $idJobdesk=$key2->id_jobdesk;
        $namaJobdesk=$key2->nama_jobdesk;
        $startline=$key2->startline;
        $deadline=$key2->deadline;
        $tgl_sekarang=date('Y-m-d');          

        $cek_deadline=date('Y-m-d', strtotime('+1 days', strtotime($tgl_sekarang)));

        if ($cek_deadline==$deadline) {

          $query_cekNotif=$this->db->query("SELECT * FROM tb_notifikasi WHERE id_proker=$idProker AND id_sie=$idSie AND id_jobdesk=$idJobdesk AND tipe_notifikasi='android' AND penerima_notifikasi=$idUser");

          if ($query_cekNotif->num_rows() > 0) {
            $json_jobdesk= $idJobdesk;
            $json_namaJobdesk= $namaJobdesk;
            $json_idProker= $idProker;
            $json_idSie= $idSie;
            $json_notifikasi= "notifikasi_off";
            $json_tipeNotifikasi ="android";

          }else{

            $json_jobdesk_volt= $idJobdesk;
            $json_namaJobdesk_volt= $namaJobdesk;
            $json_idProker_volt= $idProker;
            $json_idSie_volt= $idSie;
            $json_tipeNotifikasi_volt ="android";
            $volt=1;
          }

        }else{
            $json_jobdesk= "zero";
            $json_namaJobdesk= "zero";
            $json_idProker= "zero";
            $json_idSie= "zero";
            $json_notifikasi= "notifikasi_off";
        }

      }
    }


  }


  if ($volt==0) {

    $notif['idJobdesk']= $json_jobdesk;
    $notif['namaJobdesk']= $json_namaJobdesk;
    $notif['idProker']= $json_idProker;
    $notif['idSie']= $json_idSie;
    $notif['notifikasi']= "notifikasi_off";
    $send['penerima_notifikasi'] = $idUser;
    echo json_encode($notif);

  }else{
    $send['id_jobdesk'] = $notif_volt['idJobdesk']= $json_jobdesk_volt;
    $send['konten_notifikasi'] = $notif_volt['namaJobdesk']= $json_namaJobdesk_volt;
    $send['id_proker'] = $notif_volt['idProker']= $json_idProker_volt;
    $send['id_sie'] = $notif_volt['idSie']= $json_idSie_volt;
    $send['tipe_notifikasi'] =$json_tipeNotifikasi_volt;
    $notif_volt['notifikasi']= "notifikasi_on";
    $send['penerima_notifikasi'] = $idUser;

    $do_insert = $this->db->insert('tb_notifikasi', $send);
    echo json_encode($notif_volt);
  }

}



}
