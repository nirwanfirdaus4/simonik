<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_data_user extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

	public function ambildata()
		{
				$query=$this->db->query("SELECT * FROM tb_user");
				return $query->result_array();
		}
	public function ambildata_detail($ukm)
		{
				$query=$this->db->query("SELECT * FROM tb_user where id_ukm=$ukm");
				return $query->result_array();
		}

	public function ambildata2($id_update)
		{
				$query=$this->db->query("SELECT * FROM tb_user where id_user = $id_update");
				return $query->result_array();
		}
	public function ambilDataUkm()
		{
				$query=$this->db->query("SELECT * FROM tb_ukm");
				return $query->result_array();
		}

	public function tambahdata($paket)
		{
			$this->db->insert('tb_user', $paket);
			return $this->db->affected_rows();
		}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_user SET nama_user = ?, nim = ?, id_ukm = ?, no_telp_user = ?, email_user = ?, id_type_user = ?, id_periode = ?, username = ?, foto_user = ?  WHERE id_user = ?";
		$query=$this->db->query($sql, array( $send['nama_user'], $send['nim'], $send['id_ukm'], $send['no_telp_user'], $send['email_user'], $send['id_type_user'], $send['id_periode'], $send['username'], $send['foto_user'], $send['id_user']));
	}	
}