<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <?php 
        $revisi_periode=$this->session->userdata('ses_periode');
        $revisi_ukm=$this->session->userdata('ses_ukm');
        $queryPeriode=$this->db->query("SELECT * FROM tb_periode");
        $queryUkm=$this->db->query("SELECT * FROM tb_ukm");
        foreach ($queryPeriode->result() as $keyRevPeriode) {
          if ($keyRevPeriode->id_periode==$revisi_periode) {
            $veriode=$keyRevPeriode->th_periode;
          }
        }
        foreach ($queryUkm->result() as $keyRevUkm) {
          if ($keyRevUkm->id_ukm==$revisi_ukm) {
            $vkm=$keyRevUkm->nama_ukm;
          }
        }
      ?>   
      <h2 class="h5 no-margin-bottom" style="color: #111">Data Proker <?php echo $vkm." Periode ".$veriode; ?></h2>
    </div> 
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_proker') ?>">Data Proker</a></li>
      <li class="breadcrumb-item active">Ubah Data Proker</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong style="color: #111">Edit Data Proker</strong></div>

      <div class="block-body">
        <form action="<?php echo base_url('admin/Data_proker/edit/'.$data[0]['id_proker']) ?> " method="post">
          <div class="form-group">
            <input type="hidden" class="form-control" name="id_proker"  value="<?php echo $data[0]['id_proker'] ?>">
            <label style="color: #111" class="form-control-label">Nama Proker</label>
            <input type="text" placeholder="Nama Proker" class="form-control" name="nama_proker" autocomplete="off" value="<?php echo $data[0]['nama_proker'] ?>">
          </div>
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Nama Ketua Proker</label>
            <select name="nm_ketua_proker" id="nm_ketua_proker" class="form-control">
              <option value="zero">-- Pilih Ketua Proker --</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $periode=$this->session->userdata('ses_periode');
              $ketua = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=5 and id_periode=$periode");
              foreach($ketua->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_user?>"<?php echo ($row_kat->id_user == $data[0]['ketua_proker'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_user; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Tanggal Proker ( jika proker ini beberapa hari, masukkan tanggal terakhir saja )</label>
            <input type="date" name="tgl_proker" placeholder="Tanggal Acara" value="<?php echo $data[0]['tanggal_proker'] ?>" autocomplete="off" class="form-control">
          </div>
           <?php $ukm=$this->session->userdata('ses_ukm');?>
          <input type="hidden" value="<?php echo $ukm; ?>" class="form-control" name="id_ukm" autocomplete="off">          
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Tempat Pelaksanaan</label>
            <input type="text" placeholder="Lokasi" class="form-control" name="tempat_pelaksanaan" autocomplete="off" value="<?php echo $data[0]['tempat_proker'] ?>">
          </div>
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Nama Bidang</label>
            <select name="nm_bidang" id="nm_bidang" class="form-control">
              <option value="zero">-- Pilih Bidang --</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $periode=$this->session->userdata('ses_periode');              
              $ketua = $this->db->query("SELECT * FROM tb_bidang where id_ukm=$ukm and id_periode=$periode");
              foreach($ketua->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_bidang?>"<?php echo ($row_kat->id_bidang == $data[0]['id_bidang'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_bidang; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group space_help_button">       
            <input type="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('admin/Data_proker') ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>