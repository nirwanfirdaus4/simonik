<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_referensi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_referensi');
		$this->load->library('form_validation'); 
		$this->load->database();		
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		
	}
	public function index()
	{
		$utype=$this->session->userdata('ses_id_user');
		$bidang = $this->db->query("SELECT * FROM tb_bidang where ketua_bidang=$utype OR sekretaris_bidang=$utype");		
		$periode=$this->session->userdata('ses_periode');

		if ($bidang->num_rows() > 0) {
			$paket['periode']=$this->mdl_referensi->ambil_periode();
			$this->load->view('bph/data_referensi',$paket);			
		}else{
			$this->load->view('bph/empty_status_bph');
		}
	}
	public function tampil()
	{
		$periode=$this->input->post('nm_periode');
		$paket['periode']=$this->mdl_referensi->ambil_periode();
		if ($periode=='zero') {
			$this->load->view('bph/data_referensi',$paket);
		}else{
			$paket['array']=$this->mdl_referensi->ambildata_proker($periode);
			$this->load->view('bph/data_referensi_tampil',$paket); 
		}
	}

	public function view_sie($proker)
	{
		$paket['array']=$this->mdl_referensi->ambildata_sie($proker);
		$this->load->view('bph/data_referensi_sie_tampil',$paket); 		
	}

}
