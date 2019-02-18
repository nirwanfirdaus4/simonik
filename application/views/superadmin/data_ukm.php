<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data UKM</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data UKM</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Data UKM</strong></div>
      <a href="<?php echo base_url('superadmin/Data_ukm/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama UKM</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($array as $key) { ?>
              <!-- MODAL -->
               <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus</h4>
                      </div>
                      <div class="modal-body">
                        <p>Semua data yang berkaitan dengan UKM ini akan dihapus<br>Yakin ingin menghapus data?</p>
                        <a href="<?php echo base_url('superadmin/Data_ukm/do_delete/' . $key['id_ukm']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                      </div>
                      <div class="modal-footer">

                      </div>
                    </div>
                  </div>
                </div> 

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['nama_ukm'] ?></td>
                <td>
                  <a href="<?php echo base_url('superadmin/Data_ukm/edit/' . $key['id_ukm']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                  <button title="Hapus Data" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><i class="fa fa-trash"></i></button>
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