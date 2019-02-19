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
		$sql="UPDATE tb_jobdesk SET id_ukm = ?, id_periode = ?, nama_jobdesk = ?, ketua_jobdesk = ?, sekretaris_jobdesk = ? WHERE id_jobdesk = ?";
		$query=$this->db->query($sql, array( $send['id_ukm'], $send['id_periode'], $send['nama_jobdesk'], $send['nm_ketua_jobdesk'], $send['nm_sekretaris_jobdesk'], $send['id_jobdesk']));
	}	
}