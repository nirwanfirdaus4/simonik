<?php $this->load->view('bagian/header'); ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Panitia <?php echo $convert_nama_sie; ?></h2>
    </div>
  </div>
  <section class="no-padding-bottom">
    <div class="container-fluid">
      <div class="public-user-block block">
        <div class="row d-flex align-items-center">                   
          <div class="col-lg-12">
            <center><div class="item"><i class="icon-info"></i><br><strong>Silahkan menambahkan jobdesk terlebih dahulu pada <?php echo $convert_nama_sie; ?></strong></div></center>
          </div>
<!--           <div class="col-lg-6">
            <div class="item"><i class="icon-info"></i><strong>Selamat Datang di Aplikasi SiMonik</strong></div>
          </div> -->
        </div>
      </div>
    </div>
  </section>

    <?php $this->load->view('bagian/footer') ?>