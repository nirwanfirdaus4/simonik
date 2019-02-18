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
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
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
              <th>NIM</th>
              <th>UKM</th>
              <th>Kontak</th>
              <th>Tipe User</th>
              <th>Periode</th>
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
                <td><?php echo $key['nama_user'] ?></td>
                <td><?php echo $key['nim'] ?></td>
                <?php
                $periode = $this->db->query("SELECT * FROM tb_periode");
                $ukm = $this->db->query("SELECT * FROM tb_ukm");
                $tipe_user = $this->db->query("SELECT * FROM tb_type_user");

                foreach($ukm->result() as $row_ukm)  {
                  if ($row_ukm->id_ukm==$key['id_ukm']) { ?>                    
                    <td><?php echo $row_ukm->nama_ukm; ?></td>
                <?php }
                } ?>

                <td><?php echo $key['no_telp_user'] ?> <br><?php echo $key['email_user'] ?></td>

                
                <?php
                foreach($tipe_user->result() as $row_utype)  {
                  if ($row_utype->id_type_user==$key['id_type_user']) { ?>                    
                    <td><?php echo $row_utype->nama_type_user; ?></td>
                <?php }
                }  
                ?>
                <?php
                foreach($periode->result() as $row_periode)  {
                  if ($row_periode->id_periode==$key['id_periode']) { ?>                    
                    <td><?php echo $row_periode->th_periode; ?></td>
                <?php }
                }  
                ?>
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
   </div>
 </div>

 <?php $this->load->view('bagian/footer') ?>