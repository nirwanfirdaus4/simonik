<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_panitia extends CI_Controller {

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
 
	public function index_panitia($proker)
	{	
		$nav_ses=1;
		$data['id'] = $proker;
		$data['panitia'] = $this->mdl_data_panitia->ambildata();
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$this->load->view('anggota/data_panitia',$data);
	}
	
	public function tambahData($proker)
	{
		$nav_ses=1;
		$data['id']=$proker;
		
		$this->session->set_userdata('ses_nav_proker',$nav_ses);

		$value['id_user']=$this->input->post('nm_koor');
		$value['id_sie']=$this->input->post('nm_sie');
		$value['jenis_sie']=$this->input->post('jenis_sie');

		if ($this->form_validation->run()==FALSE || $value['id_user']=='zero' ||$value['id_sie']=='zero' || $value['jenis_sie']) {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('anggota/vtambah_panitia',$data); 
		}
		else{
			$send['id_panitia']='';
			$send['id_proker']=$this->input->post('id_proker');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['id_user']=$this->input->post('nm_koor');
			$send['id_sie']=$this->input->post('nm_sie');
			$send['jenis_panitia']=$this->input->post('jenis_sie');

			var_dump($send);
			// $kembalian['jumlah']=$this->mdl_data_proker->tambahdata($send);
			// $kembalian['array']=$this->mdl_data_proker->ambildata();
						
			// $this->load->view('admin/data_proker',$kembalian);
			// $this->session->set_flashdata('msg','Data berhasil ditambahkan');
			// redirect('admin/Data_proker/');
		}
	}

}
