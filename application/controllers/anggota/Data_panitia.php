<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_panitia extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_sie_anggota');
		$this->load->model('mdl_data_panitia');		
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		 
	} 

	public function index()
	{	
		$nav_ses=1;
		$data['proker'] = $this->session->userdata('ses_id_selected_proker');
		$data['panitia'] = $this->mdl_data_panitia->ambildata();
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$this->load->view('anggota/data_panitia',$data);
	}
	public function detail($proker,$sie,$sie_user){

		$paket['ses_proker']=$proker;
		$paket['id_sie']=$sie_user;
		$paket['sie_id']=$sie; 

		$nav_ses=1;
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$paket['ses_proker']=$proker;
		// $paket['id_sie']=$sie_user;
		$paket['panitia']=$this->mdl_data_panitia->ambildata_detail($sie);	
		$paket['sie']=$this->mdl_data_panitia->ambilDataSie();	
		// session ini berfungsi untuk fungsi delete dll		
		$this->session->set_userdata('ses_nav_sie',$sie);		

		$ukm=$this->session->userdata('ses_ukm');
		$querys=$this->db->query("SELECT * FROM tb_jobdesk where id_proker=$proker and id_sie=$sie and id_ukm=$ukm");
		$quey_sie=$this->db->query("SELECT * FROM tb_sie");

		foreach ($quey_sie->result() as $key) {
			if ($key->id_sie==$sie) {
				$paket['convert_nama_sie']=$key->nama_sie;
			}
		}

		if ($querys->num_rows()>0) {
			$this->load->view('anggota/data_panitia',$paket);			
		// echo $proker.' | '.$sie;
		}else{
			$this->load->view('anggota/empty_jobdesc_panitia',$paket);						
			// echo "eong";
		}

	}
	public function tambahData($proker,$sie,$sie_user)
	{

		$data['sie_id']=$sie;		
		$data['id_sie']=$sie_user;		
		$data['ses_proker'] = $proker;	

		$nav_ses=1;
		$data['proker'] = $this->session->userdata('ses_id_selected_proker');
		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$data['sie_id']=$user=$this->session->userdata('ses_nav_sie');
		$value['id_user']=$this->input->post('nm_koor');
		$value['id_sie']=$this->input->post('nm_sie');
		$value['jenis_sie']=$this->input->post('jenis_sie');
		
		$query_sie=$this->db->query("SELECT * FROM tb_sie");
		foreach ($query_sie->result() as $key) {
			if ($key->id_sie==$sie) {
				$data['convert_sie']=$key->nama_sie;
			}
		}

		if (count($_POST) == 0) {
			$data['msg_error']="Silahkan isi semua kolom";
			$this->load->view('anggota/vtambah_panitia',$data);  
		}
		else{
			$send['id_panitia']='';
			$send['id_proker']=$data['proker'];
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['id_user']=$this->input->post('nm_koor');
			$sie=$send['id_sie']=$sie;
			$send['jenis_panitia']=$this->input->post('jenis_sie');

			// var_dump($send);
			$kembalian['jumlah']=$this->mdl_data_panitia->tambahdata($send);
			$kembalian['array']=$this->mdl_data_panitia->ambildata_detail($sie);

			$this->load->view('anggota/data_panitia',$kembalian);
			$this->session->set_flashdata('msg','Data berhasil ditambahkan');
			redirect('anggota/Data_panitia/detail/'.$data['ses_proker'].'/'.$data['sie_id'].'/'.$data['id_sie']);
		}
	}

	public function do_delete($id,$proker,$sie,$sie_user){
		$where = array('id_panitia' => $id);
		$sie=$this->session->userdata('ses_nav_sie');
		$this->mdl_data_panitia->delete_data($where,'tb_panitia_proker');
		redirect('anggota/Data_panitia/detail/'.$proker.'/'.$sie.'/'.$sie_user);
	}

	public function edit($id_update,$proker,$sie,$sie_user){
		$nav_ses=1;
		// $data['sie_id']=$sie;		
		// $data['id_sie']=$sie_user;				

		$this->session->set_userdata('ses_nav_proker',$nav_ses);
		$indexrow['ses_proker'] = $proker;
		$indexrow['sie_id']=$sie;
		$indexrow['user_id']=$this->session->userdata('ses_id_user');
		$indexrow['id_sie']=$sie_user;

		$value['id_user']=$this->input->post('nm_koor');
		$value['id_sie']=$this->input->post('nm_sie');
		$value['jenis_sie']=$this->input->post('jenis_sie');
		
		$query_sie=$this->db->query("SELECT * FROM tb_sie");
		foreach ($query_sie->result() as $key) {
			if ($key->id_sie==$sie) {
				$indexrow['convert_sie']=$key->nama_sie;
			}
		}

		if (count($_POST) == 0) {
			$indexrow['data']=$this->mdl_data_panitia->ambildata2($id_update);
			$this->load->view('anggota/vedit_panitia',$indexrow);  
		}
		else{
			$send['id_panitia']=$this->input->post('id_panitia');
			$send['id_proker']=$proker;
			$send['id_ukm']=$this->input->post('id_ukm');
			$send['id_periode']=$this->input->post('id_periode');
			$send['id_user']=$this->input->post('nm_koor');
			$sie=$send['id_sie']=$sie;
			$send['jenis_panitia']=$this->input->post('jenis_sie');

			// echo "id_panitia = ".$send['id_panitia'].'<br>';
			// echo "id_proker = ".$send['id_proker'].'<br>';
			// echo "id_ukm = ".$send['id_ukm'].'<br>';
			// echo "id_periode = ".$send['id_periode'].'<br>';
			// echo "id_user = ".$send['id_user'].'<br>';
			// echo "id_sie = ".$send['id_sie'].'<br>';
			// echo "jenis_panitia = ".$send['jenis_panitia'].'<br>';
			$kembalian['jumlah']=$this->mdl_data_panitia->modelupdate($send);
			$this->session->set_flashdata('msg', 'Data Berhasil diupdate');
			redirect('anggota/Data_panitia/detail/'.$indexrow['ses_proker'].'/'.$indexrow['sie_id'].'/'.$indexrow['id_sie']);
		}
	}
}


