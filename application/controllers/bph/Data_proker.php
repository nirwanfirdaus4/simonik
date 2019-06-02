<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_proker extends CI_Controller {

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
		
		if ($bidang->num_rows() > 0) {

			$nav_ses=1;
			$paket['color1']='#8e44ad';
			$paket['color2']='#2980b9';
			$paket['color3']='#c0392b';
			$paket['color4']='#27ae60';
			$paket['color5']='#d35400';
			$paket['color6']='#16a085';
			$paket['color7']='#cc0f80';
			$paket['color8']='#504f45';
			$paket['color9']='#deb617';
			$paket['color10']='#7f8c8d';
			$utype=$this->session->userdata('ses_id_user');
			$bidang = $this->db->query("SELECT * FROM tb_bidang where ketua_bidang=$utype OR sekretaris_bidang=$utype");
			foreach ($bidang->result() as $row_bidang) {
				if ($utype==$row_bidang->ketua_bidang || $utype==$row_bidang->sekretaris_bidang) {
					$fix_bidang=$row_bidang->id_bidang;
			
			$ukm=$this->session->userdata('ses_ukm');
			$proker=$this->db->query("SELECT * FROM tb_daftar_proker where id_ukm=$ukm AND id_bidang=$fix_bidang");

			if ($proker->num_rows()>0) {
				$page='bph/data_proker';
				$paket['array']=$this->mdl_data_proker->ambildata_proker_bph($fix_bidang);			
			}else{	
				$page='bph/empty_proker_bidang';
			}
			
				}else{
					$page='bph/data_proker_error';
				}
			}		

			$this->session->set_userdata('ses_nav_proker',$nav_ses); 
			$this->load->view($page,$paket);			
		}else{
			$this->load->view('bph/empty_status_bph');
		}	

	}

	public function index_proker($proker)
	{	 		

		$paket['array']=$this->mdl_data_proker->ambildata_sie_bph($proker);	
		$paket['nama_proker']=$this->mdl_data_proker->namaProker_bph($proker);	
		$paket['convert_sie'] = $this->mdl_data_proker->convert_sie();
		$this->session->set_userdata('ses_id_selected_proker',$proker);							
		$this->load->view('bph/proker',$paket); 
	}	
	public function index_sie($sie)
	{	
		$nav_ses=1;
		$data['proker_id'] = $this->session->userdata('ses_id_selected_proker');
		$data['id'] = $sie;
		$data['nama_proker']=$this->mdl_data_proker->namaProker_bph($data['proker_id']);
		$data['nama_sie']=$this->mdl_data_proker->namaSie_bph($sie);
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$data['array'] = $this->mdl_data_proker->ambildata_sie($sie);
		$this->load->view('bph/jobdesk_sie',$data);
	}
}
