<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_evaluasi extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_proker');		
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		 
	} 

	public function index(){	
		// $nav_ses=2;
		// $this->session->set_userdata('ses_nav_proker',$nav_ses);		

		$ukm=$data['ukm'] = $this->session->userdata('ses_ukm');
		$periode=$data['periode'] = $this->session->userdata('ses_periode');
		$proker=$data['proker'] = $this->session->userdata('ses_id_selected_proker');
		$sie=$data['sie']=$user=$this->session->userdata('ses_nav_sie_anggota');	
		$evaluasi_cek=$this->db->query("SELECT * FROM tb_evaluasi WHERE id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie AND id_periode=$periode");
		$sie_cek=$this->db->query("SELECT * FROM tb_sie WHERE id_ukm=$ukm AND id_sie=$sie");
		foreach ($sie_cek->result() as $convert_sie) {
					$data['nama_sie']=$convert_sie->nama_sie;
				}

		$this->form_validation->set_rules('hasil_evaluasi','Hasil Evaluasi','trim|required');

		if($this->form_validation->run()==FALSE){

			if ($evaluasi_cek->num_rows()>0) {

				$data['status']=1;			
				$data['data_evaluasi']=$this->mdl_data_proker->ambildataEvaluasi($periode,$ukm,$proker,$sie);
				$this->load->view('anggota/data_evaluasi', $data);
			}else{
				$data['status']=0;
				$data['data_evaluasi']=" ";
				$this->load->view('anggota/data_evaluasi', $data);				
			}

		}
		else{
			$send['id_ukm']=$data['ukm'];
			$send['id_periode']=$data['periode'];
			$send['id_proker']=$data['proker'];
			$send['id_sie']=$data['sie'];
			$send['hasil_evaluasi']=$this->input->post('hasil_evaluasi');

			if ($evaluasi_cek->num_rows()>0) {		

				foreach ($evaluasi_cek->result() as $key) {
					$send['id_evaluasi']=$key->id_evaluasi;
				}
				$this->mdl_data_proker->updateDataEvaluasi($send);
			}else{
				$send['id_evaluasi']='';
				$this->mdl_data_proker->unggahDataEvaluasi($send);				
			}


			redirect('anggota/Data_evaluasi');
		}
	}

	public function tambahData()
	{

		$data['ukm'] = $this->session->userdata('ses_ukm');
		$data['periode'] = $this->session->userdata('ses_periode');
		$data['proker'] = $this->session->userdata('ses_id_selected_proker');
		// $this->session->set_userdata('ses_nav_proker',$nav_ses);
		$data['sie']=$user=$this->session->userdata('ses_nav_sie_anggota');
		
			$send['id_evaluasi']='';
			$send['id_ukm']=$data['ukm'];
			$send['id_periode']=$data['periode'];
			$send['id_proker']=$data['proker'];
			$send['id_sie']=$data['sie'];
			$send['hasil_evaluasi']=$this->input->post('hasil_evaluasi');

			// var_dump($send);
			$this->mdl_data_proker->unggahDataEvaluasi($send);

			redirect('anggota/Data_evaluasi');
	}
	public function edit_evaluasi(){
		
	}

}


