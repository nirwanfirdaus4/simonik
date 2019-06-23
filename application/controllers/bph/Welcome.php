<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller { 

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_proker');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		
	}

	public function index()
	{
		$utype=$this->session->userdata('ses_id_user');
		$bidang = $this->db->query("SELECT * FROM tb_bidang where ketua_bidang=$utype OR sekretaris_bidang=$utype");

		// UNTUK KEPERLUAN RATE
		if ($bidang->num_rows() > 0) {
			foreach ($bidang->result() as $row_bidang) {
				if ($utype==$row_bidang->ketua_bidang || $utype==$row_bidang->sekretaris_bidang) {
					$fix_bidang=$row_bidang->id_bidang;

				}
			}

			$ukm=$this->session->userdata('ses_ukm');
			$periode=$this->session->userdata('ses_periode');
			$proker0=$this->db->query("SELECT * FROM tb_daftar_proker where id_ukm=$ukm AND id_bidang=$fix_bidang AND id_periode=$periode");			

			$get_tgl_sekarang=date('Y-m-d');

			$no=0;

			if ($proker0->num_rows()>0) {


				foreach ($proker0->result() as $key_get) {

					$tgl_bahanAcara=$key_get->tanggal_proker;
					$limit=date('Y-m-d',strtotime('+5 days', strtotime($tgl_bahanAcara)));

					if($no==0){
				// echo "proker :s ".$key_get->id_proker;
						if($get_tgl_sekarang>$tgl_bahanAcara && $get_tgl_sekarang<$limit){
							$idProker=$key_get->id_proker;
							$no=1;
						}else{
							$idProker=0;
						}

					}else{

					}

				}
				$periode=$this->session->userdata('ses_periode');
				$proker=$this->db->query("SELECT * FROM tb_daftar_proker where id_ukm=$ukm AND id_bidang=$fix_bidang AND id_periode");
				$proker1=$this->db->query("SELECT * FROM tb_daftar_proker where id_ukm=$ukm AND id_bidang=$fix_bidang AND id_proker=$idProker AND id_periode");



				if ($proker->num_rows() > 0) {
					$tgl_sekarang=date('Y-m-d');
					


					if ($proker1->num_rows() > 0) {
						foreach ($proker1->result() as $row_proker) {
							$tgl_acara=$row_proker->tanggal_proker;
							$proker_selesai=$row_proker->id_proker;	
							$limit=date('Y-m-d',strtotime('+5 days', strtotime($tgl_acara)));

							if ($tgl_sekarang>$tgl_acara && $tgl_sekarang<$limit) {

								$cek_rating=$this->db->query("SELECT * FROM tb_rating where id_ukm=$ukm AND id_proker=$proker_selesai");


								if ($cek_rating->num_rows()>0) {
									foreach ($cek_rating->result() as $cek) {
										$hasil_cek=$cek->rate;
									}							
								}else{
									$hasil_cek=0;
								}

								if ($hasil_cek==0) {
									$this->session->set_userdata('ses_date_rate',$tgl_acara);			
									$isi_rate=1;
								}else{
									$isi_rate=0;
								}



							}else{
					//untuk mencegah error jika tidak ada yg dihasilkan dari query $proker
								$isi_rate=0;				
							}

						}
					}else{
						$isi_rate=0;
					}

				}else{
					$this->load->view('bph/empty_proker_bidang');
				}




				// echo "rated : ".$isi_rate;
				if ($isi_rate==1) {
					$query_proker=$this->db->query("SELECT * FROM tb_daftar_proker where id_proker=$proker_selesai");
					foreach ($query_proker->result() as $key) {
						$send['nama_proker']=$key->nama_proker;
					}
					$this->load->view('bph/rating',$send);			
				}else{
					foreach ($bidang->result() as $row_bidang) {
						if ($utype==$row_bidang->ketua_bidang || $utype==$row_bidang->sekretaris_bidang) {
							$fix_bidang=$row_bidang->id_bidang;
							$page='bph/dashboard';
							$paket['array']=$this->mdl_data_proker->ambildata_bph_dashboard($fix_bidang);			
						}else{
							$page='bph/empty_status_bph';
						}
					}
					$this->load->view($page,$paket);			
				}	
			}else{
				$this->load->view('bph/empty_proker_bidang');	
			}




		}else{
			$this->load->view('bph/empty_status_bph');
		}
	}
}
