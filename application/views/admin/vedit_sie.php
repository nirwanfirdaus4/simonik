<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom" style="color: #111">Data Sie</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_sie') ?>">Data Sie</a></li>
      <li class="breadcrumb-item active">Ubah Data Sie</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong style="color: #111">Ubah Data Sie</strong></div>
      <div class="block-body">
        <form action="<?php echo base_url('admin/Data_sie/edit/'.$data[0]['id_sie']) ?> " method="post">
          <input type="hidden" name="id_sie" value="<?php echo $data[0]['id_sie']; ?>">
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Nama Sie</label>
            <input type="text" placeholder="Masukkan Nama SIE" class="form-control" name="nama_sie" autocomplete="off" value="<?php echo $data[0]['nama_sie'] ?>">
          </div>
          <input type="hidden" name="id_ukm" value="<?php echo $data[0]['id_ukm']; ?>">
          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('admin/Data_sie/') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>