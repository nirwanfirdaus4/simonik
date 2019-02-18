<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
      <div class="title"><strong>Data Proker</strong></div>
      <a href="<?php echo base_url('admin/Data_proker/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Proker</th>
              <th>Nama Ketua Proker</th>
              <th>Nama Tanggal Proker</th>
              <th>Nama Bidang</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($array as $key) { ?>

              <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus</h4>
                    </div>
                    <div class="modal-body">
                      <p>Ingin hapus data?</p>
                      <a href="<?php echo base_url('admin/Data_proker/do_delete/' . $key['id_proker']) ?>" title="Hapus Data"><button type="button" class="btn btn-primary" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>   

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['nama_proker'] ?></td>

                <?php
                $user = $this->db->query("SELECT * FROM tb_user");

                ?>

                <?php
                foreach($user->result() as $row_user)  {
                  if ($row_user->id_user==$key['ketua_proker']) { ?>                    
                    <td><?php echo $row_user->nama_user; ?></td>
                <?php }
                } ?>

                <td><?php echo $key['tanggal_proker']; ?></td>

                <?php
                $bidang = $this->db->query("SELECT * FROM tb_bidang");
                foreach($bidang->result() as $row_bidang)  {
                  if ($row_bidang->id_bidang==$key['id_bidang']) { ?>                    
                    <td><?php echo $row_bidang->nama_bidang; ?></td>
                <?php }
                } ?>

                <td>
                  <a href="<?php echo base_url('admin/Data_proker/edit/' . $key['id_proker']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                  <button title="Hapus Data" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><i class="fa fa-trash"></i></button>
                  <?php $modal++; }?>

                </td>
              </tr>

            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>

  <?php $this->load->view('bagian/footer') ?>