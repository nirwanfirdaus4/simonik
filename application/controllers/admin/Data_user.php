<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_user_ukm');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Admin_login','refresh');
		}		
	}

	public function index(){
		$paket['array']=$this->mdl_data_user_ukm->ambildata();	
		$this->load->view('admin/data_user',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_user','Nama user','trim|required');
		$this->form_validation->set_rules('nim','Nim','trim|required');
		$this->form_validation->set_rules('id_ukm','ID UKM','trim|required');
		$this->form_validation->set_rules('no_telp_user','Telp user','trim|required');
		$this->form_validation->set_rules('email_user','Email user','trim|required');
		$this->form_validation->set_rules('id_type_user','Tipe user','trim|required');
		$this->form_validation->set_rules('id_periode','ID Periode','trim|required');

		$value['id_ukm']=$this->input->post('id_ukm');
		$value['id_periode']=$this->input->post('id_periode');
		$value['id_type_user']=$this->input->post('id_type_user');

		if ($this->form_validation->run()==FALSE || $value['id_type_user']=='zero' ||$value['id_periode']=='zero') {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('admin/vtambah_user',$data);
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


			$kembalian['jumlah']=$this->mdl_data_user_ukm->tambahdata($send);
			$kembalian['array']=$this->mdl_data_user_ukm->ambildata();
						
			$this->load->view('admin/data_user',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('admin/Data_user/');
		}
	}

	public function do_delete($id){
		$where = array('id_user' => $id);
		$this->mdl_data_user_ukm->delete_data($where,'tb_user');
		redirect('admin/Data_user/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('nama_user','Nama user','trim|required');
		$this->form_validation->set_rules('nim','Nim','trim|required');
		$this->form_validation->set_rules('id_ukm','ID UKM','trim|required');
		$this->form_validation->set_rules('no_telp_user','Telp user','trim|required');
		$this->form_validation->set_rules('email_user','Email user','trim|required');
		$this->form_validation->set_rules('id_type_user','Tipe user','trim|required');
		$this->form_validation->set_rules('id_periode','ID Periode','trim|required');
		
		$value['id_ukm']=$this->input->post('id_ukm');
		$value['id_periode']=$this->input->post('id_periode');
		$value['id_type_user']=$this->input->post('id_type_user');

		if($this->form_validation->run()==FALSE || $value['id_ukm']=='zero' || $value['id_type_user']=='zero' || $value['id_periode']=='zero'){
			$indexrow['data']=$this->mdl_data_user_ukm->ambildata2($id_update);
			$this->load->view('admin/vedit_user', $indexrow);
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

			$kembalian['jumlah']=$this->mdl_data_user_ukm->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('admin/Data_user');
		}
	}
	
}
