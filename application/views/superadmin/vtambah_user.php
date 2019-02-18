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

      <div class="block-body">
        <form action="<?php echo base_url('superadmin/Data_user/tambahData') ?> " method="post">
          <div class="form-group">
            <label class="form-control-label">Nama User</label>
            <input type="text" placeholder="Nama User" class="form-control" name="nama_user" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">NIM</label>
            <input type="text" placeholder="NIM user" class="form-control" name="nim" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">UKM</label>
<!--             <input type="text" placeholder="" class="form-control" name="id_ukm" autocomplete="off"> -->
              <select name="id_ukm" id="id_ukm" class="form-control">
              <option value="zero">--Pilih UKM--</option>
              <?php 
              $pengurus = $this->db->query("SELECT * FROM tb_ukm");
              foreach($pengurus->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_ukm?>"><?php echo $row_kat->nama_ukm; ?></option>
              <?php } ?>
              </select>
          </div>          
          <div class="form-group">
            <label class="form-control-label">Telp</label>
            <input type="text" placeholder="Telp user" class="form-control" name="no_telp_user" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Email</label>
            <input type="text" placeholder="Email user" class="form-control" name="email_user" autocomplete="off">
          </div> 
          <div class="form-group">
            <label class="form-control-label">Tipe User</label>
            <!-- <input type="text" placeholder="" class="form-control" name="id_type_user" autocomplete="off"> -->
              <select name="id_type_user" id="id_type_user" class="form-control">
                <option value="zero">--Pilih Tipe User--</option>
                <?php 
                $pengurus = $this->db->query("SELECT * FROM tb_type_user");
                foreach($pengurus->result() as $row_kat)  { ?>
                  <option value="<?php echo $row_kat->id_type_user?>"><?php echo $row_kat->nama_type_user; ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Periode</label>
<!--             <input type="text" placeholder="" class="form-control" name="id_periode" autocomplete="off"> -->
              <select name="id_periode" id="id_periode" class="form-control">
                <option value="zero">--Pilih Periode--</option>
                <?php 
                $pengurus = $this->db->query("SELECT * FROM tb_periode");
                foreach($pengurus->result() as $row_kat)  { ?>
                  <option value="<?php echo $row_kat->id_periode?>"><?php echo $row_kat->th_periode; ?></option>
                <?php } ?>
              </select>

          </div>

          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('superadmin/Data_user') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>