<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_user');
		$this->load->library('form_validation');
		$this->load->database();
	}

	public function index(){
		$paket['array']=$this->mdl_data_user->ambildata();	
		$this->load->view('superadmin/data_user',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_user','Nama user','trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('superadmin/vtambah_user');
		}
		else{
			$send['id_user']='';
			$send['nama_user']=$this->input->post('nama_user');
			$send['nim']=$this->input->post('nim');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['no_telp_user']=$this->input->post('no_telp_user');
			$send['email_user']=$this->input->post('email_user');
			$send['id_type_user']=$this->input->post('id_type_user');
			$send['id_periode']=$this->input->post('id_periode');


			$kembalian['jumlah']=$this->mdl_data_user->tambahdata($send);
			$kembalian['array']=$this->mdl_data_user->ambildata();
			$this->load->view('superadmin/data_user',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('superadmin/Data_user/');
		}
	}

	public function do_delete($id){
		$where = array('id_user' => $id);
		$this->mdl_data_user->delete_data($where,'tb_user');
		redirect('superadmin/Data_user/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('id_user','ID User','trim|required');
		$this->form_validation->set_rules('nama_user','Nama User','trim|required');
		$this->form_validation->set_rules('nim','NIM','trim|required');
		$this->form_validation->set_rules('id_ukm','UKM','trim|required');
		$this->form_validation->set_rules('no_telp_user','Telp User','trim|required');
		$this->form_validation->set_rules('email_user','Email User','trim|required');
		$this->form_validation->set_rules('id_type_user','Tipe User','trim|required');
		$this->form_validation->set_rules('id_periode','Periode','trim|required');
		
		if($this->form_validation->run()==FALSE){
			$indexrow['data']=$this->mdl_data_user->ambildata2($id_update);
			$this->load->view('superadmin/vedit_user', $indexrow);
		}
		else{
			$send['id_user']=$this->input->post('id_user');
			$send['nama_user']=$this->input->post('nama_user');
			$send['nim']=$this->input->post('nim');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['no_telp_user']=$this->input->post('no_telp_user');
			$send['email_user']=$this->input->post('email_user');
			$send['id_type_user']=$this->input->post('id_type_user');
			$send['id_periode']=$this->input->post('id_periode');

			$kembalian['jumlah']=$this->mdl_data_user->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('superadmin/Data_user');
		}
	}
	
}
