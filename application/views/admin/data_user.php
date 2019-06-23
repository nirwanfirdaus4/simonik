<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <?php 
        $revisi_periode=$this->session->userdata('ses_periode');
        $revisi_ukm=$this->session->userdata('ses_ukm');
        $queryPeriode=$this->db->query("SELECT * FROM tb_periode");
        $queryUkm=$this->db->query("SELECT * FROM tb_ukm");
        foreach ($queryPeriode->result() as $keyRevPeriode) {
          if ($keyRevPeriode->id_periode==$revisi_periode) {
            $veriode=$keyRevPeriode->th_periode;
          }
        }
        foreach ($queryUkm->result() as $keyRevUkm) {
          if ($keyRevUkm->id_ukm==$revisi_ukm) {
            $vkm=$keyRevUkm->nama_ukm;
          }
        }
      ?>         
      <h2 class="h5 no-margin-bottom">Data User <?php echo $vkm." Periode ".$veriode; ?></h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data User</li>
    </ul>
  </div>

  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Data User</strong></div>
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link <?php echo ($this->uri->segment(2) == 'Data_user' ? 'active' : (isset($tab) && $tab == 'list' ? 'active' : '')); ?>" data-toggle="tab" href="#form" role="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-book"></i> Data User &nbsp;<span class="badge badge-pill badge-info"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($this->uri->segment(2) == 'Data_user' ? '' : (isset($tab) && $tab == 'import' ? 'active' : '')); ?>" data-toggle="tab" href="#import" role="tab" aria-controls="profile" aria-expanded="false"><i class="fa fa-file"></i> Import Data User</a>
        </li>
      </ul>

      <div class="tab-content">
        <div class="tab-pane <?php echo ($this->uri->segment(2) == 'Data_user' ? 'active' : (isset($tab) && $tab == 'list' ? 'active' : '')); ?>" id="form" role="tabpanel" aria-expanded="true">
          <div class="container" id="notif">
              <?php if ($this->session->flashdata('berhasil')) : ?>
                <div class="alert alert-success">
                  <?php echo $this->session->flashdata('berhasil') ?>  
                </div>
              <?php endif; ?>
            </div>
         <a style="margin-top:30px;" href="<?php echo base_url('admin/Data_user/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
         <div class="table-responsive"> 
          <table class="table table-striped table-sm" id="myTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Tipe User</th>
                <th>Foto User</th>
                <th>Aksi</th>
              </tr> 
            </thead>
            <tbody>
              <?php $no=1; $modal=0; ?>
              <?php foreach ($array as $key) { ?>

                <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus</h4>
                      </div>
                      <div class="modal-body">
                        <p>Ingin hapus data?</p>
                        <a href="<?php echo base_url('admin/Data_user/do_delete/' . $key['id_user']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                      </div>
                      <div class="modal-footer">

                      </div>
                    </div>
                  </div>
                </div>   

                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $key['nama_user'] ?><br><?php echo $key['nim'] ?></td>

                  <?php
                // $periode = $this->db->query("SELECT * FROM tb_periode");
                // $ukm = $this->db->query("SELECT * FROM tb_ukm");
                  $tipe_user = $this->db->query("SELECT * FROM tb_type_user");

                  ?>

                  <td><?php echo $key['no_telp_user'] ?> <br><?php echo $key['email_user'] ?></td>


                  <?php
                  foreach($tipe_user->result() as $row_utype)  {
                    if ($row_utype->id_type_user==$key['id_type_user']) { ?>                    
                      <td><?php echo $row_utype->nama_type_user; ?></td>
                    <?php }
                  }  
                  ?>

                  <td><img width="100" height="100" style=" border-radius: 60px 60px 60px 60px;" src="<?php echo ($key['foto_user'] != '' ? base_url('./upload/foto_user/' . $key['foto_user']) : base_url('./upload/foto_user/img_defautl.jpg')); ?>" alt="Foto UKM"></td>
                  <td>
                    <?php
                    foreach($tipe_user->result() as $row_utype2)  {
                      if ($row_utype2->id_type_user==$key['id_type_user']) { 
                        ?> 

                        <?php
                        $hasil=$row_utype2->id_type_user;
                      } }
                      if ($hasil==2) { 
                        ?>
                        <a href="<?php echo base_url('admin/Data_user/edit/' . $key['id_user']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                        <?php                  
                      }else{
                        ?>
                        <a href="<?php echo base_url('admin/Data_user/edit/' . $key['id_user']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                        <button title="Hapus Data" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><i class="fa fa-trash"></i></button>
                        <?php $modal++; }?>

                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>  
          <div class="tab-pane <?php echo ($this->uri->segment(2) == 'Data_user' ? '' : (isset($tab) && $tab == 'import' ? 'active' : '')); ?>" id="import" role="tabpanel" aria-expanded="true">
            <div class="container" id="notif">
              <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-danger">
                  <?php echo $this->session->flashdata('msg') ?>  
                </div>
              <?php endif; ?>
            </div>
            <div class="form-group" style="margin-top:25px;">
              <form action="<?php echo base_url('admin/Data_import/form/import') ?>" method="POST" enctype="multipart/form-data">
                <label class="form-control-label">File Excel </label><label style="font-size:12px; padding-left:5px;">(.csv)</label><br>
                <input type="file" name="berkas" required> 
                <input type="submit" class="btn btn-primary" value="Preview" name="preview">
              </form><br>
              <a href="<?php echo base_url().'admin/Data_import/lakukan_download' ?>" target="blank">Download Format Input Data</a>
            </div><br>


            <?php
  if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
    if(isset($upload_error)){ // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }
    
    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("admin/Data_import/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    // echo "<div style='color: red;' id='kosong'>
    // Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum terisi semua.
    // </div>";
    
    echo "<div class='table-responsive'>";

    echo "<table class='table table-striped table-sm' id='myTable'>
    <thead>
    <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kontak</th>
    <th>Tipe User</th>
    </tr> 
    </thead>
    </tr>";
    
    $numrow = 1;
    $kosong = 0;
    
    // Lakukan perulangan dari data yang ada di csv
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row){ 
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

      // Cek jika semua data tidak diisi
      if(empty($nim) && empty($nama_user) && empty($no_tlp_user) && empty($email_user) && empty($tipe_user))
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
      
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Validasi apakah semua data telah diisi
        $nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $nama_user_td = ( ! empty($nama_user))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $email_user_td = ( ! empty($email_user))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $tipe_user_td = ( ! empty($tipe_user))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        
        // Jika salah satu data ada yang kosong
        if(empty($nim) && empty($nama_user) && empty($no_tlp_user) && empty($email_user) && empty($tipe_user)){
          $kosong++; // Tambah 1 variabel $kosong
        }
        
        echo "<tr>";
        echo "<td".$nim_td.">".$nim."</td>";
        echo "<td".$nama_user_td.">".$nama_user."</td>";
        echo "<td".$email_user_td.">".$email_user."</td>";
        echo "<td".$tipe_user_td.">".$tipe_user."</td>";
        echo "</tr>";
      }
      
      $numrow++; // Tambah 1 setiap kali looping
    }
    
    echo "</table>";
    
    // Cek apakah variabel kosong lebih dari 0
    // Jika lebih dari 0, berarti ada data yang masih kosong
    if($kosong > 0){
      ?>  
      <script>
        $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
    </script>
    <?php
    }else{ // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<input type='hidden' name='berkas' value='" . $berkas . "' readonly />";
      echo "<button class='btn btn_dewe' type='submit' name='import'>Import</button> ";
      echo "<a style='margin-bottom: 34px;' class='btn btn-danger' href='".base_url("admin/Data_user")."'>Cancel</a>";
    }
    
    echo "</form>";
  }
  ?>
            <!-- <div class="table-responsive"> 
              <table class="table table-striped table-sm" id="myTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Tipe User</th>
                  </tr> 
                </thead>
              </table>
            </div> -->
          </div>
        </div>  
      </div>
    </div>
  </div>

  <?php $this->load->view('bagian/footer') ?>
  <script type="text/javascript">
  $('#notif').delay(5000).slideUp('slow');
</script>