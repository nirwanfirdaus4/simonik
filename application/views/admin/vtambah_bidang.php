<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Bidang</h2>
    </div> 
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_bidang') ?>">Data Bidang</a></li>
      <li class="breadcrumb-item active">Tambah Data Bidang</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Tambah Data Bidang</strong></div>

      <div class="block-body">
        <form action="<?php echo base_url('admin/Data_bidang/tambahData') ?> " method="post">
          <div class="form-group">
            <label class="form-control-label">Nama Bidang</label>
            <input type="text" placeholder="Nama Bidang" class="form-control" name="nama_bidang" autocomplete="off">
          </div>
          <?php $ukm=$this->session->userdata('ses_ukm');?>
          <input type="hidden" value="<?php echo $ukm; ?>" class="form-control" name="id_ukm" autocomplete="off">          
          <?php $periode=$this->session->userdata('ses_periode');?>
          <input type="hidden" value="<?php echo $periode; ?>" class="form-control" name="id_periode" autocomplete="off">          
          <div class="form-group">
            <label class="form-control-label">Nama Ketua Bidang</label>
            <select name="nm_ketua_bidang" id="nm_ketua_bidang" class="form-control">
              <option value="zero">--Pilih Ketua Bidang--</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $ketua = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=3");
              foreach($ketua->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_user?>"><?php echo $row_kat->nama_user; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Sekretaris Bidang</label>
            <select name="nm_sekretaris_bidang" id="nm_sekretaris_bidang" class="form-control">
              <option value="zero">--Pilih Sekretaris Bidang--</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $ketua = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=3");
              foreach($ketua->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_user?>"><?php echo $row_kat->nama_user; ?></option>
              <?php } ?>
            </select>
          </div>
        

          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('admin/Data_bidang') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>