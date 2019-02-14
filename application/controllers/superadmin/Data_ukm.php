<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ukm extends CI_Controller {
public function __construct()//MEMPERSIAPKAN
		{
			parent::__construct();
			$this->load->helper('url','form');
			$this->load->model('mdl_data_ukm');
			$this->load->library('form_validation');
		}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('superadmin/data_ukm');
	}


	public function tampilData(){
		$paket['array']=$this->mdl_data_ukm->ambildata();	
		$this->load->view('superadmin/data_ukm',$paket);
	}
}
