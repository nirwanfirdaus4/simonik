<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_lpj extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_ukm');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}
	}

	public function lpj($id_ukm){
		$this->session->set_userdata('ses_revisi_MegaUKM',$id_ukm);
		$paket['array']=$this->mdl_data_ukm->ambildata_lpj($id_ukm);	
		$this->load->view('superadmin/data_lpj',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_kategori','Nama','trim|required');
		$this->form_validation->set_rules('nilai','Nilai','trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('superadmin/vtambah_kategori'); 
		}elseif($this->input->post('nilai')>100){
			$this->session->set_flashdata('msg_over','Nilai maksimal adalah 100');
			$this->load->view('superadmin/vtambah_kategori');
		}else{
			$send['id_kategori']=$this->input->post('id_kategori');
			$send['nama_kategori']=$this->input->post('nama_kategori');
			$send['nilai']=$this->input->post('nilai');
			
			$kembalian['jumlah']=$this->mdl_data_ukm->tambahdata_kategori($send);
			$paket['array']=$this->mdl_data_ukm->ambildata_kategori();	
			$this->load->view('superadmin/data_kategori',$paket);
		}
	}

	public function reminder(){

	}
	public function validasi($proker){
		$ukm=$this->session->userdata('ses_revisi_MegaUKM');
		$this->mdl_data_ukm->validasi_lpj($proker);	
		redirect('superadmin/Data_lpj/lpj/'.$ukm);
	}
	public function tolak($proker){
		$ukm=$this->session->userdata('ses_revisi_MegaUKM');
		$isi=$this->input->post('isi_revisi');

		$cek_file=$this->db->query("SELECT * FROM tb_lpj");

		foreach ($cek_file->result() as $key_file) {
			if ($key_file->id_proker==$id_proker) {
				$nama_file=$key_file->file;

				$target= "upload/berkas_laporan/".$nama_file;
				unlink($target);
			}
		}

		$this->mdl_data_ukm->tolak_lpj($proker,$isi);	
		redirect('superadmin/Data_lpj/lpj/'.$ukm);
	}
	public function do_delete($id){
		$where = array('id_kategori' => $id);
		$this->mdl_data_ukm->delete_data($where,'kategori_lapor');
		redirect('superadmin/Data_kategori/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('id_kategori','ID Kategori','trim|required');
		$this->form_validation->set_rules('nama_kategori','Nama Kategori','trim|required');
		$this->form_validation->set_rules('nilai','Nama Kategori','trim|required');

		if($this->form_validation->run()==FALSE){
			$indexrow['data']=$this->mdl_data_ukm->ambildata2_kategori($id_update);
			$this->load->view('superadmin/vedit_kategori', $indexrow);
		}elseif($this->input->post('nilai')>100){
			$this->session->set_flashdata('msg_over','Nilai maksimal adalah 100');
			$indexrow['data']=$this->mdl_data_ukm->ambildata2_kategori($id_update);
			$this->load->view('superadmin/vedit_kategori', $indexrow);
		}else{
			$send['id_kategori']=$this->input->post('id_kategori');
			$send['nama_kategori']=$this->input->post('nama_kategori');
			$send['nilai']=$this->input->post('nilai');

			$kembalian['jumlah']=$this->mdl_data_ukm->modelupdate_kategori($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('superadmin/Data_kategori');
		}
	}
	
}
