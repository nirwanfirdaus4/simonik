<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Jobdesk</h2>
    </div> 
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Jobdesk</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block"> 
      <div class="title"><strong>Sunting Data jobdesk</strong></div>

      <div class="block-body">
        <form action="<?php echo base_url('anggota/Data_jobdesk/edit/' .$data[0]['id_jobdesk'].'/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?> " method="post">
          <div class="form-group">
            <label class="form-control-label">Jobdesk</label>
            <input type="text" placeholder="Jobdesk" value="<?php echo $data[0]['nama_jobdesk'] ?>" class="form-control" name="nama_jobdesk" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="form-control-label">Mulai</label>
            <input type="date"class="form-control" name="mulai" value="<?php echo $data[0]['startline'] ?>" autocomplete="off">
          </div>         
          <div class="form-group">
            <label class="form-control-label">Deadline</label>
            <input type="date"class="form-control" name="deadline" value="<?php echo $data[0]['deadline'] ?>" autocomplete="off">
          </div>
          <?php
          $query = $this->db->query("SELECT * FROM tb_panitia_proker where id_user =$user_id");
          foreach ($query->result() as $row_kapel){
            if($row_kapel->id_sie == $sie_id){ ?>
              <div class="form-group">
                <label class="form-control-label">File</label>
                <input type="file" placeholder="file_laporan" class="form-control" name="nama_Jobdesk" autocomplete="off">
              </div>          
           <?php } ?>
          <?php } ?>       
          <input type="hidden"name="id_jobdesk" value="<?php echo $data[0]['id_jobdesk'] ?>">
          <input type="hidden"name="id_proker" value="<?php echo $ses_proker ?>">
          <input type="hidden"name="id_sie" value="<?php echo $sie_id ?>">
          <input type="hidden"name="id_ukm" value="<?php echo $ukm_id ?>">
          <input type="hidden"name="id_user" value="<?php echo $user_id ?>">

          <div class="form-group space_help_button">       
            <input type="submit" name="submit" value="Simpan" class="btn btn_dewe_color">
            <a href="<?php echo base_url('anggota/Data_jobdesk/detail/'.$ses_proker.'/'.$sie_id.'/'.$id_sie ) ?>"><button type="button" class="btn btn-primary">Batal</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>