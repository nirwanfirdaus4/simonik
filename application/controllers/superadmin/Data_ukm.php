<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ukm extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_ukm');
		$this->load->model('mdl_data_sie');		
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}
	}

	public function index(){
		$paket['array']=$this->mdl_data_ukm->ambildata();	
		$this->load->view('superadmin/data_ukm',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_ukm','Nama UKM','trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('superadmin/vtambah_ukm'); 
		}
		else{
			$send['id_ukm']='';
			$n_ukm=$send['nama_ukm']=$this->input->post('nama_ukm');

			$kembalian['jumlah']=$this->mdl_data_ukm->tambahdata($send);

			$q_getUkm = $this->db->query("SELECT * FROM tb_ukm where nama_ukm='$n_ukm'");
			foreach ($q_getUkm->result() as $key_ukm) {
				$ukm=$key_ukm->id_ukm;
			}

			for ($i=0; $i<=2 ; $i++) { 
				if ($i==0) {
					$send_sie['id_sie']='';
					$send_sie['nama_sie']="Ketua Pelaksana";
					$send_sie['id_ukm']=$ukm;						
					$this->mdl_data_sie->tambahdata($send_sie);						
				}elseif ($i==1) {
					$send_sie['id_sie']='';
					$send_sie['nama_sie']="Sekretaris Pelaksana";
					$send_sie['id_ukm']=$ukm;						
					$this->mdl_data_sie->tambahdata($send_sie);						
				}else{
					$send_sie['id_sie']='';
					$send_sie['nama_sie']="Sie Acara";
					$send_sie['id_ukm']=$ukm;						
					$this->mdl_data_sie->tambahdata($send_sie);
				}					
			}

			$this->mdl_data_ukm->tambah_sie($ukm);
			$kembalian['array']=$this->mdl_data_ukm->ambildata();
			$this->load->view('superadmin/data_ukm',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('superadmin/Data_ukm/');
		}
	}

	public function do_delete($id){
		$where = array('id_ukm' => $id);
		$this->mdl_data_ukm->delete_data($where,'tb_user');
		$this->mdl_data_ukm->delete_data($where,'tb_ukm');
		$this->mdl_data_ukm->delete_data($where,'tb_panitia_proker');		
		$this->mdl_data_ukm->delete_data($where,'tb_jobdesk');
		$this->mdl_data_ukm->delete_data($where,'tb_rating');
		$this->mdl_data_ukm->delete_data($where,'tb_sie');
		$this->mdl_data_ukm->delete_data($where,'tb_evaluasi');
		$this->mdl_data_ukm->delete_data($where,'tb_file_backup');
		redirect('superadmin/Data_ukm/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('id_ukm','ID UKM','trim|required');
		$this->form_validation->set_rules('nama_ukm','Nama UKM','trim|required');

		if($this->form_validation->run()==FALSE){
			$indexrow['data']=$this->mdl_data_ukm->ambildata2($id_update);
			$this->load->view('superadmin/vedit_ukm', $indexrow);
		}
		else{
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['nama_ukm']=$this->input->post('nama_ukm');

			$kembalian['jumlah']=$this->mdl_data_ukm->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('superadmin/Data_ukm');
		}
	}
	
}
