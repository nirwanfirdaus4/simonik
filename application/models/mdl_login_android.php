<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class mdl_login_android extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function LoginApi($username, $password)
    {
        $result = $this->db->query("SELECT
                                        id_user,
                                        nama_user,
                                        nim,
                                        username,
                                        password
                                    FROM
                                        tb_user
                                    WHERE
                                        username = '$username'
                                    AND password = '$password'");
        return $result->result();
    }
}