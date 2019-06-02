<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Rating Program Kerja</h2>
    </div>
  </div>
  <div class="container-fluid">
    <div class="content_dashboard space_4">
      <div class="row">
<div class="col-lg-12">
        <center>
        <h4 class="congrats_rate">Selamat, Proker kita <i><b style="font-size: 105%;"> <?php echo $nama_proker; ?></b></i> telah selesai</h4>
        <p>Silahkan beri nilai untuk program kerja ini</p>
        <p></p>
        <form action="<?php echo base_url('bph/Rate/') ?> " method="post">        
          <div class="form-group">
             <i id="star_1" onmouseover="onHover(1)" class="fa fa-star primary0"></i>
             <i id="star_2" onmouseover="onHover(2)" class="fa fa-star primary0"></i>
             <i id="star_3" onmouseover="onHover(3)" class="fa fa-star primary0"></i>
             <i id="star_4" onmouseover="onHover(4)" class="fa fa-star primary0"></i>
             <i id="star_5" onmouseover="onHover(5)" class="fa fa-star primary0"></i>
<!-- #ffda44 -->
             <input type="hidden" name="rate" id="rate">

          </div>
          <div class="form-group space_help_button">     
            <input type="submit" value="Beri nilai" class="btn btn_dewe_color">
          </div>
        </form>
</center>
</div>
      </div>        
    </div>

  </div>

</div>

<?php $this->load->view('bagian/footer') ?>