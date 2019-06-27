<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_rekap_evaluasi extends CI_Model { 

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
	public function ambildata()
	{
		$ukm=$this->session->userdata('ses_ukm');
		$periode=$this->session->userdata('ses_periode');

		$query_proker=$this->db->query("SELECT * FROM tb_daftar_proker where id_ukm=$ukm AND id_periode=$periode");
		return $query_proker->result_array();
	}
	public function revisi_ambildataRekap()
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_sie where id_ukm=$ukm");
		return $query->result_array();	
	}
	public function revisi_ambildataRekapEval($sie)
	{
		$query=$this->db->query("SELECT * FROM tb_evaluasi where id_sie=$sie");
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
	public function tambahdata($paket)
		{
			$this->db->insert('tb_evaluasi', $paket);
			return $this->db->affected_rows();
		}	
	public function revisi_updateRekapEval($id_evaluasi,$hasil_evaluasi){
		$sql="UPDATE tb_evaluasi SET hasil_evaluasi = ? WHERE id_evaluasi = ?";
		$query=$this->db->query($sql, array($hasil_evaluasi,$id_evaluasi));
	}
}