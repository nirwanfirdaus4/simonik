<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_data_sie_anggota extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function ambildata($proker)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_panitia_proker WHERE id_ukm=$ukm AND id_proker=$proker");
		return $query->result_array();
	}
	public function ambildata_jobdesk($ukm,$proker,$sie)
	{							
		$query=$this->db->query("SELECT * FROM tb_jobdesk where id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie");
		return $query->result_array();
	}
	public function ambildata_sie($sie)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_jobdesk WHERE id_ukm=$ukm AND id_sie=$sie");
		return $query->result_array();
	}
	public function bahan_convert_sie()
	{
		$ukm=$this->session->userdata('ses_ukm');			
		$query=$this->db->query("SELECT * FROM tb_sie where id_ukm=$ukm");
		return $query->result_array();
	}
	public function convert_sie()
	{
		$query=$this->db->query("SELECT * FROM tb_sie");
		return $query->result_array();
	}

	public function ambildata2($id_update)
	{
		$query=$this->db->query("SELECT * FROM tb_panitia_proker where id_panitia = $id_update");
		return $query->result_array();
	}

	public function tambahdata($paket)
	{
		$this->db->insert('tb_panitia', $paket);
		return $this->db->affected_rows();
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_panitia SET id_ukm = ?, id_periode = ?, nama_panitia = ?, ketua_panitia = ?, sekretaris_panitia = ? WHERE id_panitia = ?";
		$query=$this->db->query($sql, array( $send['id_ukm'], $send['id_periode'], $send['nama_panitia'], $send['nm_ketua_panitia'], $send['nm_sekretaris_panitia'], $send['id_panitia']));
	}	
}