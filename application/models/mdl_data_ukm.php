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

	public function ambildata2($id_update)
		{
				$query=$this->db->query("SELECT * FROM tb_ukm where id_ukm = $id_update");
				return $query->result_array();
		}

	public function tambahdata($paket)
		{
			$this->db->insert('tb_ukm', $paket);
			return $this->db->affected_rows();
		}
	public function tambah_sie($ukm)
		{
			$i=0;
			for ($i=0; $i <=2 ; $i++) { 
				if ($i==0) {
					$send['id_sie']='';
					$send['nama_sie']='Ketua Pelaksana';
					$send['id_ukm']=$ukm;
					$this->db->insert('tb_sie', $send);
				}elseif ($i==1) {
					$send['id_sie']='';
					$send['nama_sie']='Sekretaris Pelaksana';
					$send['id_ukm']=$ukm;
					$this->db->insert('tb_sie', $send);
				}elseif ($i==2) {
					$send['id_sie']='';
					$send['nama_sie']='Sie Acara';
					$send['id_ukm']=$ukm;
					$this->db->insert('tb_sie', $send);
				}
			}
		}
	// public function tambahdata2($paket)
	// 	{
	// 		$this->db->insert('siswa', $paket);
	// 		return $this->db->insert_id();
	// 	}	

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_ukm SET nama_ukm = ? WHERE id_ukm = ?";
		$query=$this->db->query($sql, array( $send['nama_ukm'], $send['id_ukm']));
	}
}