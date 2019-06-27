<?php $this->load->view('bagian/header'); ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Evaluasi</h2>
    </div>
  </div>     
  <section class="no-padding-bottom">
    <div class="container-fluid">
      <div id="notifikasi">
        <?php if($this->session->flashdata('msg')):?>
          <div class="alert alert-primary">
            <?php  echo $this->session->flashdata('msg')?>
          </div>
        <?php endif ;?>
        <?php if($this->session->flashdata('mggg')):?>
          <div class="alert alert-success">
            <?php  echo $this->session->flashdata('mggg')?>
          </div>
        <?php endif ;?>
      </div> 
      <div class="public-user-block block">
        <div class="row d-flex align-items-center">                   
          <div class="col-lg-12">
            <!-- <p>Evaluasi <?php echo $nama_sie; ?> </p> -->

            <form action="<?php echo base_url('admin/Data_rekap_evaluasi/updateEvaluasi/'.$revisi_idSie) 
            ?> " method="post">
            <div class="form-group">

              <?php 
              if ($status!=0) { ?>
                <input type="hidden" name="id_evaluasi" value="<?php echo $array_eval[0]['id_evaluasi']; ?>">
                <textarea class="form-control" name="hasil_evaluasi" id="TypeHere"><?php echo $array_eval[0]['hasil_evaluasi']; ?></textarea>
              <?php }else{
                ?>
                <textarea class="form-control" name="hasil_evaluasi" id="TypeHere"></textarea>
              <?php } ?>

            </div>      

            <div class="form-group space_help_button">       
              <input type="submit" value="Simpan" class="btn btn_dewe_color">
              <a href="<?php echo base_url('admin/Data_rekap_evaluasi/') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</section>

<?php $this->load->view('bagian/footer') ?>