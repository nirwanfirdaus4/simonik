<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

	public function auth_admin($username,$password)
	{
		$query=$this->db->query("SELECT * FROM tb_user where username='$username' AND password='$password'");
		return $query;
	}	
}

/* End of file Login.php */
/* Location: ./application/models/Login.php */