<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rate extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_rate');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		
	}

	public function index()
	{

		$value['rate']=$this->input->post('rate');

		$ukm=$this->session->userdata('ses_ukm');
		$user=$this->session->userdata('ses_id_user');
		$tanggal_proker=$this->session->userdata('ses_date_rate');

		$query=$this->db->query("SELECT * FROM tb_daftar_proker where id_ukm=$ukm AND tanggal_proker='$tanggal_proker'");
		
		foreach ($query->result() as $key) {
			$id_proker=$key->id_proker;
		}

		$get_id_rating=$this->db->query("SELECT * FROM tb_rating where id_ukm=$ukm AND id_proker='$id_proker'");
		
		foreach ($get_id_rating->result() as $get_rate) {
			$id_rate=$get_rate->id_rating;
		}

		// echo $id_proker;
		$send['id_rating']=$id_rate;
		$send['id_ukm']=$ukm;
		$send['id_proker']=$id_proker;
		$send['rate']=$this->input->post('rate');

		$kembalian['jumlah']=$this->mdl_data_rate->modelupdate($send);

		redirect('bph/Welcome/');
	}

}
