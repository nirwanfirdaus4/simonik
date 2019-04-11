<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Dashboard extends REST_Controller {

    function all_get(){
        // $query_panitia= $this->db->query("SELECT * FROM tb_panitia_proker WHERE id_user=16");
        // $query_proker= $this->db->query("SELECT * FROM tb_daftar_proker");
        $query_proker = $this->db->query("SELECT * FROM tb_daftar_proker");
        $query_sie = $this->db->query("SELECT * FROM tb_sie");
        // $query = $this->db->query("SELECT * FROM tb_panitia_proker WHERE id_user=16");
        $query_0 ="SELECT * FROM tb_panitia_proker WHERE id_user=16";
        $con=mysqli_connect("localhost","root","","simonik");
        $result=mysqli_query($con,$query_0);


if(mysqli_num_rows($result)> 0){

    $response['status']= "success" ;
    $response['message']="Data ditemukan";
    $response["result"] = array();       

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

           array_push($response["result"], $pl);

      }

  // return
   echo json_encode($response);

      }else{
          $response['status']= "false" ;
          $response['message']="maaf,terjadi kesalahan";       
      }
    }

    function loginProses($dataPanitia){

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






























    function all_post() {
        $action  = $this->post('action');
        $dataPanitia = array(
                     'id_panitia'   => $this->post('id_panitia'),
                     'id_proker' => $this->post('id_proker'),
                       'id_ukm' => $this->post('id_ukm'),
                       'id_periode' => $this->post('id_periode'),
                       'id_user' => $this->post('id_user'),
                       'id_sie' => $this->post('id_sie'),
                       'jenis_panitia' => $this->post('jenis_panitia')
                  );
        switch ($action) {
            case 'insert':
                $this->insertUser($dataPanitia);
                break;           
            case 'update':
                $this->updateUser($dataPanitia);
                break;           
            case 'delete':
                $this->deleteUser($dataPanitia);
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

    function insertUser($dataPanitia){
     // Cek validasi
      if (empty($dataPanitia['username']) || empty($dataPanitia['password']) || empty($dataPanitia['nama']) || empty($dataPanitia['jk']) || empty($dataPanitia['email'])){
          $this->response(
             array(
                 "status" => "failed",
                 "message" => "Mohon Lengkapi Data"
             )
         );
      } else {
         $do_insert = $this->db->insert('user', $dataPanitia);
         if ($do_insert){
             $this->response(
                 array(
                     "status" => "success",
                     "result" => array($dataPanitia),
                     "message" => $do_insert
                 )
             );
            }
      }
    }

    function updateUser($dataPanitia){
     // Cek validasi
      if (empty($dataPanitia['username']) || empty($dataPanitia['password']) || empty($dataPanitia['nama']) || empty($dataPanitia['jk']) || empty($dataPanitia['email'])){
         $this->response(
             array(
                 "status" => "failed",
                 "message" => "Mohon Lengkapi Data"
             )
         );
      } else {
         // Cek apakah ada di database
         $getUser_baseID = $this->db->query("
             SELECT 1
             FROM user
             WHERE idUser =  {$dataPanitia['idUser']}")->num_rows();
          if($getUser_baseID === 0){
             // Jika tidak ada
             $this->response(
                 array(
                     "status"  => "failed",
                       "message" => "ID User tidak ditemukan"
                 )
             );
          } else {
                    $update = $this->db->query("
                        UPDATE user
                        SET
                            username = '{$dataPanitia['username']}',
                            password = '{$dataPanitia['password']}',
                            nama = '{$dataPanitia['nama']}',
                            jk = '{$dataPanitia['jk']}',
                            email = '{$dataPanitia['email']}'
                        WHERE idUser = {$dataPanitia['idUser']}"
                    );      
              if ($update){
                 $this->response(
                     array(
                         "status"    => "success",
                         "result"    => array($dataPanitia),
                         "message"   => $update
                     )
                 );
                }
         }   
     }
    }

    function deleteUser($dataPanitia){
        if (empty($dataPanitia['idUser'])){
         $this->response(
             array(
                 "status" => "failed",
                 "message" => "ID User harus diisi"
             )
         );
      } else {
         // Cek apakah ada di database
         $getUser_baseID =$this->db->query("
             SELECT 1
             FROM user
             WHERE idUser = {$dataPanitia['idUser']}")->num_rows();
          if($getUser_baseID > 0){       
                 $this->db->query("
                     DELETE FROM user
                     WHERE idUser = {$dataPanitia['idUser']}");
                 $this->response(
                     array(
                         "status" => "success",
                         "message" => "Data ID = " .$dataPanitia['idUser']. " berhasil dihapus"
                      )
                 );     
            } else {
                $this->response(
                    array(
                        "status" => "failed",
                        "message" => "ID Makanan tidak ditemukan"
                    )
                );
            }
      }
    }

    function login_post(){

       $usernmae = $this->post('username');
       $password = $this->post('password');

       // Validasi
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user');

        if($result->num_rows() === 1){
            // Jika ada
               $this->response(
                   array(
                       "status"  => "success", 
                       "result" => $result->row(0)->idUser,
                       "message" => "User ditemukan"
                   )
               );
        } else {
            // Jika tidak ada
               $this->response(
                   array(
                       "status"  => "failed", 
                       "message" => "Username atau password salah"
                   )
               );
       }
  }

}
