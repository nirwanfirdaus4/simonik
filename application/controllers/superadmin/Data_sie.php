<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_sie extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_sie');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Admin_login','refresh');
		}
	}

	public function index(){
		$paket['array']=$this->mdl_data_sie->ambildata();	
		$this->load->view('superadmin/data_sie',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_sie','Nama UKM','trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('superadmin/vtambah_sie');
		}
		else{
			$send['id_sie']='';
			$send['nama_sie']=$this->input->post('nama_sie');
			$send['id_ukm']=$this->input->post('id_ukm');
			$kembalian['jumlah']=$this->mdl_data_sie->tambahdata($send);
			$kembalian['array']=$this->mdl_data_sie->ambildata();
			$this->load->view('superadmin/data_sie',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('superadmin/Data_sie/');
		}
	}

	public function do_delete($id){
		$where = array('id_sie' => $id);
		$this->mdl_data_sie->delete_data($where,'tb_sie');
		redirect('superadmin/Data_sie/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('id_sie','ID SIE','trim|required');
		$this->form_validation->set_rules('nama_sie','Nama SIE','trim|required');

		if($this->form_validation->run()==FALSE){
			$indexrow['data']=$this->mdl_data_sie->ambildata2($id_update);
			$this->load->view('superadmin/vedit_sie', $indexrow);
		}
		else{
			$send['id_sie']=$this->input->post('id_sie');
			$send['nama_sie']=$this->input->post('nama_sie');
			$send['id_ukm']=$this->input->post('id_ukm');

			$kembalian['jumlah']=$this->mdl_data_sie->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('superadmin/Data_sie');
		}
	}
	
}
