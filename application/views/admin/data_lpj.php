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
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_kategori/') ?>">Home</a></li>
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
              <th>Revisi</th>
              <th>Opsi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($array as $key) {
              // $modal++;
              $file="";
              $revisi="";
              $status_file="";
              $word="Ajukan LPJ";
              $class="btn btn_dewe7";
              $class2="btn btn_dewe2";
              $class3="btn btn-success";
              ?>
              <!-- MODAL -->
              <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Ajukan LPJ</h4>
                    </div>
                    <div class="modal-body">
                      <form action="<?php echo base_url('Admin/Data_lpj/upload/'.$key['id_proker']) ?>" method="post" enctype="multipart/form-data">
                       <div class="form-group" style="margin-top:25px;">                 
                         <div class="form-group">
                          <label style="font-size:12px; padding-left:5px;">File (Format Pdf maks 10MB)</label><br>
                          <input type="file" name="berkas">
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
              <td><?php

              $query_lpj=$this->db->query("SELECT * FROM tb_lpj");
              foreach ($query_lpj->result() as $keyLpj) {
                if ($keyLpj->id_proker==$key['id_proker']) {
                  $file=$keyLpj->file;
                  $status_file=$keyLpj->status_file;
                  $revisi=$keyLpj->revisi;

                }
              }
              $p=$key['id_proker'];
              $query_lpj2=$this->db->query("SELECT * FROM tb_lpj where id_proker=$p");

              if ($file==" ") {
                $file="Belum ada laporan";
              }elseif($query_lpj2->num_rows()<1){
                echo "Belum ada laporan";
              }else{
                if ($status_file=="Revisi") {
                  echo "Revisi";
                }else{
                  echo ($file != '' ? "<a class='f_color3' target='blank' href='" . base_url('upload/berkas_laporan/' . $file) . "'>".$file. "</a>" : "Belum ada laporan"); 
                }
             }

             ?>


           </td>

            <div class="modal fade" id="myModalView<?php echo $modal ?>" role="dialog">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Revisi</h4>
                  </div>
                  <div class="modal-body">
                    <p><?php echo $revisi; ?></p>
                  </div>
                  <div class="modal-footer">

                  </div>
                </div>
              </div>
            </div>
            <?php
              if ($revisi!="") { ?>
                 <td><button title="" type="button" class="<?php echo $class3; ?>" data-toggle="modal" data-target="#myModalView<?php echo $modal ?>"><i class="fa fa-eye"></i></button></td>
              <?php }else{ ?>
                 <td><button disabled="disabled" title="" type="button" class="<?php echo $class3; ?>" data-toggle="modal" data-target="#myModalView<?php echo $modal ?>"><i class="fa fa-eye"></i></button></td>
              <?php }
            ?>

           <td style="color: #111">
            <?php

            if ($status_file=="Belum ajuan") { ?>
              <button title="" type="button" class="<?php echo $class; ?>" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><?php echo $word; ?></button>
            <?php }elseif($status_file=="Menunggu validasi"){ ?>
              <button title="" type="button" class="<?php echo $class2; ?>" style="color: #fff">Menunggu validasi</button>
            <?php }elseif($status_file=="Tervalidasi"){ ?>
              <button title="" type="button" class="<?php echo $class3; ?>" >Tervalidasi</button>
            <?php }else{ ?>
              <button title="" type="button" class="<?php echo $class; ?>" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><?php echo $word; ?></button>
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