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
	public function auth_bph($username,$password)
	{
		$query=$this->db->query("SELECT * FROM tb_user where username='$username' AND password='$password' AND id_type_user=3");
		return $query;
	}	
	public function auth_divisi($username,$password)
	{
		$query=$this->db->query("SELECT * FROM tb_user where username='$username' AND password='$password' AND id_type_user=7");
		return $query;
	}	
	public function auth_anggota($username,$password)
	{
		$query=$this->db->query("SELECT * FROM tb_user where username='$username' AND password='$password' AND id_type_user=8");
		return $query;
	}	
	// public function auth_utype($username,$password)
	// {
	// 	$query=$this->db->query("SELECT * FROM tb_type_user");
	// 	return $query;
	// }
	// public function ambildata()
	// {
	// 	$query=$this->db->query("SELECT * FROM tb_type_user");
	// 	return $query->result_array();
	// }		
}

/* End of file Login.php */
/* Location: ./application/models/Login.php */