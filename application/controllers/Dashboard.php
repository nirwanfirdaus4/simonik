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


    function muse_post(){

        $nim  = $this->post('nim');

        $query_data=$this->db->query("SELECT * FROM tb_user where nim=$nim");      

        foreach ($query_data->result() as $key_data) {
           $data_nama= $key_data->nama_user;
        }

            $this->response(
               array(
                   "status" => "success",
                   "message" => "jos",
                   "result" => $data_nama
               )
            );

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


// function updatePanitia($dataPanitia){
//      // Cek validasi
//       if (empty($dataPanitia['idPanitia'])){
//          $this->response(
//              array(
//                  "status" => "failed",
//                  "message" => "Mohon Lengkapi Data"
//              )
//          );
//       } else {
//          // Cek apakah ada di database
//          $getUser_baseID = $this->db->query("
//              SELECT *
//              FROM tb_panitia_proker
//              WHERE id_panitia =  {$dataPanitia['idPanitia']} AND jenis_panitia = 'Ketua Pelaksana'")->num_rows();
//           if($getUser_baseID == 0){
//              // Jika tidak ada
//              $this->response(
//                  array(
//                      "status"  => "failed",
//                        "message" => "Anda belum menambahkan sie"
//                  )
//              );
//           } else {
//                     $update = $this->db->query("
//                         SELECT * FROM tb_panitia_proker where
//                             id_panitia = '{$dataPanitia['idPanitia']}',
//                         WHERE idUser = {$dataPanitia['idUser']}"
//                     );      
//               if ($update){
//                  $this->response(
//                      array(
//                          "status"    => "success",
//                          "result"    => array($dataPanitia),
//                          "message"   => $update
//                      )
//                  );
//                 }
//          }   
//      }
//     }


    function all_post() {
        $action  = $this->post('action');
        $dataPanitia = array(
                     'idPanitia'   => $this->post('idPanitia'),
                     'idProker' => $this->post('idProker'),
                     'idSie' => $this->post('idSie'),
                     'idUkm' => $this->post('idUkm'),
                     'idPeriode' => $this->post('idPeriode'),
                     'idUser' => $this->post('idUser'),
                     'idJenisPanitia' => $this->post('idJenisPanitia'),
                     'idProkerRaw' => $this->post('idProkerRaw'),
                     'idSieRaw' => $this->post('idSieRaw')
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


    function updateUser($dataPanitia){
     // Cek validasi
      if (empty($dataPanitia['idPanitia']) || empty($dataPanitia['idProker']) || empty($dataPanitia['idSie']) || empty($dataPanitia['idUkm']) || empty($dataPanitia['idPeriode']) || empty($dataPanitia['idUser']) || empty($dataPanitia['idJenisPanitia']) || empty($dataPanitia['idProkerRaw']) || empty($dataPanitia['idSieRaw'])){
         $this->response(
             array(
                 "status" => "failed",
                 "message" => "Mohon Lengkapi Data"
             )
         );
      } else {
         // Cek apakah ada di database
         $getUser_baseID = $this->db->query("
             SELECT *
             FROM tb_panitia_proker
             WHERE id_panitia =  {$dataPanitia['idPanitia']}")->num_rows();
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
                        UPDATE tb_panitia_proker
                        SET
                            id_proker = {$dataPanitia['idProkerRaw']},
                            id_periode = '{$dataPanitia['idPeriode']}'
                        WHERE id_panitia = {$dataPanitia['idPanitia']}"
                    );      
              if ($update){

                 $dataHasil = array();
                
                 $dataHasil["id_panitia"] = $dataPanitia["idPanitia"];
                 $dataHasil["id_ukm"] = $dataPanitia["idUkm"];
                 $dataHasil["id_periode"] = $dataPanitia["idPeriode"];
                 $dataHasil["id_user"] = $dataPanitia["idUser"];
                 $dataHasil["id_sie"] = $dataPanitia["idSie"];
                 $dataHasil["jenis_panitia"] = $dataPanitia["idJenisPanitia"];
                 $dataHasil["id_proker_raw"] = $dataPanitia["idProkerRaw"];
                 $dataHasil["id_sie_raw"] = $dataPanitia["idSieRaw"];
                 $this->response(
                     array(
                         "status"    => "success",
                         "result"    => array($dataHasil),
                         "message"   => $update
                     )
                 );
                }
         }   
     }
    }

    function insertUser($dataPanitia){
     // Cek validasi
      if (empty($dataPanitia['idProker']) || empty($dataPanitia['idSie']) || empty($dataPanitia['idUkm']) || empty($dataPanitia['idPanitia']) || empty($dataPanitia['idJenisPanitia'])){
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

  //   function login_post(){

  //      $usernmae = $this->post('username');
  //      $password = $this->post('password');

  //      // Validasi
  //       $this->db->where('username', $username);
  //       $this->db->where('password', $password);

  //       $result = $this->db->get('user');

  //       if($result->num_rows() === 1){
  //           // Jika ada
  //              $this->response(
  //                  array(
  //                      "status"  => "success", 
  //                      "result" => $result->row(0)->idUser,
  //                      "message" => "User ditemukan"
  //                  )
  //              );
  //       } else {
  //           // Jika tidak ada
  //              $this->response(
  //                  array(
  //                      "status"  => "failed", 
  //                      "message" => "Username atau password salah"
  //                  )
  //              );
  //      }
  // }

}
