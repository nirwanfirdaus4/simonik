<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
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
 
	public function index(){
		// $paket['total_asset'] = $this->mdl_data_proker->hitungJumlahAsset();		
		$paket['array']=$this->mdl_data_proker->admin_ambildata_proker();	
		$this->load->view('admin/dashboard',$paket);
	}
}
