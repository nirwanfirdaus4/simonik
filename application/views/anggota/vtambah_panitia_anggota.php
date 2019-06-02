<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Panitia</h2>
    </div> 
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('anggota/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('anggota/Data_anggota/') ?>">Data Anggota</a></li>
      <li class="breadcrumb-item active">Tambah Data anggota</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block"> 
      <div class="title"><strong>Tambah Data Anggota</strong></div>

      <div class="block-body">
        <form action="<?php echo base_url('anggota/Data_anggota/tambahData/'.$ses_proker.'/'.$id_sie.'/'.$sie_id ) ?> " method="post">
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
            <label class="form-control-label">Nama Anggota Sie</label>
            <select name="nm_anggota" id="nm_koor" class="form-control" required="required">
              <option value="">-- Pilih Anggota Sie --</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $anggota = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=5");
              
              foreach($anggota->result() as $row_kat)  {
              $user=$row_kat->id_user;
              $ukm=$this->session->userdata('ses_ukm');
              $proker=$this->session->userdata('ses_id_selected_proker'); 
              $cek_anggota = $this->db->query("SELECT * FROM tb_panitia_proker where id_ukm=$ukm AND id_proker=$proker AND id_user=$user");
              if ($cek_anggota->num_rows()>0) {

              }else{ ?>
                <option value="<?php echo $row_kat->id_user?>"><?php echo $row_kat->nama_user; ?></option>
              <?php
                }            
              }
               ?>
            </select>
          </div>

          <div class="form-group space_help_button">       
            <input type="submit" name="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('anggota/Data_anggota/daftar_anggota/'.$ses_proker.'/'.$id_sie.'/'.$sie_id) ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>