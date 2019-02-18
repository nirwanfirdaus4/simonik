<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	public function auth_super_admin($username,$password)
	{
		$query=$this->db->query("SELECT * FROM tb_user where username='$username' AND password='$password' AND id_type_user=1");
		return $query;
	}	
	public function auth_admin($username,$password)
	{
		$query=$this->db->query("SELECT * FROM tb_user where username='$username' AND password='$password' AND id_type_user=2");
		return $query;
	}	
}

/* End of file Login.php */
/* Location: ./application/models/Login.php */