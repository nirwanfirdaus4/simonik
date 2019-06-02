<?php $this->load->view('bagian/header'); ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Referensi</h2>
    </div>
  </div>
  <section class="no-padding-bottom">
    <div class="container-fluid">
      <div class="public-user-block block">
        <!-- <div class="row d-flex align-items-center">                   
          <div class="col-lg-12">
            <div class="item"><i class="icon-info"></i><strong>Data Referensi</strong></div>
          </div>

        </div> -->

        <div class="row d-flex align-items-center">
          <div class="col-lg-12">
            <div class="block">

              <div class="table-responsive"> 
                <table class="table table-striped table-sm" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Proker</th>
                      <th>Nama Sie</th>
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

                              // echo "<br> ukm :".$key['id_ukm'];
                              // echo "<br> sie :".$key['id_sie'];
                              // echo "<br> proker :".$key['id_proker'];
                              // echo "<br> periode :".$key['id_periode'];
                              // echo "<br> ukm :".$getVal->id_ukm;
                              // echo "<br> proker :".$getVal->id_proker;
                              // echo "<br> sie Val :".$getVal->id_sie;
                              // echo "<br> periode :".$getVal->id_periode;

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
                        $proker = $this->db->query("SELECT * FROM tb_daftar_proker");
                        $sie = $this->db->query("SELECT * FROM tb_sie");
                        $periode = $this->db->query("SELECT * FROM tb_periode");

                        foreach($periode->result() as $row_periode)  {
                          if ($row_periode->id_periode==$key['id_periode']) { ?>                    
                            <td><?php echo $row_periode->th_periode; ?></td>
                          <?php }
                        } ?>

                        <?php
                        foreach($proker->result() as $row_proker)  {
                          if ($row_proker->id_proker==$key['id_proker']) { ?>                    
                            <td><?php echo $row_proker->nama_proker; ?></td>
                          <?php }
                        } ?>

                        <?php
                        foreach($sie->result() as $row_sie)  {
                          if ($row_sie->id_sie==$key['id_sie']) { ?>                    
                            <td><?php echo $row_sie->nama_sie; ?></td>
                          <?php }
                        } ?>

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