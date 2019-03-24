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
                <form action="<?php echo base_url('anggota/Data_referensi/tampil/'.$ses_proker.'/'.$id_sie.'/'.$ses_nav) ?> " method="post">

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
                      <th>Nama Sie</th>
                      <th>File</th>
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

                        <?php
                        foreach($sie->result() as $row_sie)  {
                          if ($row_sie->id_sie==$key['id_sie']) { ?>                    
                            <td><?php echo $row_sie->nama_sie; ?></td>
                          <?php }
                        } ?>
                        <td><?php echo ($key['file_laporan'] != '' ? "<a target='blank' href='" . base_url('upload/berkas_laporan/' . $key['file_laporan']) . "'>".$key['file_laporan']. "</a>" : "Tidak ada file laporan"); ?></td>
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