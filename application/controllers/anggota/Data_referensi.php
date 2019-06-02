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
	public function periode($proker,$sie,$sie_user)
	{
		$nav_ses=1;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);		
		$paket['ses_nav']=$nav_ses;
		$paket['ses_proker']=$proker;
		$paket['id_sie']=$sie_user;
		$paket['sie_id']=$sie; 

		$periode=$this->session->userdata('ses_periode');
		$paket['periode']=$this->mdl_referensi->ambil_periode();
		$this->load->view('anggota/data_referensi',$paket);
	}
	public function tampil($proker,$sie,$sie_user)
	{
		$nav_ses=1;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);		
		$paket['ses_nav']=$nav_ses;
		$paket['ses_proker']=$proker;
		$paket['id_sie']=$sie_user;
		$paket['sie_id']=$sie; 

		$periode=$this->input->post('nm_periode');
		$paket['periode']=$this->mdl_referensi->ambil_periode();
		if ($periode=='zero') {
			$this->load->view('anggota/data_referensi',$paket);
		}else{			
			$paket['array']=$this->mdl_referensi->anggota_ambildata($periode,$proker);
			$this->load->view('anggota/data_referensi_tampil',$paket);
		}
	}

}
