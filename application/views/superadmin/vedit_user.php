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
      <div class="title"><strong>Ubah Data User</strong></div>
      <div class="block-body">
      <?php if ($this->session->flashdata('msg')) : ?>
        <div style="color: #ff6666;">
        <?php echo $this->session->flashdata('msg') ?>  
        </div>
      <?php endif; ?>
        <form action="<?php echo base_url('superadmin/Data_user/edit/'.$data[0]['id_user']) ?> " method="post">
          <input type="hidden" name="id_user" value="<?php echo $data[0]['id_user']; ?>">
          <div class="form-group">
            <label class="form-control-label">Nama user</label>
            <input type="text" placeholder="Nama user" class="form-control" name="nama_user" autocomplete="off" value="<?php echo $data[0]['nama_user'] ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">NIM</label>
            <input type="text" placeholder="" class="form-control" name="nim" autocomplete="off" value="<?php echo $data[0]['nim'] ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">UKM</label>
            <select name="id_ukm" id="id_ukm" class="form-control" required="required">
              <option value="zero">--Pilih UKM--</option>
              <?php 
              $pengurus = $this->db->query("SELECT * FROM tb_ukm");
              foreach($pengurus->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_ukm?>"<?php echo ($row_kat->id_ukm == $data[0]['id_ukm'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_ukm; ?></option>
              <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Telp user</label>
            <input type="text" placeholder="" class="form-control" name="no_telp_user" autocomplete="off" value="<?php echo $data[0]['no_telp_user'] ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">Email</label>
            <input type="text" placeholder="" class="form-control" name="email_user" autocomplete="off" value="<?php echo $data[0]['email_user'] ?>">
          </div>

          <div class="form-group">
            <label class="form-control-label">Periode</label>
            <select name="id_periode" id="id_periode" class="form-control">
                <option value="zero">--Pilih Periode--</option>
                <?php 
                $pengurus = $this->db->query("SELECT * FROM tb_periode");
                foreach($pengurus->result() as $row_kat)  { ?>
                  <option value="<?php echo $row_kat->id_periode?>"<?php echo ($row_kat->id_periode == $data[0]['id_periode'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->th_periode; ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Logo UKM</label><label style="font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 300Kb)</label><br>
            <img src="<?php echo ($data[0]['foto_user'] != '' ? base_url('./upload/foto_user/' . $data[0]['foto_user']) : base_url('./upload/foto_user/img_defautl.jpg')); ?>" alt="Logo UKM" width="100" height="120">
            <input type="file" name="berkas" required="required">
          </div>
          <div class="form-group space_help_button">       
            <input type="submit" value="Ubah Data" class="btn btn-success space_help">
            <a href="<?php echo base_url('superadmin/Data_user') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>