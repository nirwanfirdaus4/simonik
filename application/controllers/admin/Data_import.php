<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_import extends CI_Controller {
  private $filename = "import_dokumen"; // Kita tentukan nama filenya
  
  public function __construct(){
    parent::__construct();
    
    $this->load->helper(array('url','download'));   
    $this->load->model('mdl_import');
    $this->load->model('mdl_data_user_ukm');
  }
  
  public function index(){
    $data['import'] = $this->mdl_import->view();
    $this->load->view('data_user', $data);
  }
  
  public function form($tab=''){
    $data = array(); // Buat variabel $data sebagai array
    
    $default_name = $_FILES['berkas']['name'];

    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di mdl_import.php
      $upload = $this->mdl_import->upload_file($default_name);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $csvreader = PHPExcel_IOFactory::createReader('CSV');
        $loadcsv = $csvreader->load('upload/import_dokumen/'. $default_name); // Load file yang tadi diupload ke folder csv
        $sheet = $loadcsv->getActiveSheet()->getRowIterator();
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam csv yang sudha di upload sebelumnya
        $data['sheet'] = $sheet;
        $data['array']=$this->mdl_data_user_ukm->ambildata(); 
        $data['tab']=$tab; 
        $data['berkas'] = $default_name;
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    $this->load->view('admin/data_user', $data);
  }
  
  public function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    $berkas_name = $this->input->post('berkas');
    
    $csvreader = PHPExcel_IOFactory::createReader('CSV');
    $loadcsv = $csvreader->load('upload/import_dokumen/'.$berkas_name); // Load file yang tadi diupload ke folder csv
    $sheet = $loadcsv->getActiveSheet()->getRowIterator();
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // START -->
        // Skrip untuk mengambil value nya
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
        
        $get = array(); // Valuenya akan di simpan kedalam array,dimulai dari index ke 0
        foreach ($cellIterator as $cell) {
          array_push($get, $cell->getValue()); // Menambahkan value ke variabel array $get
        }
        // <-- END
        
        // Ambil data value yang telah di ambil dan dimasukkan ke variabel $get
        $nim = $get[0]; // Ambil data NIS dari kolom A di csv
        $nama_user = $get[1]; // Ambil data nama dari kolom B di csv
        $no_tlp_user = $get[2]; // Ambil data No telp dari kolom C di csv
        $email_user = $get[3]; // Ambil data email user dari kolom C di csv
        $tipe_user = $get[4]; // Ambil data tipe User dari kolom C di csv

        $data_type = $this->db->get_where('tb_type_user', array('nama_type_user' => $tipe_user))->row();
        if($data_type->id_type_user != 4){
            $username=$get[0];
            $password=$get[0]; 
          }
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'nim'=>$nim, // Insert data nim
          'nama_user'=>$nama_user, // Insert data nama
          'no_telp_user'=>$no_tlp_user, // Insert data no-tlp user
          'email_user'=>$email_user, // Insert data email
          'id_type_user'=>$data_type->id_type_user, // Insert data jenis kelamin
          'username'=>$username, // Insert data jenis kelamin
          'password'=>$password, // Insert data jenis kelamin
          'id_periode'=>$this->session->userdata('ses_periode'), // Insert data jenis kelamin
          'id_ukm'=>$this->session->userdata('ses_ukm'), // Insert data jenis kelamin
        ));
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
    $this->mdl_import->insert_multiple($data);
    
    redirect("admin/Data_user"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }

  public function lakukan_download(){
    force_download('upload/Import_data.zip',NULL);
  }
}