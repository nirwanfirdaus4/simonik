<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data UKM</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/Data_ukm/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/Data_ukm') ?>">Data UKM</a></li>
      <li class="breadcrumb-item active">Tambah Data UKM</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Tambah Data UKM</strong></div>
      <div class="block-body">
        <form action="<?php echo base_url('superadmin/Data_ukm/tambahData') ?> " method="post">
          <div class="form-group">
            <label class="form-control-label">Nama UKM</label>
            <input type="text" placeholder="Masukkan Nama UKM" class="form-control" name="nama_ukm" autocomplete="off">
          </div>
          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('superadmin/Data_ukm') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>