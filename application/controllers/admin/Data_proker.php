<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_proker extends CI_Controller {

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
		$paket['array']=$this->mdl_data_proker->ambildata();	
		$this->load->view('admin/data_proker',$paket);
	}

	public function tambahData(){
		// $this->form_validation->set_rules('nama_user','Nama user','trim|required');
		// $this->form_validation->set_rules('nim','Nim','trim|required');
		// $this->form_validation->set_rules('id_ukm','ID UKM','trim|required');
		// $this->form_validation->set_rules('no_telp_user','Telp user','trim|required');
		// $this->form_validation->set_rules('email_user','Email user','trim|required');
		// $this->form_validation->set_rules('id_type_user','Tipe user','trim|required');
		// $this->form_validation->set_rules('id_periode','ID Periode','trim|required');

		// $value['id_ukm']=$this->input->post('id_ukm');
		// $value['id_periode']=$this->input->post('id_periode');
		// $value['id_type_user']=$this->input->post('id_type_user');

		// if ($this->form_validation->run()==FALSE || $value['id_type_user']=='zero' || $value['id_ukm']=='zero' ||$value['id_periode']=='zero') {
		// 	$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('admin/vtambah_proker');
		// }
		// else{
		// 	$send['id_user']='';
		// 	$send['nama_user']=$this->input->post('nama_user');
		// 	$send['nim']=$this->input->post('nim');
		// 	$send['id_ukm']=$this->input->post('id_ukm');
		// 	$send['no_telp_user']=$this->input->post('no_telp_user');
		// 	$send['email_user']=$this->input->post('email_user');
		// 	$send['id_type_user']=$this->input->post('id_type_user');
		// 	$send['id_periode']=$this->input->post('id_periode');


		// 	$kembalian['jumlah']=$this->mdl_data_user->tambahdata($send);
		// 	$kembalian['array']=$this->mdl_data_user->ambildata();
						
		// 	$this->load->view('superadmin/data_user',$kembalian);
		// 	$this->session->set_flashdata('msg','Data berhasil ditambahkan');
		// 	redirect('superadmin/Data_user/');
		// }
	}
}
