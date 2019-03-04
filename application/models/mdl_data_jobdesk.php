<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_data_jobdesk extends CI_Model { 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function ambildata()
	{
		$ukm=$this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_jobdesk WHERE id_ukm=$ukm");
		return $query->result_array();
	}
	public function ambildata_detail($sie)
	{		
		$proker=$this->session->userdata('ses_id_selected_proker'); 		
		$ukm=$this->session->userdata('ses_ukm');				
		$query=$this->db->query("SELECT * FROM tb_jobdesk where id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie");
		return $query->result_array();
	}
	public function ambilDataSie()
	{
		$ukm=$this->session->userdata('ses_ukm');			
		$query=$this->db->query("SELECT * FROM tb_sie where id_ukm=$ukm");
		return $query->result_array();
	}
	public function ambildata2($id_update)
	{
		$query=$this->db->query("SELECT * FROM tb_jobdesk where id_jobdesk = $id_update");
		return $query->result_array();
	}

	public function tambahdata($paket)
	{
		$this->db->insert('tb_jobdesk', $paket);
		return $this->db->affected_rows();
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_jobdesk SET id_ukm = ?, id_proker = ?, id_sie = ?, id_user = ?, status_jobdesk = ?, nama_jobdesk = ?, startline = ?, deadline = ? WHERE id_jobdesk = ?";
		$query=$this->db->query($sql, array( $send['id_ukm'], $send['id_proker'], $send['id_sie'], $send['id_user'], $send['status_jobdesk'], $send['nama_jobdesk'],$send['startline'],$send['deadline'], $send['id_jobdesk']));
	}	

	public function upload_file($send){
		$sql="UPDATE tb_jobdesk SET id_jobdesk = ?, file_laporan = ? WHERE id_jobdesk = ?";
		$query=$this->db->query($sql, array( $send['id_jobdesk'],$send['file_laporan'], $send['id_jobdesk']));	}	
}