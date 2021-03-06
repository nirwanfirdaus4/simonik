<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_user');
		$this->load->model('mdl_data_sie');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		
	}

	public function index(){
		$paket['array']=$this->mdl_data_user->ambildata();	
		$paket['ukm']=$this->mdl_data_user->ambilDataUkm();	
		$this->load->view('superadmin/data_user',$paket);
	}
	public function detail($ukm){
		$paket['ukm_id']=$ukm;		
		$paket['array']=$this->mdl_data_user->ambildata_detail($ukm);	
		$paket['ukm']=$this->mdl_data_user->ambilDataUkm();	
		$this->session->set_userdata('ses_nav_ukm',$ukm);
		$this->load->view('superadmin/data_user',$paket); 
	}

	public function tambahData($ukm){
		$data['ukm_id']=$ukm;	 
		$this->form_validation->set_rules('nama_user','Nama user','trim|required');
		$this->form_validation->set_rules('nim','Nim','trim|required');
		$this->form_validation->set_rules('id_ukm','ID UKM','trim|required');
		$this->form_validation->set_rules('no_telp_user','Telp user','trim|required');
		$this->form_validation->set_rules('email_user','Email user','trim|required');
		$this->form_validation->set_rules('id_periode','ID Periode','trim|required');
		
		
		if ($this->form_validation->run()==FALSE || $this->input->post('id_ukm')=='zero' ||$this->input->post('id_periode')=='zero' || $this->input->post('id_uType')=='zero') {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('superadmin/vtambah_user',$data);
		}
		else{ 
			$send['id_user']='';
			$send['nama_user']=$this->input->post('nama_user');
			$send['nim']=$this->input->post('nim');
			$ukm=$send['id_ukm']=$this->input->post('id_ukm');
			$send['no_telp_user']=$this->input->post('no_telp_user');
			$send['email_user']=$this->input->post('email_user');
			$send['id_type_user']=$this->input->post('id_userType');
			$send['id_periode']=$this->input->post('id_periode');
			// echo "NILAI ".$this->input->post('id_userType');
			if ($send['id_type_user'] != 4) {
				$send['username']=$this->input->post('nim');
				$send['password']=$this->input->post('nim');			
			}else{
				$send['username']="";
				$send['password']="";							
			}

			$config['upload_path']          = './upload/foto_user/';
			$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
			$config['max_size']             = 400;
			$config['file_name'] ="Foto_".$send['id_ukm']."_".$send['nim'].time();
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			
			$this->load->library('upload', $config);

			$value['id_ukm']=$this->input->post('id_ukm');
			$value['id_periode']=$this->input->post('id_periode');

			if ($this->upload->do_upload('berkas')){

				$data = $this->upload->data();
				$send['foto_user']=$data['file_name'];

				$kembalian['jumlah']=$this->mdl_data_user->tambahdata($send);

				$kembalian['array']=$this->mdl_data_user->ambildata();

				$this->load->view('superadmin/data_user',$kembalian);
				$this->session->set_flashdata('msg','Data berhasil ditambahkan');
				redirect('superadmin/Data_user/detail/'.$ukm);

			}else{
				$kembalian['jumlah']=$this->mdl_data_user->tambahdata($send);

				$kembalian['array']=$this->mdl_data_user->ambildata();

				$this->load->view('superadmin/data_user',$kembalian);
				$this->session->set_flashdata('msg','Data berhasil ditambahkan');
				redirect('superadmin/Data_user/detail/'.$ukm);
			}	


			
		}
	}

	public function do_delete($id){
		$where = array('id_user' => $id);
		$ukm=$this->session->userdata('ses_nav_ukm');	
		$query = $this->db->get_where('tb_user',$where)->result_array();
		if ($query[0]['foto_user']!="") {
			$target= "upload/foto_user/".$query[0]['foto_user'];
			unlink($target);
		}

		$this->mdl_data_user->delete_data($where,'tb_user');
		redirect('superadmin/Data_user/detail/'.$ukm);
	}

	public function edit($id_update){
		$this->form_validation->set_rules('nama_user','Nama user','trim|required');
		$this->form_validation->set_rules('nim','Nim','trim|required');
		$this->form_validation->set_rules('id_ukm','ID UKM','trim|required');
		$this->form_validation->set_rules('no_telp_user','Telp user','trim|required');
		$this->form_validation->set_rules('email_user','Email user','trim|required');
		$this->form_validation->set_rules('id_periode','ID Periode','trim|required');
		
		$bahan_ukm=$this->session->userdata('ses_nav_ukm');
		$value['id_ukm']=$this->input->post('id_ukm');
		$value['id_periode']=$this->input->post('id_periode');
		$value['id_type_user']=$this->input->post('id_type_user');

		if($this->form_validation->run()==FALSE || $value['id_ukm']=='zero' || $value['id_type_user']=='zero' || $value['id_periode']=='zero'){
			$indexrow['data']=$this->mdl_data_user->ambildata2($id_update);
			$indexrow['ukm_id']=$bahan_ukm;
			$this->load->view('superadmin/vedit_user', $indexrow);
		}
		else{
			$send['id_user']=$this->input->post('id_user');
			$send['nama_user']=$this->input->post('nama_user');
			$send['nim']=$this->input->post('nim');
			$ukm=$send['id_ukm']=$this->input->post('id_ukm');
			$send['no_telp_user']=$this->input->post('no_telp_user');
			$send['email_user']=$this->input->post('email_user');
			$send['id_type_user']=$this->input->post('id_utype');
			$send['id_periode']=$this->input->post('id_periode');
			
			if ($send['id_type_user'] != 4) {
				$send['username']=$this->input->post('username');	
				$send['password']=$this->input->post('password');	
			}else{
				$send['username']="";
				$send['password']="";							
			}

			$current =$this->input->post('id_user');
			$query=$this->db->query("SELECT * FROM tb_user WHERE id_user=$current")->result_array();

			if ($_FILES["berkas"]["name"] != "" && $_FILES["berkas"]["name"] != $query[0]['foto_user']){
				$config['upload_path']          = './upload/foto_user/';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 400;
				$config['file_name'] ="Foto_".$send['id_ukm']."_".$send['nim'].time();				
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('berkas')){ 
					$error =$this->upload->display_errors();
					// // var_dump($error);
					$this->session->set_flashdata('msg',$error);
					$indexrow['data']=$this->mdl_data_user->ambildata2($id_update);
					$this->load->view('superadmin/vedit_user', $indexrow);
				}else{
					$target= "upload/foto_user/".$query[0]['foto_user'];
					unlink($target);
					$data = $this->upload->data();
					$send['foto_user']=$data['file_name'];

				}
			}else{
				$send['foto_user']=$query[0]['foto_user'];
			}
			$kembalian['jumlah']=$this->mdl_data_user->modelupdate($send); 
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('superadmin/Data_user/detail/'.$ukm);
			
		}
	}
	
}
