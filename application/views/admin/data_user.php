<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data User</h2>
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
      <a href="<?php echo base_url('admin/Data_user/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
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
            <?php foreach ($array as $key) {   
              ?>

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
              <div class="modal fade" id="myFoto<?php echo $modal ?>" role="dialog">
                <div class="modal-dialog modal-large">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Foto User</h4>
                    </div>
                    <div class="modal-body">
                      <center><img style=" width: 50%; margin: 4% 0 4% 0;" src="<?php echo ($key['foto_user'] != '' ? base_url('./upload/foto_user/' . $key['foto_user']) : base_url('./upload/foto_user/img_defautl.jpg')); ?>" alt="Foto User"></center>

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

                <td><i data-toggle="modal" data-target="#myFoto<?php echo $modal ?>" class="fa fa-eye"></i></td>
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
                <?php }?>

                </td>
               </tr>
             <?php $modal++; } ?>
           </tbody>
         </table>
       </div>  
     </div>
   </div>
 </div>

 <?php $this->load->view('bagian/footer') ?>