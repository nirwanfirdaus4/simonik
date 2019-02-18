<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_data_proker extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

	public function ambildata()
		{
			$ukm=$this->session->userdata('ses_ukm');
			$query=$this->db->query("SELECT * FROM tb_daftar_proker WHERE id_ukm=$ukm");
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

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_daftar_proker SET nama_proker = ?, ketua_proker = ?, tanggal_proker = ?, id_ukm = ?, id_bidang = ? WHERE id_proker = ?";
		$query=$this->db->query($sql, array( $send['nama_proker'], $send['nm_ketua_proker'], $send['tgl_proker'], $send['id_ukm'], $send['nm_bidang'], $send['id_proker']));
	}	
}