<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Bidang</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Bidang</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Data Bidang</strong></div>
      <a href="<?php echo base_url('admin/Data_bidang/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Bidang</th>
              <th>Nama Ketua Bidang</th>
              <th>Nama Sekretaris Bidang</th>
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
                      <a href="<?php echo base_url('admin/Data_bidang/do_delete/' . $key['id_bidang']) ?>" title="Hapus Data"><button type="button" class="btn btn-primary" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>   

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['nama_bidang'] ?></td>

                <?php
                $user = $this->db->query("SELECT * FROM tb_user");

                ?>

                <?php
                foreach($user->result() as $row_user)  {
                  if ($row_user->id_user==$key['ketua_bidang']) { ?>                    
                    <td><?php echo $row_user->nama_user; ?></td>
                <?php }
                } ?>

                <?php
                foreach($user->result() as $row_user)  {
                  if ($row_user->id_user==$key['sekretaris_bidang']) { ?>                    
                    <td><?php echo $row_user->nama_user; ?></td>
                <?php }
                } ?>

                <td>
                  <a href="<?php echo base_url('admin/Data_bidang/edit/' . $key['id_bidang']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
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