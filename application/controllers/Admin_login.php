<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Login');	
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function aksi_login(){

		$username = $this->input->post('username');
		$password = $this->input->post('password');
 
		$cek_super_admin = $this->Login->auth_admin($username,$password);

		if ($cek_super_admin->num_rows() > 0) {
			$data=$cek_super_admin->row_array();
				
			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_nama',$data['nama_user']);				
			redirect(base_url("Welcome"));

		}else{
			$this->load->view('login');
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Admin_login'));
	}		
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */