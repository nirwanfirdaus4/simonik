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
      <li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/Data_ukm/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/Data_periode') ?>">Data Periode</a></li>
      <li class="breadcrumb-item active">Ubah Data Periode</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Ubah Data Periode</strong></div>
      <div class="block-body">
        <form action="<?php echo base_url('superadmin/Data_periode/edit/'.$data[0]['id_periode']) ?> " method="post">
          <input type="hidden" name="id_periode" value="<?php echo $data[0]['id_periode']; ?>">
          <div class="form-group">
            <label class="form-control-label">Tahun Periode</label>
            <input type="text" placeholder="Masukkan Tahun periode" class="form-control" name="th_periode" autocomplete="off" value="<?php echo $data[0]['th_periode'] ?>">
          </div>
          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('superadmin/Data_periode') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>