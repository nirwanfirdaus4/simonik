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
            <?php foreach ($array as $key) { ?>

              <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus</h4>
                    </div>
                    <div class="modal-body">
                      <p>Ingin hapus data?</p>
                      <a href="<?php echo base_url('admin/Data_proker/do_delete/' . $key['id_proker']) ?>" title="Hapus Data"><button type="button" class="btn btn-primary" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
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

                <td style="color: #111">
                  <a href="<?php echo base_url('admin/Data_proker/validasi_jobdesk/' . $key['id_jobdesk']) ?>" title="Validasi"><button type="button" class="btn btn-success"><i class="fa fa-eye"></i></button></a>
                </td>
              <?php } ?>
              </tr>

            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>

  <?php $this->load->view('bagian/footer') ?>