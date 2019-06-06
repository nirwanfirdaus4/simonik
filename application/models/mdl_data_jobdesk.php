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
	public function ambildata_detail($proker,$sie)
	{		 		
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

	public function tambahDataBackup($proker,$sie,$nama_jobdesk)
	{

		$get_id_jobdesk=$this->db->query("SELECT * FROM tb_jobdesk");
		$query_bidang=$this->db->query("SELECT * FROM tb_daftar_proker");

		$backup['id_ukm']=$this->session->userdata('ses_ukm');
		$backup['id_periode']=$this->session->userdata('ses_periode');

		foreach ($query_bidang->result() as $key_bidang) {
			if ($key_bidang->id_proker==$proker) {
				$bidang=$key_bidang->id_bidang;
			}
		}
		foreach ($get_id_jobdesk->result() as $key_jobdesk) {
			if ($key_jobdesk->nama_jobdesk==$nama_jobdesk && $key_jobdesk->id_ukm==$backup['id_ukm'] && $key_jobdesk->id_proker==$proker && $key_jobdesk->id_sie==$sie) {
				$id_jobdesk=$key_jobdesk->id_jobdesk;
			}
		}

		$backup['id_file']='';
		$backup['id_jobdesk']=$id_jobdesk;
		$backup['id_proker']=$proker;
		$backup['id_bidang']=$bidang;
		$backup['id_sie']=$sie;
		$backup['file_laporan']='';

		$this->db->insert('tb_file_backup', $backup);
		// return $this->db->affected_rows();
	}

	public function update_file_backup($send){
		$sql="UPDATE tb_file_backup SET file_laporan = ? WHERE id_jobdesk = ?";
		$query=$this->db->query($sql, array( $send['file_laporan'], $send['id_jobdesk']));
	}

	public function modelupdate($send){
		$sql="UPDATE tb_jobdesk SET id_ukm = ?, id_proker = ?, id_sie = ?, id_user = ?, status_jobdesk = ?, nama_jobdesk = ?, startline = ?, deadline = ? WHERE id_jobdesk = ?";
		$query=$this->db->query($sql, array( $send['id_ukm'], $send['id_proker'], $send['id_sie'], $send['id_user'], $send['status_jobdesk'], $send['nama_jobdesk'],$send['startline'],$send['deadline'], $send['id_jobdesk']));
	}	

	public function modelupdateNotifikasi($send){

			$sql="UPDATE tb_notifikasi SET konten_notifikasi = ? WHERE id_jobdesk = ?";
			$query=$this->db->query($sql, array( $send['nama_jobdesk'], $send['id_jobdesk']));
	}

	public function modeldeleteNotifikasi($send, $namaJobedsk){

			$where = array('id_proker' => $send['id_proker'],'id_sie' => $send['id_sie'],'konten_notifikasi' => $namaJobedsk);
			$this->db->where($where);
			$this->db->delete('tb_notifikasi');
	}	

	public function upload_file($send){
		$sql="UPDATE tb_jobdesk SET id_jobdesk = ?, file_laporan = ?,id_user = ? WHERE id_jobdesk = ?";
		$query=$this->db->query($sql, array( $send['id_jobdesk'],$send['file_laporan'],$send['id_user'], $send['id_jobdesk']));
	}	

	public function update_status($send){
		$sql="UPDATE tb_jobdesk SET id_jobdesk = ?, status_jobdesk = ?, id_user = ? WHERE id_jobdesk = ?";
		$query=$this->db->query($sql, array( $send['id_jobdesk'],$send['status_jobdesk'],$send['id_user'], $send['id_jobdesk']));
	}
}