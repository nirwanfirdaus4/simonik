<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom" style="color: #111">Data User</h2>
    </div> 
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_user') ?>">Data User</a></li>
      <li class="breadcrumb-item active">Tambah Data User</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong style="color: #111">Tambah Data User</strong></div>
      <?php if ($this->session->flashdata('msg')) : ?>
        <div style="color: #ff6666;">
        <?php echo $this->session->flashdata('msg') ?>  
        </div>
      <?php endif; ?>
      <div class="block-body">
        <form action="<?php echo base_url('admin/Data_user/tambahData') ?> " method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label style="color: #111" class="form-control-label" style="color: #111">Nama User</label>
            <input type="text" placeholder="Nama User" class="form-control" name="nama_user" autocomplete="off">
          </div>
          <div class="form-group">
            <label style="color: #111" class="form-control-label">NIM</label>
            <input type="number" placeholder="NIM user" class="form-control" name="nim" autocomplete="off">
          </div>
            <?php $ukm=$this->session->userdata('ses_ukm');?>
            <input type="hidden" value="<?php echo $ukm; ?>" class="form-control" name="id_ukm" autocomplete="off">          
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Telp</label>
            <input type="number" placeholder="Telp user" class="form-control" name="no_telp_user" autocomplete="off">
          </div>
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Email</label>
            <input type="email" placeholder="Email user" class="form-control" name="email_user" autocomplete="off">
          </div> 
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Tipe User</label>
            <!-- <input type="text" placeholder="" class="form-control" name="id_type_user" autocomplete="off"> -->
              <select name="id_type_user" id="id_type_user" class="form-control">
                <option value="zero">--Pilih Tipe User--</option>
                <?php 
                $pengurus = $this->db->query("SELECT * FROM tb_type_user where id_type_user>2");
                foreach($pengurus->result() as $row_kat)  { ?>
                  <option value="<?php echo $row_kat->id_type_user?>"><?php echo $row_kat->nama_type_user; ?></option>
                <?php } ?>
              </select>
          </div>
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Foto User</label><label style="font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 300Kb)</label><br>
            <input type="file" name="berkas">
          </div>
            <?php $periode_id=$this->session->userdata('ses_periode');?>          
          <input type="hidden" placeholder="" value="<?php echo $periode_id ?>" class="form-control" name="id_periode" autocomplete="off">
<!--           <div class="form-group">
            <label style="color: #111" class="form-control-label">Periode</label>

              <select name="id_periode" id="id_periode" class="form-control">
                <option value="zero">--Pilih Periode--</option>
                <?php 
                $pengurus = $this->db->query("SELECT * FROM tb_periode");
                foreach($pengurus->result() as $row_kat)  { ?>
                  <option value="<?php echo $row_kat->id_periode?>"><?php echo $row_kat->th_periode; ?></option>
                <?php } ?>
              </select>

          </div> -->

          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('admin/Data_user') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>