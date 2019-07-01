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
      $queryPeriode=$this->db->query("SELECT * FROM tb_periode");
      foreach ($queryPeriode->result() as $keyRevPeriode) {
        if ($keyRevPeriode->id_periode==$revisi_periode) {
          $veriode=$keyRevPeriode->th_periode;
        }
      }

      ?>      
      <h2 class="h5 no-margin-bottom">Data Laporan Pertanggung Jawaban<?php echo $veriode; ?></h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/Data_kategori/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data LPJ</li>
    </ul>
  </div>

  <div class="col-lg-12">
    <div class="block">
      <!--       <div class="title"><strong>Data UKM</strong></div> -->
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Proker</th>
              <th>Tanggal acara</th>
              <th>File LPJ</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($array as $key) { 
              $lpj="";
              $status_file="";
              ?>

              <!-- MODAL -->
              <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Validasi</h4>
                    </div>
                    <div class="modal-body">
                      <p>Dengan memvalidasi laporan berikut, anda menyetujui bahwa LPJ program kerja ini telah benar</p>
                      <a href="<?php echo base_url('superadmin/Data_lpj/validasi/'. $key['id_proker']) ?>" title="Validasi"><button type="button" class="btn btn-success">Validasi <i class="fa fa-check"></i></button></a>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="myModalT<?php echo $modal ?>" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Revisi</h4>
                    </div>
                    <div class="modal-body">
                      <p>Dengan merevisi laporan berikut, silahkan berikan pesan revisi anda dibawah ini</p>
 
                      <form action="<?php echo base_url('superadmin/Data_lpj/tolak/'.$key['id_proker']) ?>" method="post" enctype="multipart/form-data">
                       <div class="form-group" style="margin-top:25px;">                 
                         <div class="form-group">
                          <!-- <label style="font-size:12px; padding-left:5px;">File (Format Pdf maks 10MB)</label><br> -->
                          <!-- <input type="file" name="berkas"> -->
                          <textarea class="form-control" name="isi_revisi" id="TypeHere"></textarea>
                        </div> 
                        <input type="submit" value="Submit" class="btn btn_dewe_color" style="margin-top:5%;">
                      </div>
                    </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div> 

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['nama_proker'] ?></td>
                <td><?php echo $key['tanggal_proker'] ?></td>
                <td>
                  <?php
                  $queryLpj=$this->db->query("SELECT * FROM tb_lpj");

                  foreach ($queryLpj->result() as $keyLpj) {
                    if ($key['id_proker']==$keyLpj->id_proker) {
                      $lpj=$keyLpj->file;
                      $status_file=$keyLpj->status_file;
                    } 
                  }

                  if ($lpj!="") { ?>
                    <p><?php
                        echo ($lpj != '' ? "<a target='blank' class='f_color3' href='" . base_url('upload/berkas_laporan/' . $lpj) . "'>".$lpj. "</a>" : "Belum ada laporan");
                      ?>
                    </p>

                    <?php if ($status_file!="Tervalidasi") { ?>
                      <label><a class="f_color" href="" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"> Validasi</a> | <a class="f_color2" href="" data-toggle="modal" data-target="#myModalT<?php echo $modal ?>">Revisi</a></label>
                    <?php }else{

                          }
                  }else{
                    echo "Belum ada laporan";
                  }
                  ?>
                </td>
                <td>
                  <?php

                  if ($status_file=="Tervalidasi") { ?>
                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i> Tervalidasi</button>
                  <?php }elseif ($status_file=="Menunggu validasi") { ?>
                    <button type="button" class="btn btn_dewe2">Menunggu validasi</button>
                  <?php }else{ ?>
                   <a href="<?php echo base_url('superadmin/Data_lpj/reminder/' . $key['id_proker']) ?>" title="Send email"><button type="button" class="btn btn_dewe7"><i class="fa fa-envelope"></i> Kirim pengingat</button></a>                   
                 <?php }

                 ?>
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
 <script type="text/javascript">
  $('#notifikasi').delay(5000).slideUp('slow');
</script>