<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_import extends CI_Model {

  public function view(){
    return $this->db->get('tb_user')->result(); // Tampilkan semua data yang ada di tabel siswa
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){

    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './upload/import_dokumen';
    $config['allowed_types'] = 'csv|xlsx|xls';
    $config['max_size']  = '4000';
    $config['overwrite'] = false;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if ( ! $this->upload->do_upload('berkas')){ 
          $error =$this->upload->display_errors();
          // // var_dump($error);
          $this->session->set_flashdata('msg',$error);
          redirect('admin/Data_user');
        }
    else if($this->upload->do_upload('berkas')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('tb_user', $data);
  }
}