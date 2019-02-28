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
	public function detail($sie){	
		$paket['sie_id']=$sie;
		$paket['jobdesk']=$this->mdl_data_jobdesk->ambildata_detail($sie);	
		$paket['sie']=$this->mdl_data_jobdesk->ambilDataSie();	
		// session ini berfungsi untuk fungsi delete dll		
		$this->session->set_userdata('ses_nav_sie',$sie);		
		$this->load->view('anggota/data_jobdesk',$paket);
		// echo 'proker '.$proker_selected;
		// echo '<br>sie '.$sie;
	}
	public function tambahData($sie){
		$nav_ses=1;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);		
		$data['sie_id']=$sie;
		$data['proker'] = $this->session->userdata('ses_id_selected_proker');	
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
			redirect('anggota/Data_jobdesk/detail/'.$sie);
		}
	}

	public function do_delete($id){
		$where = array('id_jobdesk' => $id);
		$sie=$this->session->userdata('ses_nav_sie');		
		$this->mdl_data_jobdesk->delete_data($where,'tb_jobdesk');
		redirect('anggota/Data_jobdesk/detail/'.$sie);
	}

	public function edit($id_update){
		$nav_ses=1;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);		

		$data['proker'] = $this->session->userdata('ses_id_selected_proker');	
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
			redirect('anggota/Data_jobdesk/detail/'.$sie);
		}
	}
	
}
