<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Proker</h2>
    </div> 
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Proker</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Edit Data Proker</strong></div>

      <div class="block-body">
        <form action="<?php echo base_url('admin/Data_proker/edit/'.$data[0]['id_proker']) ?> " method="post">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id_proker"  value="<?php echo $data[0]['id_proker'] ?>">
            <label class="form-control-label">Nama Proker</label>
            <input type="text" placeholder="Nama Proker" class="form-control" name="nama_proker" autocomplete="off" value="<?php echo $data[0]['nama_proker'] ?>">
          </div>
          <div class="form-group">
            <label class="form-control-label">Nama Ketua Proker</label>
            <select name="nm_ketua_proker" id="nm_ketua_proker" class="form-control">
              <option value="zero">-- Pilih Ketua Proker --</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $ketua = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=8");
              foreach($ketua->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_user?>"<?php echo ($row_kat->id_user == $data[0]['ketua_proker'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_user; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label">Tanggal Proker</label>
            <input type="date" name="tgl_proker" placeholder="Tanggal Acara" autocomplete="off" class="form-control">
          </div>
           <?php $ukm=$this->session->userdata('ses_ukm');?>
          <input type="hidden" value="<?php echo $ukm; ?>" class="form-control" name="id_ukm" autocomplete="off">          
          <div class="form-group">
            <label class="form-control-label">Nama Bidang</label>
            <select name="nm_bidang" id="nm_bidang" class="form-control">
              <option value="zero">-- Pilih Bidang --</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $ketua = $this->db->query("SELECT * FROM tb_bidang where id_ukm=$ukm");
              foreach($ketua->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_bidang?>"<?php echo ($row_kat->id_bidang == $data[0]['id_bidang'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_bidang; ?></option>
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