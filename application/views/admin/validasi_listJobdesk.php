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
      $revisi_proker=$this->session->userdata('ses_validasi_proker');
      $queryPeriode=$this->db->query("SELECT * FROM tb_periode");
      $queryUkm=$this->db->query("SELECT * FROM tb_ukm");
      $queryProker=$this->db->query("SELECT * FROM tb_daftar_proker");

      foreach ($queryProker->result() as $keyProker) {
        if ($keyProker->id_proker==$revisi_proker) {
          $Proker=$keyProker->nama_proker;
        }
      }
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
      <h2 class="h5 no-margin-bottom" style="color: #111">Validasi Proker <?php echo $Proker." Periode ".$veriode; ?></h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_proker/validasi') ?>">Program kerja</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_proker/validasi_sie/'.$revisi_proker) ?>">Sie Proker</a></li>
      <li class="breadcrumb-item active">Data Jobdesk</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th style="color: #111">No</th>
              <th style="color: #111">Nama Jobdesk</th>
              <th style="color: #111">File Laporan</th>
              <th style="color: #111">Status</th>
              <th style="color: #111">Validasi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($array as $key) { 

            $modal++;
              ?>

             <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Validasi Jobdesk</h4>
                  </div>
                  <div class="modal-body">
                    <form action="<?php echo base_url('admin/Data_proker/do_validasi/' .$help_proker."/".$help_sie."/". $key['id_jobdesk']) ?>" method="post" enctype="multipart/form-data">
                     <div class="form-group" style="margin-top:25px;">                  
                      <select name="status_validasi" class="form-control">
                        <option value="Tervalidasi">Sudah selesai</option>                              
                        <option value="Belum selesai">Belum selesai</option>                        
                      </select> 
                      <input type="submit" value="Validasi" class="btn btn_dewe_color" style="margin-top:5%;">
                    </div>
                  </form>
                </div>
                <div class="modal-footer">

                </div>
              </div>
            </div>
          </div>

          <tr>
            <td style="color: #111"><?php echo $no++ ?></td>
            <td style="color: #111"><?php echo $key['nama_jobdesk'] ?></td>
            <td style="color: #111"><?php echo $key['file_laporan'] ?></td>
            <td style="color: #111"><?php echo $key['status_jobdesk'] ?></td>

            <?php
            if ($key['validasi']=="Tervalidasi") {
              $class="btn btn-success";
              $word="Sudah validasi";
              $v=1;
            }elseif($key['validasi']=="Menunggu validasi"){
              $class="btn btn_dewe2";                  
              $word="Menunggu validasi";
              $v=2;
            }else{
              $class="btn btn-danger";
              $word="Belum selesai";
              $v=3;
            }

            if ($v==1) { ?>
              <td style="color: #111">
                <button title="" type="button" class="<?php echo $class; ?>" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><?php echo $word; ?></button>
              </td>
            <?php }elseif($v==2){ ?>
              <td style="color: #111">
                <button title="" type="button" class="<?php echo $class; ?>" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><?php echo $word; ?></button>
              </td>
            <?php }else{ ?>
              <td style="color: #111">
                <button title="" type="button" class="<?php echo $class; ?>"><?php echo $word; ?></button>
              </td>
            <?php } ?>

            <?php  } ?>
          </tr>

        </tbody>
      </table>
    </div>  
  </div>
</div>
</div>

<?php $this->load->view('bagian/footer') ?>