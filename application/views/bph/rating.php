<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Rating</h2>
    </div>
  </div>
  <div class="container-fluid">
    <div class="content_dashboard space_4">
      <div class="row">

        <form action="<?php echo base_url('bph/Rate/') ?> " method="post">        
          <div class="form-group">
             <p onclick="addValue(1)">Bintang 1</p>
             <p onclick="addValue(2)">Bintang 2</p>
             <p onclick="addValue(3)">Bintang 3</p>
             <p onclick="addValue(4)">Bintang 4</p>
             <p onclick="addValue(5)">Bintang 5</p>

             <input type="hidden" name="rate" id="rate">

          </div>
          <div class="form-group space_help_button">     
            <input type="submit" value="Beri nilai" class="btn btn_dewe_color">
          </div>
        </form>

      </div>        
    </div>

  </div>

</div>

<?php $this->load->view('bagian/footer') ?>