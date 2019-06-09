<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_anggota extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_sie_anggota');
		$this->load->model('mdl_data_panitia');		
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		 
	} 

	public function daftar_anggota($proker,$sie_user) 
	{	
		// $data['id_sie']=$this->session->userdata('ses_nav_sie_anggota');		
		$nav_ses=2; 
		$data['id_nav']='';
		$data['ses_proker'] = $proker;
		$data['id_sie'] = $sie_user;
		$data['panitia'] = $this->mdl_data_panitia->ambildata_hak_koor($sie_user);
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$this->load->view('anggota/data_panitia_anggota',$data);
	}
	public function detail($proker,$sie,$sie_user){
		$paket['ses_proker']=$proker;
		$paket['id_sie']=$sie_user;
		$paket['sie_id']=$sie; 

		$paket['panitia']=$this->mdl_data_panitia->ambildata_detail($sie);	
		$paket['sie']=$this->mdl_data_panitia->ambilDataSie();	
		// session ini berfungsi untuk fungsi delete dll		
		$this->session->set_userdata('ses_nav_sie',$sie);		
		$this->load->view('anggota/data_panitia',$paket);
	}
	public function tambahData($proker,$sie,$sie_user)
	{
		$nav_ses=2;

		$data['sie_id']=$sie;		
		$data['id_sie']=$sie_user;		
		$data['ses_proker'] = $proker;	

		$periode= $this->session->userdata('ses_periode');
		$ukm= $this->session->userdata('ses_ukm');
		$proker= $this->session->userdata('ses_id_selected_proker');
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		// $data['sie_id']=$sie=$this->session->userdata('ses_nav_sie_anggota');
		$value['id_user']=$this->input->post('nm_anggota');

		if (count($_POST) == 0) {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('anggota/vtambah_panitia_anggota',$data);  
		}
		else{
			$send['id_panitia']='';
			$send['id_proker']=$proker;
			$send['id_ukm']=$ukm;
			$send['id_periode']=$periode;
			$send['id_user']=$this->input->post('nm_anggota');
			$sie=$send['id_sie']=$data['sie_id'];
			$send['jenis_panitia']='Anggota Sie';

			// var_dump($send);
			$kembalian['jumlah']=$this->mdl_data_panitia->tambahdata($send);
			$kembalian['array']=$this->mdl_data_panitia->ambildata_detail($data['sie_id']);

			$this->load->view('anggota/data_panitia_anggota',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('anggota/Data_anggota/daftar_anggota/'.$proker.'/'.$sie);
		}
	}

	public function do_delete($id,$proker,$sie){
		$where = array('id_panitia' => $id);
		$this->mdl_data_panitia->delete_data($where,'tb_panitia_proker');
		redirect('anggota/Data_anggota/daftar_anggota/'.$proker.'/'.$sie);
	}	
}


