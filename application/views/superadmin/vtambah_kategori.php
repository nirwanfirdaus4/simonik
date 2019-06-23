<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Kategori Jobdesk</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/Data_ukm/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Tambah Data Kategori</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Tambah Kategori Jobdesk</strong></div>
      <div class="block-body">
        <form action="<?php echo base_url('superadmin/Data_kategori/tambahData') ?> " method="post">
          <div class="form-group">
            <label class="form-control-label">Kategori</label>
            <input type="text" placeholder="Masukkan Kategori" class="form-control" name="nama_kategori" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nilai</label>
            <input type="text" placeholder="range : 1-100" class="form-control" name="nilai" autocomplete="off">
          </div>
          <?php if ($this->session->flashdata('msg_over')) : ?>
            <div style="color: #ff6666;">
              <?php echo $this->session->flashdata('msg_over'); ?>  
            </div>
          <?php endif; ?>          
          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('superadmin/Data_kategori') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>