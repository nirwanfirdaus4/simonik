<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Proker Bidang Syi'ar</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Program Kerja</li>
    </ul>
  </div>
  <div class="container-fluid">
    <div class="content_dashboard space_4">
      <div class="row">

        <p style="margin-left: 1.4%;">Mohon maaf, Akun anda belum terdaftar dalam bidang tertentu<br>silahkan hubungi administrator anda</p>

      </div>        
    </div>

  </div>

</div>

<?php $this->load->view('bagian/footer') ?>