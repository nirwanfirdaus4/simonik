<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_user extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Login');	

	}

	public function index()
	{
		$semua_jobdesk = $this->db->get_where('tb_jobdesk', array('status_jobdesk' => 'Belum Dikerjakan'))->result_array();

		foreach($semua_jobdesk as $jobdesk) {
			$deadline = $jobdesk['deadline'];

			$diff = abs(time() - strtotime($deadline));

			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			if($years == 0 && $months == 0 && $days >= 0 && $days <= 1) {
				$id_proker = $jobdesk['id_proker'];
				$id_sie = $jobdesk['id_sie']; 
				$id_ukm = $jobdesk['id_ukm'];

				$semua_panitia = $this->db->get_where('tb_panitia_proker', array('id_proker' => $id_proker, 'id_sie' => $id_sie, 'id_ukm' => $id_ukm))->result_array();

				foreach($semua_panitia as $panitia) {
					$tautan_notifikasi = site_url('anggota/Proker/index_detail/' . $jobdesk['id_jobdesk'] . '/' . $jobdesk['id_proker'] . '/' . $jobdesk['id_sie']);

					$data_notifikasi = array(
						'konten_notifikasi' => $jobdesk['nama_jobdesk'],
						'penerima_notifikasi' => $panitia['id_user'],
						'id_jobdesk' => $jobdesk['id_jobdesk'],
						'id_proker' => $jobdesk['id_proker'],
						'id_sie' => $jobdesk['id_sie'],
						'tipe_notifikasi' => 'website',
						'tautan_notifikasi' => $tautan_notifikasi
					);

					// Cek Notifikasi
					$tanggal_sekarang = date('Y-m-d', time());
					$cek_notifikasi = $this->db->query("SELECT * FROM tb_notifikasi WHERE tautan_notifikasi = '$tautan_notifikasi' AND tanggal_notifikasi LIKE '%" . $tanggal_sekarang . "%'")->result_array();

					if(count($cek_notifikasi) == 0) {
						$this->db->insert('tb_notifikasi', $data_notifikasi);
					}

				}
			}
		}
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
		// $cek_sie = $this->db->get('tb_jobdesk')->result(_array);
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
			$this->session->set_userdata('ses_ukm',$data['id_ukm']);
			$this->session->set_userdata('ses_nama',$data['nama_user']);				
			$this->session->set_userdata('ses_periode',$data['id_periode']);				
			// $this->session->set_userdata('ses_nama_utype',$nama_utype);				
			redirect(base_url("superadmin/Data_ukm"));

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
			// foreach ($cek_sie as $sie) {
			// 	$
			// }
			redirect(base_url("anggota/Welcome"));
		}

		else{
			$this->load->view('login');
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Login_user'));
	}		
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */