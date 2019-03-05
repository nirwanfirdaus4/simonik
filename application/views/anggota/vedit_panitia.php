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
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Panitia</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block"> 
      <div class="title"><strong>Sunting Data Panitia</strong></div>

      <div class="block-body">
        <form action="<?php echo base_url('anggota/Data_panitia/edit/' .$data[0]['id_panitia']) ?> " method="post">
          <div class="form-group">
            <input type="hidden" name="id_panitia" autocomplete="off" value="<?php echo $data[0]['id_panitia'] ?>">
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
            <label class="form-control-label">Nama Koordinator / Anggota Sie</label>
            <select name="nm_koor" id="nm_koor" class="form-control" required="required">
              <option value="">-- Pilih Koordinator / Anggota Sie --</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $ketua = $this->db->query("SELECT * FROM tb_user where id_ukm=$ukm and id_type_user=5");
              foreach($ketua->result() as $row_kat)  { ?> 
                <option value="<?php echo $row_kat->id_user?>" <?php echo ($row_kat->id_user == $data[0]['id_user'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_user; ?></option>
              <?php } ?>
            </select>
          </div>
           <div class="form-group">
            <label class="form-control-label">Nama Sie</label>
            <select name="nm_sie" id="nm_sie" class="form-control" required="required">
              <option value="" selected="selected">-- Pilih Sie --</option>
              <?php 
              $ukm=$this->session->userdata('ses_ukm');
              $sie = $this->db->query("SELECT * FROM tb_sie where id_ukm=$ukm");
              foreach($sie->result() as $row_kat)  { ?>
                <option value="<?php echo $row_kat->id_sie?>" <?php echo ($row_kat->id_sie == $data[0]['id_sie'] ? 'selected="selected"' : ''); ?>><?php echo $row_kat->nama_sie; ?></option>
              <?php } ?>
            </select>
          </div>
          <?php
          $query = $this->db->query("SELECT * FROM tb_panitia_proker where id_user =$user_id");
          foreach ($query->result() as $row_kapel){
            if($row_kapel->id_sie != $sie_id){ ?>
              <div class="form-group">
                <label class="form-control-label">Jenis Sie</label>
                <select name="jenis_sie" id="jenis_sie" class="form-control" required="required">
                  <option value="" >-- Pilih Jenis Sie --</option>
                    <option value="Koordinator Sie" <?php echo $data[0]['jenis_panitia'] ? 'selected="selected"' : ''; ?>>Koordinator Sie</option>
                    <option value="Angggota Sie" <?php echo $data[0]['jenis_panitia'] ? 'selected="selected"' : ''; ?>>Angggota Sie</option>
                  
                </select>
              </div>
          <?php } ?>
          <?php } ?>

          <div class="form-group space_help_button">       
            <input type="submit" name="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('anggota/Data_panitia/index/'  ) ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>