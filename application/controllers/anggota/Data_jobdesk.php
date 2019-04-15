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
			redirect('Login_user','refresh');
		}	 	
	}
 
	public function index(){		
		$paket['array']=$this->mdl_data_jobdesk->ambildata();	
		$this->load->view('anggota/data_jobdesk',$paket);
	}
	public function detail($proker,$sie,$sie_user){	
		$nav_ses=1;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);		
		$paket['ses_proker']=$proker;
		$paket['id_sie']=$sie_user;
		$paket['sie_id']=$sie; 
		$paket['jobdesk']=$this->mdl_data_jobdesk->ambildata_detail($proker,$sie);	
		$paket['sie']=$this->mdl_data_jobdesk->ambilDataSie();	
		// session ini berfungsi untuk fungsi delete dll		
		$this->session->set_userdata('ses_nav_sie',$sie);		
		$this->load->view('anggota/data_jobdesk',$paket);
		// echo 'proker '.$proker_selected;
		// echo '<br>sie '.$sie;
	}
	public function tambahData($proker,$sie,$sie_user){
		$nav_ses=1;
		$data['sie_id']=$sie;
		$paket['id_sie']=$sie_user;		
		$data['id_sie']=$sie_user;		
		$data['ses_proker'] = $proker;	
		// $this->session->set_userdata('ses_nav_proker',$nav_ses);		
		$data['sie_id']=$this->session->userdata('ses_nav_sie');	
		$data['ukm_id']=$this->session->userdata('ses_ukm');	
		$data['user_id']=$this->session->userdata('ses_id_user');	
		// VALIDASI
		$this->form_validation->set_rules('nama_jobdesk','Nama jobdesk','trim|required');
		$this->form_validation->set_rules('mulai','Mulai jobdesk','trim|required');
		$this->form_validation->set_rules('deadline','Deadline jobdesk','trim|required');
		$this->form_validation->set_rules('id_proker','Proker jobdesk','trim|required');
		$this->form_validation->set_rules('id_sie','Sie jobdesk','trim|required');
		$this->form_validation->set_rules('id_ukm','Ukm jobdesk','trim|required');
		$this->form_validation->set_rules('id_user','User jobdesk','trim|required');
		// $value['id_user']=$this->input->post('id_user');
		// $value['id_periode']=$this->input->post('id_periode');

		if ($this->form_validation->run()==FALSE) {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('anggota/vtambah_jobdesk',$data);
		}
		else{
			$send['id_jobdesk']='';
			$send['nama_jobdesk']=$this->input->post('nama_jobdesk');
			$send['startline']=$this->input->post('mulai');
			$send['deadline']=$this->input->post('deadline');
			// STATIS
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_proker']=$this->input->post('id_proker');
			$sie=$send['id_sie']=$this->input->post('id_sie');
			$send['id_user']=$this->input->post('id_user');
			$send['status_jobdesk']='Belum Dikerjakan';

			$kembalian['jumlah']=$this->mdl_data_jobdesk->tambahdata($send);
			$kembalian['array']=$this->mdl_data_jobdesk->ambildata();

			$this->load->view('anggota/data_jobdesk',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('anggota/Data_jobdesk/detail/'.$data['ses_proker'].'/'.$data['sie_id'].'/'.$data['id_sie']);
		}
	}

	public function do_delete($id,$proker,$sie,$sie_user){
		$where = array('id_jobdesk' => $id);
		$sie=$this->session->userdata('ses_nav_sie');		
		$this->mdl_data_jobdesk->delete_data($where,'tb_jobdesk');
		redirect('anggota/Data_jobdesk/detail/'.$proker.'/'.$sie.'/'.$sie_user);
	}

	public function edit($id_update,$proker,$sie,$sie_user){
		$nav_ses=1;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);		

		$data['sie_id']=$sie;		
		$data['id_sie']=$sie_user;		
		$data['ses_proker'] = $proker;		
		// $data['sie_id']=$this->session->userdata('ses_nav_sie');	
		$data['ukm_id']=$this->session->userdata('ses_ukm');	
		$data['user_id']=$this->session->userdata('ses_id_user');	
		// VALIDASI
		$this->form_validation->set_rules('nama_jobdesk','Nama jobdesk','trim|required');
		$this->form_validation->set_rules('mulai','Mulai jobdesk','trim|required');
		$this->form_validation->set_rules('deadline','Deadline jobdesk','trim|required');
		$this->form_validation->set_rules('id_proker','Proker jobdesk','trim|required');
		$this->form_validation->set_rules('id_sie','Sie jobdesk','trim|required');
		$this->form_validation->set_rules('id_ukm','Ukm jobdesk','trim|required');
		$this->form_validation->set_rules('id_user','User jobdesk','trim|required');

		if($this->form_validation->run()==FALSE){
			$data['data']=$this->mdl_data_jobdesk->ambildata2($id_update);
			$this->load->view('anggota/vedit_jobdesk', $data);

		}
		else{
			$send['id_jobdesk']=$this->input->post('id_jobdesk');
			$send['nama_jobdesk']=$this->input->post('nama_jobdesk');
			$send['startline']=$this->input->post('mulai');
			$send['deadline']=$this->input->post('deadline');
			// STATIS
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_proker']=$this->input->post('id_proker');
			$sie=$send['id_sie']=$this->input->post('id_sie');
			$send['id_user']=$this->input->post('id_user');
			$send['status_jobdesk']='Belum Dikerjakan';
			// var_dump($send);
			$kembalian['jumlah']=$this->mdl_data_jobdesk->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('anggota/Data_jobdesk/detail/'.$data['ses_proker'].'/'.$data['sie_id'].'/'.$data['id_sie']);
		}
	}

	public function update_status($id_update_status,$proker,$sie){
		$indexrow['id_sie']=$sie;
		$indexrow['ses_proker']=$proker;

		$this->form_validation->set_rules('id_jobdesk','ID Jobdesk', 'trim|required');
		$this->form_validation->set_rules('status_jobdesk','Status Jobdesk', 'trim|required');
		$indexrow['id_sie']=$sie;

		if($this->form_validation->run()== FALSE){
			$indexrow['id_new']=$id_update_status;
			$indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id_update_status);
			$this->load->view('anggota/view_detail', $indexrow);
		}
		else{
			$send['id_jobdesk']=$this->input->post('id_jobdesk');
			$send['status_jobdesk']=$this->input->post('status_jobdesk');

			$kembalian['jumlah']=$this->mdl_data_jobdesk->update_status($send);
			$this->session->set_flashdata('msg_update', 'Data Berhasil diupdate');
			$indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id_update_status);
			$this->load->view('anggota/view_detail', $indexrow);
		}
	}

	public function upload($id_upload,$proker,$sie){
		$this->form_validation->set_rules('id_jobdesk','Id Jobdesk','trim|required');
		$indexrow['id_sie']=$sie;
		$indexrow['ses_proker']=$proker;
				
		if($this->form_validation->run()==FALSE){
			$indexrow['id_new']=$id_upload;
			$indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id_upload);
			$this->load->view('anggota/view_detail', $indexrow);
		}
		else{
			$send['id_jobdesk']=$this->input->post('id_jobdesk');
			if ($_FILES["berkas"]["name"] != ""){
				$config['upload_path']          = './upload/berkas_laporan/';
				$config['allowed_types']        = 'pdf|PDF';
				$config['max_size']             = 400;
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('berkas')){ 
					$error =$this->upload->display_errors();
					// // var_dump($error);
					$this->session->set_flashdata('msg',$error);
					$indexrow['id_new']=$id_upload;
					$indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id_upload);
					$this->load->view('anggota/view_detail', $indexrow);
				}else{
					$data = $this->upload->data();
					// $this->load->view('superadmin/data_user', $data);
					$send['file_laporan']=$data['file_name'];

					$kembalian['jumlah']=$this->mdl_data_jobdesk->upload_file($send);
					$this->session->set_flashdata('msg', 'Berkas Berhasil Diupload');
					$indexrow['id_new']=$id_upload;
					$indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id_upload);
					$this->load->view('anggota/view_detail', $indexrow);
				}
			}
		}
	}
	
}
