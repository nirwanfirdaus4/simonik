<?php $this->load->view('bagian/header'); ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <?php foreach ($array as $key) { 
        $bahan_proker=$key['id_proker'];
        $bahan_periode=$key['id_periode'];
      }

      $proker = $this->db->query("SELECT * FROM tb_daftar_proker");
      $periode = $this->db->query("SELECT * FROM tb_periode");

      foreach ($proker->result() as $l_proker) {
        if ($l_proker->id_proker==$bahan_proker) {
          $label_proker=$l_proker->nama_proker;
        }
      }
      foreach ($periode->result() as $l_periode) {
        if ($l_periode->id_periode==$bahan_periode) {
          $label_periode=$l_periode->th_periode;
        }
      }
      ?>
      <h2 class="h5 no-margin-bottom">Data Referensi : <?php echo $label_proker; ?> | <?php echo $label_periode; ?></h2>
    </div>
  </div>
  <section class="no-padding-bottom">
    <div class="container-fluid">
      <div class="public-user-block block">

        <div class="row d-flex align-items-center">
          <div class="col-lg-12">
            <div class="block">

              <div class="table-responsive"> 
                <table class="table table-striped table-sm" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Sie</th>
                      <th>Jobdesk</th>
                      <th>File Laporan</th>
                      <th>Evaluasi</th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php $no=1; $modal=0; ?>
                    <?php foreach ($array as $key) { 
                      ?>

                      <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Evaluasi</h4>
                            </div>
                            <div class="modal-body">
                             <?php

                             $get_eval = $this->db->query("SELECT * FROM tb_evaluasi");

                             foreach ($get_eval->result() as $getVal) {

                              if ($getVal->id_sie==$key['id_sie'] && $getVal->id_ukm==$key['id_ukm'] && $getVal->id_proker==$key['id_proker'] && $getVal->id_periode==$key['id_periode']) {
                                $eval = $getVal->hasil_evaluasi; 
                                echo $eval;
                              }
                            }


                            ?>
                          </div>
                          <div class="modal-footer">

                          </div>
                        </div>
                      </div>
                    </div>   

                    <tr>
                      <td><?php echo $no++; ?></td>
                      <?php
                      $user = $this->db->query("SELECT * FROM tb_ukm");
                      $sie = $this->db->query("SELECT * FROM tb_sie");
                      $jobdesk = $this->db->query("SELECT * FROM tb_jobdesk");

                      foreach($sie->result() as $row_sie)  {
                        if ($row_sie->id_sie==$key['id_sie']) { ?>                    
                          <td><?php echo $row_sie->nama_sie; ?></td>
                        <?php }
                      } ?>
                      <?php
                      foreach($jobdesk->result() as $row_jobdesk)  {
                        if ($row_jobdesk->id_jobdesk==$key['id_jobdesk']) { ?>                    
                          <td><?php echo $row_jobdesk->nama_jobdesk; ?></td>
                        <?php }
                      } ?>                    
                      <td><?php echo $key['file_laporan']; ?></td>

                      <td>
                        <button title="Hapus Data" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><i class="fa fa-eye"></i></button>
                      </td>

                      <?php $modal++;  }?>

                    </tr>

                  </tbody>
                </table>
              </div>  
            </div>
          </div>
        </div>         
      </div>
    </div>
  </section>

  <?php $this->load->view('bagian/footer') ?>