<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Program Kerja</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Program Kerja</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Data Program Kerja</strong></div>
      <a href="<?php echo base_url('admin/Data_proker/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Proker</th>
              <th>Ketua Proker</th>
              <th>Tanggal Proker</th>
              <th>UKM</th>
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
                      <a href="<?php echo base_url('superadmin/Data_user/do_delete/' . $key['id_user']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>   
                         
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['nama_proker'] ?></td>
                <?php
                $user = $this->db->query("SELECT * FROM tb_user");
                $ukm = $this->db->query("SELECT * FROM tb_ukm");

                foreach($user->result() as $row_user)  {
                  if ($row_user->id_user==$key['ketua_proker']) { ?>                    
                    <td><?php echo $row_user->nama_user; ?></td>
                <?php }
                } ?>

                <td><?php echo $key['tanggal_proker'] ?></td>

                
                <?php
                foreach($ukm->result() as $row_ukm)  {
                  if ($row_ukm->id_ukm==$key['id_ukm']) { ?>                    
                    <td><?php echo $row_ukm->nama_ukm; ?></td>
                <?php }
                }  
                ?>
               
                <td>
                  <a href=" <?php echo base_url('superadmin/Data_proker/edit/' . $key['id_proker']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                  <button title="Hapus Data" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><i class="fa fa-trash"></i></button>
                <?php $modal++; }?>

                </td>
               </tr>
            
           </tbody>
         </table>
       </div>  
     </div>
   </div>
 </div>

 <?php $this->load->view('bagian/footer') ?>