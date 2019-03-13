<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mdl_data_panitia extends CI_Model { 

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
 
	public function ambildata()
		{
			// $user=$this->session->userdata('ses_id_user');
			$ukm=$this->session->userdata('ses_ukm');
			$user=$this->session->userdata('ses_id_user');			
			$query=$this->db->query("SELECT * FROM tb_panitia_proker where id_ukm=$ukm AND id_user=$user");
			return $query->result_array();
		}
	public function ambildata_hak_koor()
		{
			$ukm=$this->session->userdata('ses_ukm');
			$user=$this->session->userdata('ses_id_user');			
			$proker=$this->session->userdata('ses_id_selected_proker');						
			$query=$this->db->query("SELECT * FROM tb_panitia_proker where id_ukm=$ukm AND id_proker=$proker AND id_sie!=1");
			return $query->result_array();
		}

	public function ambildata_detail($sie)
		{
				$ukm=$this->session->userdata('ses_ukm');	
				$proker=$this->session->userdata('ses_id_selected_proker');						
				$query=$this->db->query("SELECT * FROM tb_panitia_proker where id_ukm=$ukm AND id_proker=$proker AND id_sie=$sie");
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
				$query=$this->db->query("SELECT * FROM tb_panitia_proker where id_panitia = $id_update");
				return $query->result_array();
		}

	public function tambahdata($paket)
		{
			$this->db->insert('tb_panitia_proker', $paket);
			return $this->db->affected_rows();
		}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function modelupdate($send){
		$sql="UPDATE tb_panitia_proker SET id_proker= ?, id_ukm = ?, id_periode = ?, id_user = ?, id_sie = ?, jenis_panitia = ? WHERE id_panitia = ?";
		$query=$this->db->query($sql, array( $send['id_proker'], $send['id_ukm'], $send['id_periode'], $send['id_user'], $send['id_sie'], $send['jenis_panitia'], $send['id_panitia']));
	}	

	public function ambildataproker($proker)
		{
			$ukm=$this->session->userdata('ses_ukm');
			$query=$this->db->query("SELECT * FROM tb_panitia_proker WHERE id_ukm=$ukm AND id_proker=$proker");
			return $query->result_array();
		}
}