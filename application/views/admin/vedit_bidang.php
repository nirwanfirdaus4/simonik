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
      <h2 class="h5 no-margin-bottom" style="color: #111">Data Bidang <?php echo $vkm." Periode ".$veriode; ?>      </h2>
    </div> 
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Data_bidang') ?>">Data Bidang</a></li>
      <li class="breadcrumb-item active">Ubah Data Bidang</li>
    </ul>
  </div> 
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong style="color: #111">Ubah Data Bidang</strong></div>

      <div class="block-body">
        <form action="<?php echo base_url('admin/Data_bidang/edit/'.$data[0]['id_bidang']) ?> " method="post">
          <div class="form-group">
            <input type="hidden" value="<?php echo $data[0]['id_bidang']; ?>" class="form-control" name="id_bidang" autocomplete="off">  
            <label style="color: #111" class="form-control-label">Nama Bidang</label>
            <input type="text" placeholder="Nama Bidang" class="form-control" name="nama_bidang" autocomplete="off" value="<?php echo $data[0]['nama_bidang'] ?>">
          </div>
          <?php $ukm=$this->session->userdata('ses_ukm');?>
          <input type="hidden" value="<?php echo $ukm; ?>" class="form-control" name="id_ukm" autocomplete="off">          
          <?php $periode=$this->session->userdata('ses_periode');?>
          <input type="hidden" value="<?php echo $periode; ?>" class="form-control" name="id_periode" autocomplete="off">          
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Nama Ketua Bidang</label>
            <select name="nm_ketua_bidang" id="nm_ketua_bidang" class="form-control">
              <option value="zero">--Pilih Ketua Bidang--</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $periode=$this->session->userdata('ses_periode');
              $ketua = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=3 and id_periode=$periode");
              foreach($ketua->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_user?>" <?php echo ($row_kat->id_user == $data[0]['ketua_bidang'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_user; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Nama Sekretaris Bidang</label>
            <select name="nm_sekretaris_bidang" id="nm_sekretaris_bidang" class="form-control">
              <option value="zero">--Pilih Sekretaris Bidang--</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $periode=$this->session->userdata('ses_periode');
              $ketua = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=3 and id_periode=$periode");
              foreach($ketua->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_user?>"<?php echo ($row_kat->id_user == $data[0]['sekretaris_bidang'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_user; ?></option>
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