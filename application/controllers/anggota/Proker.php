<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Admin_login','refresh');
		}		
	}

	public function index()
	{	
		$nav_ses=1;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$this->load->view('anggota/proker');
	}
	public function back_index()
	{	
		$nav_ses=0;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$this->load->view('anggota/index');
	}

}
