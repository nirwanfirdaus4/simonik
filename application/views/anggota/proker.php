<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Sie </h2>
    </div>
  </div>
  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <?php $no=1;?>
        <?php foreach ($array as $key) { ?>          
          <div class="col-md-3 col-sm-6">
            <a class="unline" href="<?php echo base_url('anggota/Proker/index_sie/'.$key['id_sie']) ?>">
            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">

                  <?php foreach ($convert_sie as $key_sie) { 
                        if ($key_sie['id_sie']==$key['id_sie']) {
                            $nama_sie=$key_sie['nama_sie'];
                        }
                    }
                    ?>          
                  <div class="icon"><i class="icon-user-1"></i></div><strong><?php echo $nama_sie ?></strong>
                </div>
                <div class="number dashtext-1">50%</div>
              </div>
              <div class="progress progress-template">
                <div role="progressbar" style="width: 50%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
              </div>
            </div>
          </a>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>
  <!-- Breadcrumb-->
  

  <?php $this->load->view('bagian/footer') ?>