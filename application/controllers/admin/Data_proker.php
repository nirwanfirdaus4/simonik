<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_proker extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
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

	public function index(){
		$paket['array']=$this->mdl_data_proker->ambildata();	
		$this->load->view('admin/data_proker',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_proker','Nama Bidang','trim|required');
		$this->form_validation->set_rules('tgl_proker','Tanggal Proker','trim|required');

		$value['id_proker']=$this->input->post('id_proker');
		$value['id_bidang']=$this->input->post('id_bidang');

		if ($this->form_validation->run()==FALSE || $value['id_proker']=='zero' ||$value['id_bidang']=='zero') {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('admin/vtambah_proker',$data);
		}
		else{
			$send['id_proker']='';
			$send['nama_proker']=$this->input->post('nama_proker');
			$send['ketua_proker']=$this->input->post('nm_ketua_proker');
			$send['tanggal_proker']=$this->input->post('tgl_proker');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_bidang']=$this->input->post('nm_bidang');

			// var_dump($send);
			$kembalian['jumlah']=$this->mdl_data_proker->tambahdata($send);
			$kembalian['array']=$this->mdl_data_proker->ambildata();
						
			$this->load->view('admin/data_proker',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('admin/Data_proker/');
		}
	}

	public function do_delete($id){
		$where = array('id_proker' => $id);
		$this->mdl_data_proker->delete_data($where,'tb_daftar_proker');
		redirect('admin/Data_proker/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('nama_proker','Nama Bidang','trim|required');
		$this->form_validation->set_rules('tgl_proker','Tanggal Proker','trim|required');

		$value['nm_ketua_proker']=$this->input->post('nm_ketua_proker');
		$value['id_bidang']=$this->input->post('id_bidang');

		if ($this->form_validation->run()==FALSE || $value['nm_ketua_proker']=='zero' ||$value['id_bidang']=='zero') {
			$indexrow['data']=$this->mdl_data_proker->ambildata2($id_update);
			$this->load->view('admin/vedit_proker', $indexrow);
		}
		else{
			$send['id_proker']=$this->input->post('id_proker');;
			$send['nama_proker']=$this->input->post('nama_proker');
			$send['nm_ketua_proker']=$this->input->post('nm_ketua_proker');
			$send['tgl_proker']=$this->input->post('tgl_proker');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['nm_bidang']=$this->input->post('nm_bidang');
			
			$kembalian['jumlah']=$this->mdl_data_proker->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('admin/Data_proker');
		}
	}
	
}
