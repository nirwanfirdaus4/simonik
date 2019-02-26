<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data User</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data User</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Tambah Data User</strong></div>
      <?php if ($this->session->flashdata('msg')) : ?>
        <div style="color: #ff6666;">
        <?php echo $this->session->flashdata('msg') ?>  
        </div>
      <?php endif; ?>
      <div class="block-body">
        <form action="<?php echo base_url('superadmin/Data_user/tambahData/'.$ukm_id) ?> " method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label class="form-control-label">Nama User</label>
            <input type="text" placeholder="Nama User" class="form-control" name="nama_user" autocomplete="off" required="required">
          </div>
          <div class="form-group">
            <label class="form-control-label">NIM</label>
            <input type="number" placeholder="NIM user" class="form-control" name="nim" autocomplete="off" required="required">
          </div>
          <div class="form-group">
            <input type="hidden" placeholder="" class="form-control" value="<?php echo $ukm_id ?>" name="id_ukm" autocomplete="off">        
          <div class="form-group">
            <label class="form-control-label">Telp</label>
            <input type="number" placeholder="Telp user" class="form-control" name="no_telp_user" autocomplete="off" required="required">
          </div>
          <div class="form-group">
            <label class="form-control-label">Email</label>
            <input type="email" placeholder="Email user" class="form-control" name="email_user" autocomplete="off" required="required">
          </div> 
          <div class="form-group">
            <label class="form-control-label">Periode</label>
<!--             <input type="text" placeholder="" class="form-control" name="id_periode" autocomplete="off"> -->
              <select name="id_periode" id="id_periode" class="form-control" required="required">
                <option value="zero">--Pilih Periode--</option>
                <?php 
                $pengurus = $this->db->query("SELECT * FROM tb_periode");
                foreach($pengurus->result() as $row_kat)  { ?>
                  <option value="<?php echo $row_kat->id_periode?>"><?php echo $row_kat->th_periode; ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Logo UKM</label><label style="font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 300Kb)</label><br>
            <input type="file" name="berkas" required="required">
          </div>

          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('superadmin/Data_user/detail/'.$ukm_id) ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>