<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('mdl_data_panitia');
		$this->load->library('form_validation');
		$this->load->database();
		if($this->session->userdata('masuk') == FALSE){
			redirect('Login_user','refresh');
		}		
	} 

	public function index()
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
		$paket['array']=$this->mdl_data_panitia->ambildata();		
		$this->session->set_userdata('ses_nav_proker',$nav_ses); 
		$this->load->view('anggota/index', $paket);
	}

	public function ganti_foto()
	{
            $id_user=$this->session->userdata('ses_id_user');
			if ($_FILES["berkas"]["name"] != ""){
				$config['upload_path']          = './upload/foto_user/';
				$config['allowed_types']        = 'jpg|JPG|jpeg|JPEG|png|PNG';
				$config['max_size']             = 5000;
				$config['file_name'] ="Foto_".$id_user.time();
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('berkas')){ 
					// $error =$this->upload->display_errors();
					// $this->session->set_flashdata('msg',$error);
					// $indexrow['id_new']=$id_upload;
					// $indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id_upload);
					// $this->load->view('anggota/view_detail', $indexrow);
					redirect('anggota/Proker/back_index/');
				}else{

					$cek_user=$this->db->query("SELECT * FROM tb_user");

					foreach ($cek_user->result() as $key_user) {
						if ($key_user->id_user==$id_user) {
							$nama_foto=$key_user->foto_user;
						}
					}

					if ($nama_foto!='') {
						$target= "upload/foto_user/".$nama_foto;
						if (file_exists($target)) {
							unlink($target);
						}
					}

					$data = $this->upload->data();
					$send['foto_user']=$data['file_name'];
					$send['id_user']=$id_user;

					$this->mdl_data_panitia->upload_file($send);
					// $this->mdl_data_jobdesk->update_file_backup($send);
					// $this->session->set_flashdata('msg', 'Berkas Berhasil Diupload');
					// $indexrow['id_new']=$id_upload;
					// $indexrow['data']=$this->mdl_data_jobdesk->ambildata2($id_upload);
					// $this->load->view('anggota/view_detail', $indexrow);
					redirect('anggota/Proker/back_index/');					
				}
			}else{
					redirect('anggota/Proker/back_index/');
			}
	}
}
