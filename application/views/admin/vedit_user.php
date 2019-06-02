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
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_user') ?>">Data User</a></li>
      <li class="breadcrumb-item active">Ubah Data User</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Ubah Data User</strong></div>
      <?php if ($this->session->flashdata('msg')) : ?>
        <div style="color: #ff6666;">
        <?php echo $this->session->flashdata('msg') ?>  
        </div>
      <?php endif; ?>
      <div class="block-body">
        <form action="<?php echo base_url('admin/Data_user/edit/'.$data[0]['id_user']) ?> " method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_user" value="<?php echo $data[0]['id_user']; ?>">
          <div class="form-group">
            <label class="form-control-label">Nama user</label>
            <input type="text" placeholder="Nama user" class="form-control" name="nama_user" autocomplete="off" value="<?php echo $data[0]['nama_user'] ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">NIM</label>
            <input type="text" placeholder="" class="form-control" name="nim" autocomplete="off" value="<?php echo $data[0]['nim'] ?>">
          </div>
            <input type="hidden" value="<?php echo $data[0]['id_ukm'] ?>" class="form-control" name="id_ukm" autocomplete="off">
            
          <div class="form-group">
            <label class="form-control-label">Telp user</label>
            <input type="text" placeholder="" class="form-control" name="no_telp_user" autocomplete="off" value="<?php echo $data[0]['no_telp_user'] ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">Email</label>
            <input type="text" placeholder="" class="form-control" name="email_user" autocomplete="off" value="<?php echo $data[0]['email_user'] ?>">
          </div>

          <?php 
            $utype=$data[0]['id_type_user'];
            if ($utype==2) {  ?>
              <input type="hidden" class="form-control" name="id_type_user" value="<?php echo $data[0]['id_type_user'] ?>">
            <?php } else{ ?>
              <div class="form-group">
              <label class="form-control-label">Tiper user</label>
                <select name="id_type_user" id="id_type_user" class="form-control">
                  <option value="zero">--Pilih Tipe User--</option>
                  <?php 
                  $pengurus = $this->db->query("SELECT * FROM tb_type_user where id_type_user>2");
                  foreach($pengurus->result() as $row_kat)  { ?>
                    <option value="<?php echo $row_kat->id_type_user?>"<?php echo ($row_kat->id_type_user == $data[0]['id_type_user'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_type_user; ?></option>
                  <?php } ?>
                </select>
              </div>
            <?php }
          ?>
          <?php $periode_id=$this->session->userdata('ses_periode');?>          
          <input type="hidden" placeholder="" value="<?php echo $periode_id ?>" class="form-control" name="id_periode" autocomplete="off">
          <div class="form-group">
            <label class="form-control-label">Foto User</label><label style="font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 300Kb)</label><br>
            <img src="<?php echo ($data[0]['foto_user'] != '' ? base_url('./upload/foto_user/' . $data[0]['foto_user']) : base_url('./upload/foto_user/img_defautl.jpg')); ?>" alt="Logo UKM" width="100" height="120">
            <input type="file" name="berkas" >
          </div>
          <div class="form-group space_help_button">       
            <input type="submit" value="Ubah Data" class="btn btn-success space_help">
            <a href="<?php echo base_url('admin/Data_user') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>