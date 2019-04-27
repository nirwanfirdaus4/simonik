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
              <div class="title"><strong>Pilih Periode :</strong></div>

              <div class="block-body">
                <form action="<?php echo base_url('bph/Data_referensi/tampil') ?> " method="post">

                  <div class="form-group">
                    <!-- <label class="form-control-label">Nama Ketua Bidang</label> -->
                    <select name="nm_periode" id="nm_periode" class="form-control">
                      <option value="zero">--Pilih Periode--</option>
                      <?php 
                      $ukm=$this->session->userdata('ses_ukm');

                      foreach($periode as $row_periode)  { ?>
                        <option value="<?php echo $row_periode['id_periode']?>"><?php echo $row_periode['th_periode']; ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group space_help_button">       
                    <input type="submit" value="Tampilkan" class="btn btn_dewe_color">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>  
        <div class="row d-flex align-items-center">
          <div class="col-lg-12">
            <div class="block">

              <div class="table-responsive"> 
                <table class="table table-striped table-sm" id="myTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Program kerja</th>
                      <th>Rating</th>
                      <th>Opsi</th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php $no=1; $modal=0; ?>
                    <?php foreach ($array as $key) { 
                      ?>

                      <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hapus</h4>
                            </div>
                            <div class="modal-body">
                              <p>Ingin hapus data?</p>
                              <a href="<?php echo base_url('admin/Data_bidang/do_delete/' . $key['id_bidang']) ?>" title="Hapus Data"><button type="button" class="btn btn-primary" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
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

                        <td>

                      <?php 

                        $bahan_rating = $this->db->query("SELECT * FROM tb_rating");

                        foreach ($bahan_rating->result() as $keyo) {

                          if ($keyo->id_ukm==$key['id_ukm'] && $keyo->id_proker==$key['id_proker'] && $keyo->id_periode==$key['id_periode']) {
                            $index_rate=$keyo->rate;
                            // echo "eong";
                            // echo "<br>"."id_ukm ".$keyo->id_ukm."<br>";
                            // echo "<br>"."id_proker ".$keyo->id_proker."<br>";
                            // echo "<br>"."id_periode ".$keyo->id_periode."<br>";
                          }else{
                            // echo "waa";
                          }
                        }


                        if($index_rate==20){ ?>
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                       <?php }elseif ($index_rate==40) { ?>
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>
                       <?php }elseif ($index_rate==60) { ?>
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>
                       <?php }elseif ($index_rate==80) { ?>
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary4"></i>
                       <?php }elseif ($index_rate==100) { ?>
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i>                          
                         <i class="fa fa-star primary3"></i> 
                       <?php }else{ ?>
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>                          
                         <i class="fa fa-star primary4"></i>
                       <?php } ?>
                        </td>
                        <td>
                          <!-- <?php echo "Detail"; ?> -->
                          <a href="<?php echo base_url('bph/Data_referensi/view_sie/'.$key['id_proker']) ?>" title="Lihat"><button type="button" class="btn btn-success">Lihat</button></a>
                        </td>
                        <td>
                          <?php $modal++; }?>

                        </td>
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