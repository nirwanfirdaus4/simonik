<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Periode</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Periode</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Tambah Data Periode</strong></div>
      <div class="block-body">
        <form action="<?php echo base_url('superadmin/Data_periode/tambahData') ?> " method="post">
          <div class="form-group">
            <label class="form-control-label">Tahun Periode</label>
            <input type="text" placeholder="Masukkan Tahun Periode" class="form-control" name="th_periode" autocomplete="off">
          </div>
          <div class="form-group">       
            <input type="submit" value="Simpan" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>