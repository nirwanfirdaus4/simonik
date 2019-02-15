<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ukm extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_ukm');
		$this->load->library('form_validation');
		$this->load->database();
	}

	public function index(){
		$paket['array']=$this->mdl_data_ukm->ambildata();	
		$this->load->view('superadmin/data_ukm',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_ukm','Nama UKM','trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('superadmin/vtambah_ukm');
		}
		else{
			$send['id_ukm']='';
			$send['nama_ukm']=$this->input->post('nama_ukm');

			$kembalian['jumlah']=$this->mdl_data_ukm->tambahdata($send);
			$kembalian['array']=$this->mdl_data_ukm->ambildata();
			$this->load->view('superadmin/data_ukm',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('superadmin/Data_ukm/');
		}
	}

	public function do_delete($id){
		$where = array('id_ukm' => $id);
		$this->mdl_data_ukm->delete_data($where,'tb_user');
		$this->mdl_data_ukm->delete_data($where,'tb_ukm');
		redirect('superadmin/Data_ukm/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('id_ukm','ID UKM','trim|required');
		$this->form_validation->set_rules('nama_ukm','Nama UKM','trim|required');

		if($this->form_validation->run()==FALSE){
			$indexrow['data']=$this->mdl_data_ukm->ambildata2($id_update);
			$this->load->view('superadmin/vedit_ukm', $indexrow);
		}
		else{
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['nama_ukm']=$this->input->post('nama_ukm');

			$kembalian['jumlah']=$this->mdl_data_ukm->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('superadmin/Data_ukm');
		}
	}
	
}
