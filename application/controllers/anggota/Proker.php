<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proker extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_sie_anggota');
		$this->load->model('mdl_data_panitia');	
		$this->load->model('mdl_data_jobdesk');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Admin_login','refresh');
		}		
	} 

	public function index_proker($proker)
	{	 		
		// padahal aku set nilai session proker terpilih d kne, tapi d kontroller lanjutan wes ono

		// echo 'coba'.$proker_selected;
		$ukm=$this->session->userdata('ses_ukm');
		$user=$this->session->userdata('ses_id_user');
		
		$query_panitia=$this->db->query("SELECT * FROM tb_panitia_proker where  id_ukm=$ukm AND id_proker=$proker AND id_user=$user");
		$query_jobdesk=$this->db->query("SELECT * FROM tb_jobdesk where  id_ukm=$ukm AND id_proker=$proker AND id_user=$user");

		foreach($query_panitia->result() as $row_user)  {
			if ($row_user->jenis_panitia!='Anggota Sie' && $row_user->jenis_panitia!='Koordinator Sie' ) {

				if ($query_jobdesk->num_rows()>0) {
					$nav_ses=1;
					$page='anggota/proker'; 
					$sie=$row_user->id_sie;
					$data['array'] = $this->mdl_data_sie_anggota->ambildata($proker); 
					$data['convert_sie'] = $this->mdl_data_sie_anggota->convert_sie();					
				}else{
					$nav_ses=1;
					$page='anggota/empty_jobdesc';
					// useless
					$data[]=1; 						
				}

			}else{
				if ($row_user->jenis_panitia!='Koordinator Sie') {
					$nav_ses=0;
					$sie=$row_user->id_sie;
					$page='anggota/proker_anggota';		
					$data['jobdesk']=$this->mdl_data_sie_anggota->ambildata_jobdesk($ukm,$proker,$sie);	
					$data['sie']=$this->mdl_data_sie_anggota->bahan_convert_sie();
				}else{
					$nav_ses=2;
					$sie=$row_user->id_sie;
					$page='anggota/proker_anggota';		
					$data['jobdesk']=$this->mdl_data_sie_anggota->ambildata_jobdesk($ukm,$proker,$sie);	
					$data['sie']=$this->mdl_data_sie_anggota->bahan_convert_sie();			
				}
				$this->session->set_userdata('ses_nav_sie_anggota',$sie);
			}
		}
		$this->session->set_userdata('ses_id_selected_proker',$proker);		
		// $nilai_proker=$this->session->userdata('ses_id_selected_proker'); 
		// $this->session->set_userdata('ses_proker_fix',$nilai_proker);
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$this->load->view($page,$data); 
	}

	public function index_sie($proker)
	{	
		$nav_ses=1;
		$data['id'] = $proker;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$data['array'] = $this->mdl_data_sie_anggota->ambildata_sie($proker);
		// $data['convert_sie'] = $this->mdl_data_sie_anggota->convert_sie();
		$this->load->view('anggota/jobdesk_sie',$data);
	}
	public function back_index()
	{	
		$nav_ses=0;
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
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$paket['array']=$this->mdl_data_panitia->ambildata();			
		$this->load->view('anggota/index',$paket);
	}

	public function index_detail($id){
		$indexrow['id_new']=$id;
		$indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id);
		$this->load->view('anggota/view_detail',$indexrow);
	}

}
