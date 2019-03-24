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
		$periode=$this->session->userdata('ses_periode');
		$paket['periode']=$this->mdl_referensi->ambil_periode();
		$this->load->view('bph/data_referensi',$paket);
	}
	public function tampil()
	{
		$periode=$this->input->post('nm_periode');
		$paket['periode']=$this->mdl_referensi->ambil_periode();
		if ($periode=='zero') {
			$this->load->view('bph/data_referensi',$paket);
		}else{
			$paket['array']=$this->mdl_referensi->ambildata($periode);
			$this->load->view('bph/data_referensi_tampil',$paket);
		}
	}

}
