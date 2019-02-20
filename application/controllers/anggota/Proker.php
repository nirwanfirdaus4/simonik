<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_sie_anggota');
		$this->load->model('mdl_data_panitia');		
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Admin_login','refresh');
		}		
	} 
 
	public function index_proker($proker)
	{	
		$nav_ses=1;
		$data['id'] = $proker;
		$data['array'] = $this->mdl_data_sie_anggota->ambildata($proker);
		$data['convert_sie'] = $this->mdl_data_sie_anggota->convert_sie();
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$this->load->view('anggota/proker',$data);
	}
	public function index_sie($sie)
	{	
		$nav_ses=1;
		$data['id'] = $proker;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$data['array'] = $this->mdl_data_sie_anggota->ambildata_sie($sie);
		// $data['convert_sie'] = $this->mdl_data_sie_anggota->convert_sie();
		$this->load->view('anggota/jobdesk_sie',$data);
	}
	public function back_index()
	{	
		$nav_ses=0;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$paket['array']=$this->mdl_data_panitia->ambildata();			
		$this->load->view('anggota/index',$paket);
	}



}
