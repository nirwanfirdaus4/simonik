<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_periode extends CI_Controller {
	public function __construct()//MEMPERSIAPKAN
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_periode');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}
	}

	public function index(){
		$paket['array']=$this->mdl_data_periode->ambildata();	
		$this->load->view('superadmin/data_periode',$paket);
	}

	public function tambahData(){
		$this->form_validation->set_rules('th_periode','Tahun periode','trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('superadmin/vtambah_periode');
		}
		else{

			$query_cek= $this->db->query("SELECT * FROM tb_periode");
			if ($query_cek->num_rows()>2) {

				$hit=0;
				foreach ($query_cek->result() as $k_value) {
					if ($hit==0) {
						$id = $k_value->id_periode;
						$where = array('id_periode' => $id);
						$this->mdl_data_periode->delete_data($where,'tb_periode');	
					}
				$hit++;
				}

			}
		
			$send['id_periode']='';
			$send['th_periode']=$this->input->post('th_periode');

				$kembalian['jumlah']=$this->mdl_data_periode->tambahdata($send);
				$kembalian['array']=$this->mdl_data_periode->ambildata();
				$this->load->view('superadmin/data_periode',$kembalian);
				$this->session->set_flashdata('msg','Data berhasil ditambahkan');
				redirect('superadmin/Data_periode/');

		}
	}

	public function do_delete($id){
		$where = array('id_periode' => $id);
		$this->mdl_data_periode->delete_data($where,'tb_user');
		$this->mdl_data_periode->delete_data($where,'tb_periode');
		$this->mdl_data_periode->delete_data($where,'tb_panitia_proker');
		$this->mdl_data_periode->delete_data($where,'tb_periode');
		redirect('superadmin/Data_periode/');
	}

	public function edit($id_update){
		$this->form_validation->set_rules('id_periode','ID periode','trim|required');
		$this->form_validation->set_rules('th_periode','Tahun periode','trim|required');

		if($this->form_validation->run()==FALSE){
			$indexrow['data']=$this->mdl_data_periode->ambildata2($id_update);
			$this->load->view('superadmin/vedit_periode', $indexrow);
		}
		else{
			$send['id_periode']=$this->input->post('id_periode');
			$send['th_periode']=$this->input->post('th_periode');

			$kembalian['jumlah']=$this->mdl_data_periode->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('superadmin/Data_periode');
		}
	}
	
}
