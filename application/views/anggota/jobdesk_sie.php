<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Progress Sie</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('anggota/Proker/index_sie') ?>">Safari Dakwah</a></li>
      <li class="breadcrumb-item active">Progress</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Ketua Pelaksana</strong></div>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="">
          <thead>
            <tr>
              <th>No</th>
              <th>Jobdesk</th>
              <th>Mulai</th>
              <th>Deadline</th>
              <th>Perubahan terakhir</th>
              <th>Status</th>
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
                      <a href="<?php echo base_url('anggota/Proker/do_delete/' . $key['id_jobdesk']) ?>" title="Hapus Data"><button type="button" class="btn btn-primary" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>   

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['nama_jobdesk'] ?></td>
                <td><?php echo $key['startline'] ?></td>
                <td><?php echo $key['deadline'] ?></td>
                <td><?php echo $key['id_user'] ?></td>
                <td><?php echo $key['status_jobdesk'] ?></td>

                <?php $modal++; }?>
              </tr>

            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>

  <?php $this->load->view('bagian/footer') ?>