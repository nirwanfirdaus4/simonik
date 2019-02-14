<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_data_ukm extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

	public function ambildata()
		{
				$query=$this->db->query("SELECT * FROM tb_ukm");
				return $query->result_array();
		}

	// public function ambildata2($id_update)
	// 	{
	// 			$query=$this->db->query("SELECT * FROM v_siswa where id_siswa = $id_update");
	// 			return $query->result_array();
	// 	}

	// public function tambahdata($paket)
	// 	{
	// 		$this->db->insert('siswa', $paket);
	// 		return $this->db->affected_rows();
	// 	}

	// public function tambahdata2($paket)
	// 	{
	// 		$this->db->insert('siswa', $paket);
	// 		return $this->db->insert_id();
	// 	}	


	// public function deletedata($table, $where){
	// 	$this->db->delete($table, $where);
	// 	return true;

	// }

	public function modelupdate($table, $data, $where){
		  if($this->db->update($table, $data, $where)) {
            return true;
        } else {
            return false;
        }        
	}
}