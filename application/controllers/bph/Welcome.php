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
			redirect('Admin_login','refresh');
		}		
	}

	public function index()
	{
		// $paket['array']=$this->mdl_data_proker->bph_ambildata_proker();
		$utype=$this->session->userdata('ses_id_user');
		$bidang = $this->db->query("SELECT * FROM tb_bidang where ketua_bidang=$utype OR sekretaris_bidang=$utype");
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
