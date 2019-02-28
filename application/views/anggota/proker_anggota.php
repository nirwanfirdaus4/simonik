<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
      <li class="breadcrumb-item active">Jobdesk</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Data Jobdesk</strong></div>
      <!-- <a href="<?php echo base_url('anggota/Data_jobdesk/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a> -->
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Jobdesk</th>
              <th>Deadline</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($jobdesk as $key) { ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['nama_jobdesk'] ?></td>
                <td><?php echo $key['deadline'] ?></td>
                <td><?php echo $key['status_jobdesk'] ?></td>
                <!-- <?php
                $user = $this->db->query("SELECT * FROM tb_user");
                ?>

                <?php
                foreach($user->result() as $row_user)  {
                  if ($row_user->id_user==$key['id_user']) { ?>                    
                    <td><?php echo $row_user->nama_user; ?></td>
                <?php }
                } ?> -->

                <td>
                  <a href="<?php echo base_url('anggota/Proker/index_detail/' .$key['id_jobdesk']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-eye"></i> Detail</button></a>
                  
                  <?php }?>

                </td>
              </tr>

            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>

  <?php $this->load->view('bagian/footer') ?>