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
 
	public function value($proker,$sie,$nav_ses){	
		
		$this->session->set_userdata('ses_nav_proker',$nav_ses);		
		$data['ses_sie']=$sie;
		$data['ses_nav']=$nav_ses; 
		$ukm=$data['ukm'] = $this->session->userdata('ses_ukm');
		$periode=$data['periode'] = $this->session->userdata('ses_periode');
		$proker=$data['ses_proker'] = $proker;
		// $sie=$data['sie']=$user=$this->session->userdata('ses_nav_sie_anggota');
		$data['id_sie']=$sie;	
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
				// echo "ono";
				// echo "SELECT * FROM tb_evaluasi WHERE id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie AND id_periode=$periode";
			}else{
				$data['status']=0;
				$data['data_evaluasi']=" ";
				$this->load->view('anggota/data_evaluasi', $data);				
				// echo "ndak ono";
				// echo "SELECT * FROM tb_evaluasi WHERE id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie AND id_periode=$periode";
			}

		}
		else{
			$send['id_ukm']=$data['ukm'];
			$send['id_periode']=$data['periode'];
			$send['id_proker']=$data['ses_proker'];
			$send['id_sie']=$data['id_sie'];
			$send['hasil_evaluasi']=$this->input->post('hasil_evaluasi');

			if ($evaluasi_cek->num_rows()>0) {		

				foreach ($evaluasi_cek->result() as $key) {
					$send['id_evaluasi']=$key->id_evaluasi;
				}
				$this->mdl_data_proker->updateDataEvaluasi($send);
				$this->session->set_flashdata('mggg', '<b> Siip!! </b> Data Evaluasi Berhasil Diupdate');
			}else{
				$send['id_evaluasi']='';
				$this->mdl_data_proker->unggahDataEvaluasi($send);	
				$this->session->set_flashdata('msg', '<b> Siip!! </b> Data Evaluasi Berhasil Diinput');			
			}


			redirect('anggota/Data_evaluasi/value/'.$proker.'/'.$sie.'/'.$nav_ses);
		}
	}
}