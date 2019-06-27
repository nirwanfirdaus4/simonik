<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_rekap_evaluasi extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_rekap_evaluasi');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		
	}

	public function index(){
		$paket['array']=$this->mdl_rekap_evaluasi->ambildata();	
		$this->load->view('admin/data_rekap_evaluasi',$paket);
	}
	public function tampil()
	{
		$proker=$this->input->post('nm_rekap');
		if ($proker=='zero') {
			// $this->load->view('admin/data_rekap_evaluasi',$paket);
			// $paket['array']=$this->mdl_rekap_evaluasi->ambildata();
			redirect('admin/Data_rekap_evaluasi/');
		}else{			
			$this->session->set_userdata('ses_revisiProker',$proker);
			$paket['array']=$this->mdl_rekap_evaluasi->ambildata();			
			$paket['array_eval']=$this->mdl_rekap_evaluasi->revisi_ambildataRekap($proker);
			$this->load->view('admin/data_rekap_evaluasi_tampil',$paket);
		}
	}
	public function tampilEval($sie)
	{
			$evaluasi_cek=$this->db->query("SELECT * FROM tb_evaluasi WHERE id_sie=$sie");

			if ($evaluasi_cek->num_rows()>0) {
				$paket['status']=1;
			}else{
				$paket['status']=0;
			}
			$paket['revisi_idSie']=$sie;
			$paket['array_eval']=$this->mdl_rekap_evaluasi->revisi_ambildataRekapEval($sie);
			$this->load->view('admin/data_rekap_evaluasi_tampilEval',$paket);
	}
	public function updateEvaluasi($sie){

		$evaluasi_cek=$this->db->query("SELECT * FROM tb_evaluasi WHERE id_sie=$sie");

		if ($evaluasi_cek->num_rows()>0) {
			$id_evaluasi=$this->input->post('id_evaluasi');		
			$hasil_evaluasi=$this->input->post('hasil_evaluasi');		
			$evaluasi_cek=$this->db->query("SELECT * FROM tb_evaluasi WHERE id_evaluasi=$id_evaluasi");

			$this->mdl_rekap_evaluasi->revisi_updateRekapEval($id_evaluasi,$hasil_evaluasi);
			redirect('admin/Data_rekap_evaluasi/tampilEval/'.$sie);
		}else{
			$send['id_proker']=$this->session->userdata('ses_revisiProker');
			$send['id_sie']=$sie;
			$send['id_ukm']=$this->session->userdata('ses_ukm');
			$send['id_periode']=$this->session->userdata('ses_periode');
			$send['hasil_evaluasi']=$this->input->post('hasil_evaluasi');

			$this->mdl_rekap_evaluasi->tambahdata($send);
			redirect('admin/Data_rekap_evaluasi/tampilEval/'.$sie);
		}

	}

	public function tambahData(){
		$this->form_validation->set_rules('nama_bidang','Nama Bidang','trim|required');
		$id_bidang = "t1" . md5(time());
		$value['id_user']=$this->input->post('id_user');
		$value['id_periode']=$this->input->post('id_periode');

		if ($this->form_validation->run()==FALSE || $value['id_user']=='zero' ||$value['id_periode']=='zero') {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('admin/vtambah_bidang',$data);
		}
		else{
			$send['id_bidang']=$id_bidang;
			$send['nama_bidang']=$this->input->post('nama_bidang');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['ketua_bidang']=$this->input->post('nm_ketua_bidang');
			$send['sekretaris_bidang']=$this->input->post('nm_sekretaris_bidang');

			$kembalian['jumlah']=$this->mdl_rekap_evaluasi->tambahdata($send);
			$kembalian['array']=$this->mdl_rekap_evaluasi->ambildata();
						
			$this->load->view('admin/data_bidang',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('admin/Data_bidang/');
		}
	}

	public function do_delete($id){
		$where = array('id_bidang' => $id);
		$this->mdl_rekap_evaluasi->delete_data($where,'tb_bidang');
		$this->mdl_rekap_evaluasi->delete_data($where,'tb_file_backup');
		redirect('admin/Data_bidang/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('nama_bidang','Nama Bidang','trim|required');
		$this->form_validation->set_rules('nm_ketua_bidang','Nama Bidang','trim|required');
		$this->form_validation->set_rules('nm_sekretaris_bidang','Nama Bidang','trim|required');
		
		$value['id_user']=$this->input->post('id_user');
		$value['id_periode']=$this->input->post('id_periode');

		if($this->form_validation->run()==FALSE || $value['id_user']=='zero' || $value['id_periode']=='zero'){
			$indexrow['data']=$this->mdl_rekap_evaluasi->ambildata2($id_update);
			$this->load->view('admin/vedit_bidang', $indexrow);
		}
		else{
			$send['id_bidang']=$this->input->post('id_bidang');
			$send['nama_bidang']=$this->input->post('nama_bidang');
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['nm_ketua_bidang']=$this->input->post('nm_ketua_bidang');
			$send['nm_sekretaris_bidang']=$this->input->post('nm_sekretaris_bidang');
			// var_dump($send);
			$kembalian['jumlah']=$this->mdl_rekap_evaluasi->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('admin/Data_bidang');
		}
	}
	
}
