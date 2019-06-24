<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <?php 
        $revisi_periode=$this->session->userdata('ses_periode');
        $queryPeriode=$this->db->query("SELECT * FROM tb_periode");
        foreach ($queryPeriode->result() as $keyRevPeriode) {
          if ($keyRevPeriode->id_periode==$revisi_periode) {
            $veriode=$keyRevPeriode->th_periode;
          }
        }

      ?>      
      <h2 class="h5 no-margin-bottom">Data Kategori Jobdesk</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/Data_ukm/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Ubah Data Kategori</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Ubah Kategori Jobdesk</strong></div>
      <div class="block-body">
        <form action="<?php echo base_url('superadmin/Data_kategori/edit/'.$data[0]['id_kategori']) ?> " method="post">
          <input type="hidden" name="id_kategori" value="<?php echo $data[0]['id_kategori']; ?>">
          <div class="form-group">
            <label class="form-control-label">Kategori</label>
            <input readonly="readonly" type="text" placeholder="Masukkan Nama kategori" class="form-control" name="nama_kategori" autocomplete="off" value="<?php echo $data[0]['nama_kategori'] ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nilai Kategori</label>
            <input type="text" placeholder="range : 1-100" class="form-control" name="nilai" autocomplete="off" value="<?php echo $data[0]['nilai'] ?>">
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