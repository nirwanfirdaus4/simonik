<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_data_proker extends CI_Model {

	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	} 

	public function ambildata()
	{
		$ukm=$this->session->userdata('ses_ukm');
		$periode=$this->session->userdata('ses_periode');
		$query=$this->db->query("SELECT * FROM tb_daftar_proker WHERE id_ukm=$ukm AND id_periode=$periode");
		return $query->result_array();
	}
	public function admin_ambildata_proker()
	{
		$ukm=$this->session->userdata('ses_ukm');
		$periode=$this->session->userdata('ses_periode');
		$query=$this->db->query("SELECT * FROM tb_daftar_proker WHERE id_ukm=$ukm AND id_periode=$periode");
		return $query->result_array();
	}
	public function ambildata_proker_bph($bidang)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_daftar_proker WHERE id_ukm=$ukm AND id_bidang=$bidang");
		return $query->result_array();
	}
	public function ambildata_validasi_sie()
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_sie WHERE id_ukm=$ukm");
		return $query->result_array();
	}
	public function ambildata_validasi_jobdesk($proker,$sie)
	{
		$query=$this->db->query("SELECT * FROM tb_jobdesk WHERE id_proker=$proker AND id_sie=$sie");
		return $query->result_array();
	}
	public function namaProker_bph($proker)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT nama_proker FROM tb_daftar_proker WHERE id_ukm=$ukm AND id_proker=$proker");
		return $query->result_array();
	}
	public function namaSie_bph($sie)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT nama_sie FROM tb_sie WHERE id_ukm=$ukm AND id_sie=$sie");
		return $query->result_array();
	}
	public function ambildata_bph_dashboard($bidang)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_daftar_proker WHERE id_ukm=$ukm AND id_bidang=$bidang");
		return $query->result_array();
	}
	public function ambildata_sie_bph($proker)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_panitia_proker where  id_ukm=$ukm AND id_proker=$proker");
		return $query->result_array();
	}
	public function convert_sie()
	{
		$query=$this->db->query("SELECT * FROM tb_sie");
		return $query->result_array();
	}
	public function ambildata_sie($sie)
	{
		$ukm=$this->session->userdata('ses_ukm');
		$proker=$this->session->userdata('ses_id_selected_proker');
		$query=$this->db->query("SELECT * FROM tb_jobdesk WHERE id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie");
		return $query->result_array();
	}
	public function ambildata_jobdesk($proker)
	{
		$ukm=$this->session->userdata('ses_ukm');	
		$proker=$this->session->userdata('ses_id_selected_proker');						
		$query=$this->db->query("SELECT * FROM tb_jobdesk where id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie");
		return $query->result_array();
	}
	public function ambildata2($id_update)
	{
		$query=$this->db->query("SELECT * FROM tb_daftar_proker where id_proker = $id_update");
		return $query->result_array();
	}

	public function tambahdata($paket)
	{
		$this->db->insert('tb_daftar_proker', $paket);
		return $this->db->affected_rows();
	}
	public function tambahdata_rating($paket)
	{
		$this->db->insert('tb_rating', $paket);
		return $this->db->affected_rows();
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function delete_data_rating($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function ambilDataSie()
	{
		$ukm=$this->session->userdata('ses_ukm');			
		$query=$this->db->query("SELECT * FROM tb_sie where id_ukm=$ukm");
		return $query->result_array();
	}
	public function ambildataEvaluasi($periode,$ukm,$proker,$sie)
	{
		$query=$this->db->query("SELECT * FROM tb_evaluasi WHERE id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie AND id_periode=$periode");
		return $query->result_array();
	}
	public function unggahDataEvaluasi($paket)
	{
		$this->db->insert('tb_evaluasi', $paket);
		// return $this->db->affected_rows();
	}
	public function updateDataEvaluasi($send){
		$sql="UPDATE tb_evaluasi SET id_ukm = ?, id_periode = ?, id_proker = ?, id_sie = ?, hasil_evaluasi = ? WHERE id_evaluasi = ?";
		$query=$this->db->query($sql, array( $send['id_ukm'], $send['id_periode'], $send['id_proker'], $send['id_sie'], $send['hasil_evaluasi'], $send['id_evaluasi']));
	}

	public function modelupdate($send){
		$sql="UPDATE tb_daftar_proker SET nama_proker = ?, ketua_proker = ?, tanggal_proker = ?, id_ukm = ?, tempat_proker = ?, id_bidang = ? WHERE id_proker = ?";
		$query=$this->db->query($sql, array( $send['nama_proker'], $send['nm_ketua_proker'], $send['tgl_proker'], $send['id_ukm'],$send['tempat_proker'], $send['nm_bidang'], $send['id_proker']));
	}	
}