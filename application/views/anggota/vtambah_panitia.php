<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom" style="color: #111">Data Panitia</h2>
    </div> 
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('anggota/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('anggota/Data_panitia/detail/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?>">Data Panitia</a></li>
      <li class="breadcrumb-item active">Tambah Data Panitia</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block"> 
      <div class="title"><strong style="color: #111">Tambah Panitia <?php echo $convert_sie; ?></strong></div>

      <div class="block-body">
        <form action="<?php echo base_url('anggota/Data_panitia/tambahData/'.$ses_proker.'/'.$sie_id.'/'.$id_sie ) ?> " method="post">
          <div class="form-group">
            <?php $proker=$this->session->userdata('ses_id_selected_proker') ?>
            <input type="hidden" name="id_proker" autocomplete="off" value="<?php echo $proker ?>">
            <?php
             $ukm = $this->session->userdata('ses_ukm');
             $periode = $this->session->userdata('ses_periode')
             ?>
            <input type="hidden" name="id_ukm" autocomplete="off" value="<?php echo $ukm ?>">
            <input type="hidden" name="id_periode" autocomplete="off" value="<?php echo $periode ?>">
          </div>        
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Nama</label>
            <select name="nm_koor" id="nm_koor" class="form-control" required="required">
              <option value="">-- Pilih Koordinator / Anggota Sie --</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $ketua = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=5");
              foreach($ketua->result() as $row_kat)  { ?> 
                <option value="<?php echo $row_kat->id_user?>"><?php echo $row_kat->nama_user; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label style="color: #111" class="form-control-label">Jenis Sie</label>
            <select name="jenis_sie" id="jenis_sie" class="form-control" required="required">
              <option value="" >-- Pilih Jenis Sie --</option>
                <option value="Koordinator Sie">Koordinator Sie</option>
                <option value="Anggota Sie">Anggota Sie</option>
              
            </select>
          </div>

          <div class="form-group space_help_button">       
            <input type="submit" name="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('anggota/Data_panitia/detail/'.$ses_proker.'/'.$sie_id.'/'.$id_sie  ) ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>