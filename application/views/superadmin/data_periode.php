<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Periode</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Periode</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Data Periode</strong></div>
      <a href="<?php echo base_url('superadmin/Data_periode/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Tahun periode</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; ?>
            <?php foreach ($array as $key) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['th_periode'] ?></td>
                <td>
                  <a href="<?php echo base_url('superadmin/Data_periode/edit/' . $key['id_periode']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                  <a href="<?php echo base_url('superadmin/Data_periode/do_delete/' . $key['id_periode']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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