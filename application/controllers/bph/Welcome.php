<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_proker');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		
	}

	public function index()
	{
		// $paket['array']=$this->mdl_data_proker->bph_ambildata_proker();
		$utype=$this->session->userdata('ses_id_user');
		$bidang = $this->db->query("SELECT * FROM tb_bidang where ketua_bidang=$utype OR sekretaris_bidang=$utype");

		// UNTUK KEPERLUAN RATE
		foreach ($bidang->result() as $row_bidang) {
			if ($utype==$row_bidang->ketua_bidang || $utype==$row_bidang->sekretaris_bidang) {
				$fix_bidang=$row_bidang->id_bidang;			
			}
		}
		$ukm=$this->session->userdata('ses_ukm');
		$proker=$this->db->query("SELECT * FROM tb_daftar_proker where id_ukm=$ukm AND id_bidang=$fix_bidang");
		
		$tgl_sekarang=date('Y-m-d');
		foreach ($proker->result() as $row_proker) {
			$tgl_acara=$row_proker->tanggal_proker;
			$proker_selesai=$row_proker->id_proker;	
			$limit=date('Y-m-d',strtotime('+5 days', strtotime($tgl_acara)));
			if ($tgl_sekarang>$tgl_acara && $tgl_sekarang<$limit) {

				$cek_rating=$this->db->query("SELECT * FROM tb_rating where id_ukm=$ukm AND id_proker=$proker_selesai");
				foreach ($cek_rating->result() as $cek) {
					$hasil_cek=$cek->rate;
				}	
				if ($hasil_cek<=0) {
					$this->session->set_userdata('ses_date_rate',$tgl_acara);			
					$isi_rate=1;
				}else{
					$isi_rate=0;
				}
			}else{
					//untuk mencegah error jika tidak ada yg dihasilkan dari query $proker
					$isi_rate=0;				
			}
		}

		if ($isi_rate==1) {
			$query_proker=$this->db->query("SELECT * FROM tb_daftar_proker where id_proker=$proker_selesai");
			foreach ($query_proker->result() as $key) {
				$send['nama_proker']=$key->nama_proker;
			}
			$this->load->view('bph/rating',$send);			
		}else{
			foreach ($bidang->result() as $row_bidang) {
				if ($utype==$row_bidang->ketua_bidang || $utype==$row_bidang->sekretaris_bidang) {
					$fix_bidang=$row_bidang->id_bidang;
					$page='bph/dashboard';
					$paket['array']=$this->mdl_data_proker->ambildata_bph_dashboard($fix_bidang);			
				}else{
					$page='bph/data_proker_error';
				}
			}
			$this->load->view($page,$paket);			
		}	
	}
}
