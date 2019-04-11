<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_bidang extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_bidang');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		
	}

	public function index(){
		$paket['array']=$this->mdl_data_bidang->ambildata();	
		$this->load->view('admin/data_bidang',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_bidang','Nama Bidang','trim|required');
		$id_bidang = "t1" . md5(time());
		$value['id_user']=$this->input->post('id_user');
		$value['id_periode']=$this->input->post('id_periode');

		if ($this->form_validation->run()==FALSE || $value['id_user']=='zero' ||$value['id_periode']=='zero') {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('admin/vtambah_bidang',$data);
		}
		else{
			$send['id_bidang']=$id_bidang;
			$send['nama_bidang']=$this->input->post('nama_bidang');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['ketua_bidang']=$this->input->post('nm_ketua_bidang');
			$send['sekretaris_bidang']=$this->input->post('nm_sekretaris_bidang');

			$kembalian['jumlah']=$this->mdl_data_bidang->tambahdata($send);
			$kembalian['array']=$this->mdl_data_bidang->ambildata();
						
			$this->load->view('admin/data_bidang',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('admin/Data_bidang/');
		}
	}

	public function do_delete($id){
		$where = array('id_bidang' => $id);
		$this->mdl_data_bidang->delete_data($where,'tb_bidang');
		redirect('admin/Data_bidang/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('nama_bidang','Nama Bidang','trim|required');
		$this->form_validation->set_rules('nm_ketua_bidang','Nama Bidang','trim|required');
		$this->form_validation->set_rules('nm_sekretaris_bidang','Nama Bidang','trim|required');
		
		$value['id_user']=$this->input->post('id_user');
		$value['id_periode']=$this->input->post('id_periode');

		if($this->form_validation->run()==FALSE || $value['id_user']=='zero' || $value['id_periode']=='zero'){
			$indexrow['data']=$this->mdl_data_bidang->ambildata2($id_update);
			$this->load->view('admin/vedit_bidang', $indexrow);
		}
		else{
			$send['id_bidang']=$this->input->post('id_bidang');
			$send['nama_bidang']=$this->input->post('nama_bidang');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['nm_ketua_bidang']=$this->input->post('nm_ketua_bidang');
			$send['nm_sekretaris_bidang']=$this->input->post('nm_sekretaris_bidang');
			// var_dump($send);
			$kembalian['jumlah']=$this->mdl_data_bidang->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('admin/Data_bidang');
		}
	}
	
}
