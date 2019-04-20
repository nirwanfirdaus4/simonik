<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');

		// Cek Deadline
		$semua_jobdesk = $this->db->get_where('tb_jobdesk', array('status_jobdesk' => 'Belum Dikerjakan'))->result_array();

		foreach($semua_jobdesk as $jobdesk) {
			$deadline = $jobdesk['deadline'];

			$diff = abs(time() - strtotime($deadline));

			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			if($years == 0 && $months == 0 && $days >= 0 && $days <= 1) {
				$id_proker = $jobdesk['id_proker'];
				$id_sie = $jobdesk['id_sie'];
				$id_ukm = $jobdesk['id_ukm'];

				$semua_panitia = $this->db->get_where('tb_panitia_proker', array('id_proker' => $id_proker, 'id_sie' => $id_sie, 'id_ukm' => $id_ukm))->result_array();

				foreach($semua_panitia as $panitia) {
					$data_notifikasi = array(
						'konten_notifikasi' => 'Test.',
						'penerima_notifikasi' => $panitia['id_user'],
						'tautan_notifikasi' => site_url('anggota/Proker/index_detail/' . $jobdesk['id_jobdesk'] . '/' . $jobdesk['id_proker'] . '/' . $jobdesk['id_sie'])
					);

					// Cek Notifikasi
					$tanggal_sekarang = date('Y-m-d', time());
					$cek_notifikasi = $this->db->query("SELECT * FROM tb_notifikasi WHERE tanggal_notifikasi LIKE '%" . $tanggal_sekarang . "%'")->result_array();

					if(count($cek_notifikasi) == 0) {
						$this->db->insert('tb_notifikasi', $data_notifikasi);
					}

				}
			}
		}

		$this->load->view('login');
	}
}
