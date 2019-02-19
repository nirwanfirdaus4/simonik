<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jobdesk extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_jobdesk');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Admin_login','refresh');
		}		
	}

	public function index(){
		$paket['array']=$this->mdl_data_jobdesk->ambildata();	
		$this->load->view('anggota/data_jobdesk',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_jobdesk','Nama jobdesk','trim|required');

		$value['id_user']=$this->input->post('id_user');
		$value['id_periode']=$this->input->post('id_periode');

		if ($this->form_validation->run()==FALSE || $value['id_user']=='zero' ||$value['id_periode']=='zero') {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('anggota/vtambah_jobdesk',$data);
		}
		else{
			$send['id_jobdesk']='';
			$send['nama_jobdesk']=$this->input->post('nama_jobdesk');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['ketua_jobdesk']=$this->input->post('nm_ketua_jobdesk');
			$send['sekretaris_jobdesk']=$this->input->post('nm_sekretaris_jobdesk');

			$kembalian['jumlah']=$this->mdl_data_jobdesk->tambahdata($send);
			$kembalian['array']=$this->mdl_data_jobdesk->ambildata();
						
			$this->load->view('anggota/data_jobdesk',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('anggota/Data_jobdesk/');
		}
	}

	public function do_delete($id){
		$where = array('id_jobdesk' => $id);
		$this->mdl_data_jobdesk->delete_data($where,'tb_jobdesk');
		redirect('anggota/Data_jobdesk/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('nama_jobdesk','Nama jobdesk','trim|required');
		$this->form_validation->set_rules('nm_ketua_jobdesk','Nama jobdesk','trim|required');
		$this->form_validation->set_rules('nm_sekretaris_jobdesk','Nama jobdesk','trim|required');
		
		$value['id_user']=$this->input->post('id_user');
		$value['id_periode']=$this->input->post('id_periode');

		if($this->form_validation->run()==FALSE || $value['id_user']=='zero' || $value['id_periode']=='zero'){
			$indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id_update);
			$this->load->view('anggota/vedit_jobdesk', $indexrow);
		}
		else{
			$send['id_jobdesk']=$this->input->post('id_jobdesk');
			$send['nama_jobdesk']=$this->input->post('nama_jobdesk');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['nm_ketua_jobdesk']=$this->input->post('nm_ketua_jobdesk');
			$send['nm_sekretaris_jobdesk']=$this->input->post('nm_sekretaris_jobdesk');
			// var_dump($send);
			$kembalian['jumlah']=$this->mdl_data_jobdesk->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('anggota/Data_jobdesk');
		}
	}
	
}
