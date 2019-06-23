<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_referensi extends CI_Model { 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	} 

	public function ambil_periode()
	{
		$query=$this->db->query("SELECT * FROM tb_periode");
		return $query->result_array();
	} 
	public function ambildata($periode)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$id_user=$this->session->userdata('ses_id_user');
		$query_bidang=$this->db->query("SELECT * FROM tb_bidang");

		foreach ($query_bidang->result() as $key_bidang) {
			if ($key_bidang->ketua_bidang==$id_user || $key_bidang->sekretaris_bidang==$id_user) {
				$bidang=$key_bidang->id_bidang;
			}
		}
		// echo "periode = ".$periode."<br>";
		// echo "bidang = ".$bidang."<br>";
		// echo "ukm = ".$ukm."<br>";
		// echo "id-user = ".$id_user."<br>";
		$query=$this->db->query("SELECT * FROM tb_file_backup where id_periode=$periode AND id_ukm=$ukm AND id_bidang=$bidang");
		return $query->result_array();
	}


	public function ambildata_proker($periode) 
	{
		$ukm=$this->session->userdata('ses_ukm');
		// $periode=$this->session->userdata('ses_periode');
		$id_user=$this->session->userdata('ses_id_user');
		// $query_bidang=$this->db->query("SELECT * FROM tb_bidang where ketua_bidang=$id_user");
		$query_bidang=$this->db->query("SELECT * FROM tb_bidang");

		foreach ($query_bidang->result() as $key_bidang) {
			if ($key_bidang->ketua_bidang==$id_user || $key_bidang->sekretaris_bidang==$id_user) {
				$bidang=$key_bidang->id_bidang;
			}
		}
		$query=$this->db->query("SELECT DISTINCT id_periode,id_proker,id_ukm,id_bidang FROM tb_file_backup where id_periode=$periode AND id_ukm=$ukm AND id_bidang=$bidang AND id_periode=$periode");
		return $query->result_array();
	}

	public function ambildata_sie($proker)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$id_user=$this->session->userdata('ses_id_user');
		$query=$this->db->query("SELECT * FROM tb_file_backup where id_proker=$proker");
		return $query->result_array();
	}




	public function anggota_ambildata($periode,$proker)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$id_user=$this->session->userdata('ses_id_user');

		$query=$this->db->query("SELECT * FROM tb_file_backup where id_periode=$periode AND id_ukm=$ukm AND id_proker=$proker");
		return $query->result_array();

	}

}