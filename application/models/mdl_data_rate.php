<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_data_rate extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}


	public function modelupdate($send){
		$sql="UPDATE tb_rating SET id_ukm = ?, id_proker = ?, rate = ? WHERE id_rating = ?";
		$query=$this->db->query($sql, array( $send['id_ukm'], $send['id_proker'], $send['rate'], $send['id_rating']));
	}	
}