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
			redirect('Login_user','refresh');
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


		if ($this->form_validation->run()==FALSE || $this->input->post('id_ukm')=='zero' ||$this->input->post('id_periode')=='zero') {
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
			if ($send['id_type_user'] != 4) {
				$send['username']=$this->input->post('nim');
				$send['password']=$this->input->post('nim');			
			}

			if ($_FILES["berkas"]["name"] != ""){
				$config['upload_path']          = './upload/foto_user/';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 400;
				$config['file_name'] ="Foto_".$send['id_ukm']."_".$send['nim'].time();

				$this->load->library('upload', $config);

				$value['id_ukm']=$this->input->post('id_ukm');
				$value['id_periode']=$this->input->post('id_periode');
				$value['id_type_user']=$this->input->post('id_type_user');
				
				if ( ! $this->upload->do_upload('berkas')){
					$error =$this->upload->display_errors();
					$this->session->set_flashdata('msg',$error);
					$this->load->view('admin/vtambah_user');
				}else{
					$data = $this->upload->data();
					$send['foto_user']=$data['file_name'];					
				}	
			}
			
			$kembalian['jumlah']=$this->mdl_data_user_ukm->tambahdata($send);
			$kembalian['array']=$this->mdl_data_user_ukm->ambildata();

			$this->load->view('admin/data_user',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('admin/Data_user/');
		}
	}

	public function do_delete($id){
		$where = array('id_user' => $id);

		$query_cekFoto=$this->db->query("SELECT * FROM tb_user");

		foreach ($query_cekFoto->result() as $key) {
			if ($key->id_user==$id) {
				$file_foto=$key->foto_user;
			}
		}
		if ($file_foto!="") {
			$target= "upload/foto_user/".$file_foto;
			unlink($target);
		}


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
			if ($send['id_type_user'] != 7) {
				$send['username']=$this->input->post('nim');	
			}

			$current =$this->input->post('id_user');
			$query=$this->db->query("SELECT * FROM tb_user WHERE id_user=$current")->result_array();

			if ($_FILES["berkas"]["name"] != "" && $_FILES["berkas"]["name"] != $query[0]['foto_user']){
				$config['upload_path']          = './upload/foto_user/';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 400;
				$config['file_name'] ="Foto_".$send['id_ukm']."_".$send['nim'].time();

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('berkas')){ 
					$error =$this->upload->display_errors();
					// // var_dump($error);
					$this->session->set_flashdata('msg',$error);
					$indexrow['data']=$this->mdl_data_user_ukm->ambildata2($id_update);
					$this->load->view('admin/vedit_user', $indexrow);
				}else{
					$target= "upload/foto_user/".$query[0]['foto_user'];
					unlink($target);
					$data = $this->upload->data();
					$send['foto_user']=$data['file_name'];
				}
			}
			else{
				// $current =$this->input->post('id_user');
				// $query=$this->db->query("SELECT * FROM tb_user WHERE id_user=$current")->result_array();
				$send['foto_user']=$query[0]['foto_user'];
			}			
			$kembalian['jumlah']=$this->mdl_data_user_ukm->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('admin/Data_user');
		}
	}
	
}
