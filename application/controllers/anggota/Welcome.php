<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_panitia');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Admin_login','refresh');
		}		
	} 

	public function index()
	{
		$nav_ses=0;
		$paket['array']=$this->mdl_data_panitia->ambildata();		
		$this->session->set_userdata('ses_nav_proker',$nav_ses); 
		$this->load->view('anggota/index', $paket);
	}
}
