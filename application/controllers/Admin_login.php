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
 
		$cek_super_admin = $this->Login->auth_super_admin($username,$password);
		$cek_admin = $this->Login->auth_admin($username,$password);
		$cek_bph = $this->Login->auth_bph($username,$password);
		$cek_divisi = $this->Login->auth_divisi($username,$password);
		$cek_anggota = $this->Login->auth_anggota($username,$password);
		// $cek_utype = $this->Login->ambildata();

		if ($cek_super_admin->num_rows() > 0) {
			$data=$cek_super_admin->row_array();

			// foreach ($cek_utype as $key) {
			// 	if ($key['nama_type_user']=='Super admin') {
			// 		$nama_utype=$key['nama_type_user'];
			// 	}
			// }
				
			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_id_type_user',$data['id_type_user']);				
			$this->session->set_userdata('ses_nama',$data['nama_user']);				
			$this->session->set_userdata('ses_periode',$data['id_periode']);				
			// $this->session->set_userdata('ses_nama_utype',$nama_utype);				
			redirect(base_url("Welcome"));

		}elseif ($cek_admin->num_rows() > 0) {
			$data=$cek_admin->row_array();

			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_id_type_user',$data['id_type_user']);			
			$this->session->set_userdata('ses_ukm',$data['id_ukm']);			
			$this->session->set_userdata('ses_nama',$data['nama_user']);
			$this->session->set_userdata('ses_periode',$data['id_periode']);				
			redirect(base_url("admin/Welcome"));
		}elseif ($cek_bph->num_rows() > 0) {
			$data=$cek_bph->row_array();

			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_id_user',$data['id_user']);				
			$this->session->set_userdata('ses_id_type_user',$data['id_type_user']);			
			$this->session->set_userdata('ses_ukm',$data['id_ukm']);			
			$this->session->set_userdata('ses_nama',$data['nama_user']);	
			$this->session->set_userdata('ses_periode',$data['id_periode']);
			redirect(base_url("bph/Welcome"));
		}elseif ($cek_divisi->num_rows() > 0) {
			$data=$cek_divisi->row_array();

			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_id_type_user',$data['id_type_user']);			
			$this->session->set_userdata('ses_ukm',$data['id_ukm']);			
			$this->session->set_userdata('ses_nama',$data['nama_user']);
			$this->session->set_userdata('ses_periode',$data['id_periode']);								
			redirect(base_url("divisi/Welcome"));
		}elseif ($cek_anggota->num_rows() > 0) {
			$data=$cek_anggota->row_array();

			$this->session->set_userdata('masuk',TRUE);
			$this->session->set_userdata('ses_id_type_user',$data['id_type_user']);			
			$this->session->set_userdata('ses_id_user',$data['id_user']);			
			$this->session->set_userdata('ses_ukm',$data['id_ukm']);			
			$this->session->set_userdata('ses_nama',$data['nama_user']);	
			$this->session->set_userdata('ses_periode',$data['id_periode']);							
			redirect(base_url("anggota/Welcome"));
		}

		else{
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