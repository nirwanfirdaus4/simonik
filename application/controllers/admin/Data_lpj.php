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

	public function index(){
		$paket['array']=$this->mdl_data_ukm->ambildata_prokerUkm();	
		$this->load->view('admin/data_lpj',$paket);
	}
	public function upload($id_proker){
		$ukm=$this->session->userdata('ses_ukm');
		$periode=$this->session->userdata('ses_periode');

		$send['id_lpj']="";
		if ($_FILES["berkas"]["name"] != ""){
			$config['upload_path']          = './upload/berkas_laporan/';
			$config['allowed_types']        = 'pdf|PDF';
			$config['max_size']             = 10000;
			$config['file_name'] ="Document_LPJ".time();

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('berkas')){ 
				$error =$this->upload->display_errors();
				redirect('admin/Data_lpj');

			}else{
				// $num_data=0;
				$cek_file=$this->db->query("SELECT * FROM tb_lpj");

				foreach ($cek_file->result() as $key_file) {
					if ($key_file->id_proker==$id_proker) {
						$nama_file=$key_file->file;
						// $num_data=1;

						$target= "upload/berkas_laporan/".$nama_file;
						unlink($target);

						$where = array('id_proker' => $id_proker);
						$this->mdl_data_ukm->delete_data($where,'tb_lpj');		
					}
				}


				$data = $this->upload->data();
				$send['id_lpj']="";
				$send['id_proker']=$id_proker;
				$send['id_ukm']=$ukm;
				$send['id_periode']=$periode;
				$send['file']=$data['file_name'];

				// if ($num_data==0) {
				// 	$send['status_file']="Belum ajuan";
				// }else{
				$send['status_file']="Menunggu validasi";
				// }

				$this->mdl_data_ukm->upload_lpj($send);
				redirect('admin/Data_lpj');
			}
		}else{
			redirect('admin/Data_lpj');
		}
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
	public function validasi(){

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
