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
        </div>
      </div>
    </section>

    <?php $this->load->view('bagian/footer') ?>