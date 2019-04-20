<?php

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
use Restserver\Libraries\REST_Controller;

class Login_android extends REST_Controller {

    // Konfigurasi letak folder untuk upload image
    function user_get(){
        $get_transaksi = $this->db->query("SELECT * FROM tb_user")->result();
        $this->response(array("status"=>"success","result" => $get_transaksi));
    }

    function login_post(){
        $username      = $this->post('username');
        $password      = $this->post('password');

        $this->db->where('username',$username);
        $this->db->where('password',$password);

        $result = $this->db->get('tb_user');

        if ($result->num_rows() === 1) {
            $this->response(
                array(
                    "status"  =>"success",
                    "result" => $get_user->row(0)->id_user
                )
            );
        } else {
            $this->response(
                array(
                    "status"  =>"gagal login",
                    "result" =>null
                )
            );
        }

    }
}
?>