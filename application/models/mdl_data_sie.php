<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_data_sie extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function ambildata()
	{
		$ukm = $this->session->userdata('ses_ukm');
		$query=$this->db->query("SELECT * FROM tb_sie WHERE id_ukm = $ukm ");
		return $query->result_array();
	}

	public function ambildata2($id_update)
	{
		$query=$this->db->query("SELECT * FROM tb_sie where id_sie = $id_update");
		return $query->result_array();
	}

	public function tambahdata($paket)
	{
		$this->db->insert('tb_sie', $paket);
		return $this->db->affected_rows();
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_sie SET nama_sie = ?,id_ukm = ? WHERE id_sie = ?";
		$query=$this->db->query($sql, array( $send['nama_sie'],$send['id_ukm'], $send['id_sie']));
	}
}