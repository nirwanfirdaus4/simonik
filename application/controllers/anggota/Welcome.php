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
			redirect('Login_user','refresh');
		}		
	} 

	public function index()
	{ 
		$nav_ses=0;
		$paket['color1']='#8e44ad';
		$paket['color2']='#2980b9';
		$paket['color3']='#c0392b';
		$paket['color4']='#27ae60';
		$paket['color5']='#d35400';
		$paket['color6']='#16a085';
		$paket['color7']='#cc0f80';
		$paket['color8']='#504f45';
		$paket['color9']='#deb617';
		$paket['color10']='#7f8c8d';
		$paket['array']=$this->mdl_data_panitia->ambildata();		
		$this->session->set_userdata('ses_nav_proker',$nav_ses); 
		$this->load->view('anggota/index', $paket);
	}
}
