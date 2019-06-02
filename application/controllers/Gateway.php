<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Gateway extends REST_Controller {


    function all_post() {
        $action  = $this->post('action');
        $dataPanitia = array(
                     'username'   => $this->post('username'),
                     'password' => $this->post('password'),
                  );
        switch ($action) {
            case 'login':
                $this->loginGateway($dataPanitia);
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


    function loginGateway($dataPanitia){

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
         $password=$dataPanitia['password'];
         $query_user = $this->db->query("SELECT * FROM tb_user where username='$username' and password='$password'");

          if ($query_user->num_rows() > 0) {

             // MEMASTIKAN BAHWA AKUN ANGGOTA
              foreach ($query_user->result() as $key) {
              $type_user= $key->id_type_user;
              if ($type_user==5) {
                    $status='anggota';
                    $id_user=$key->id_user;
              }else{
                    $status='!anggota';
                    $id_user=0;
              }
          }

         // RESPON SETELAH DIPASTIKAN

         if ($status=='anggota') {
              // JIKA AKUN OC
             $dataHasil = array();

              $getLogin = $this->db->query("
                    SELECT * FROM tb_user WHERE id_user=$id_user");


              foreach ($getLogin->result() as $keyLogin) {
                if ($keyLogin->id_user == $id_user) {

                 $dataHasil["username"] = $keyLogin->username;
                 $dataHasil["password"] = $keyLogin->password;
                 // $dataHasil["id_user"] = $keyLogin->id_user;
                 $dataHasil["id_user"] = $keyLogin->id_user;
                 // $dataHasil["id_type_user"] = $keyLogin->id_type_user;
                 // $dataHasil["id_ukm"] = $keyLogin->id_ukm;
                }
              }

               $this->response(
                   array(
                       "status" => "success",
                       "message" => "jos",
                       "idUser" => $dataHasil["id_user"]
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

}
