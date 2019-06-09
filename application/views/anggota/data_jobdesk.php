<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom" style="color: #111">Data Jobdesk</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('anggota/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item active">Jobdesk</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong style="color: #111">Data Jobdesk</strong></div>
      <a href="<?php echo base_url('anggota/Data_jobdesk/tambahData/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th style="color: #111">No</th>
              <th style="color: #111">Jobdesk</th>
              <th style="color: #111">Mulai</th>
              <th style="color: #111">Deadline</th>
              <th style="color: #111">Status</th>
              <th style="color: #111">Terakhir dirubah</th>
              <th style="color: #111">Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($jobdesk as $key) { ?>

              <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus</h4>
                    </div>
                    <div class="modal-body">
                      <p>Ingin hapus data?</p>
                      <a href="<?php echo base_url('anggota/Data_jobdesk/do_delete/' . $key['id_jobdesk'].'/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?>" title="Hapus Data"><button type="button" class="btn btn-primary" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>   

              <tr>
                <td style="color: #111"><?php echo $no++ ?></td>
                <td style="color: #111"><?php echo $key['nama_jobdesk'] ?></td>
                <td style="color: #111"><?php echo $key['startline'] ?></td>
                <td style="color: #111"><?php echo $key['deadline'] ?></td>
                <td style="color: #111"><?php echo $key['status_jobdesk'] ?></td>
                <?php
                $user = $this->db->query("SELECT * FROM tb_user");
                ?>

                <?php
                foreach($user->result() as $row_user)  {
                  if ($row_user->id_user==$key['id_user']) { ?>                    
                    <td style="color: #111"><?php echo $row_user->nama_user; ?></td>
                <?php }
                } ?>

                <?php

                if ($sie_id!=1) { ?>
                <td style="color: #111">
                  <a href="<?php echo base_url('anggota/Data_jobdesk/edit/' .$key['id_jobdesk'].'/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                  <button title="Hapus Data" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><i class="fa fa-trash"></i></button>
                </td>

                <?php
                }else{ ?>
                <td style="color: #111">
                  <a class="kol" href="<?php echo base_url('anggota/Proker/index_detail/' .$key['id_jobdesk'].'/'.$ses_proker.'/'.$sie_id) ?>" title="Laporan"><button type="button" class="btn bluebird_button"><i class="fa fa-check-square setWhite"></i></button></a>
                  <a href="<?php echo base_url('anggota/Data_jobdesk/edit/' .$key['id_jobdesk'].'/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                  <button title="Hapus Data" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><i class="fa fa-trash"></i></button>
                </td>                  
                <?php $modal++;
                  }
                }
                 ?>
              </tr>

            </tbody>
          </table>
        </div>  
      </div>
    </div>
  </div>

  <?php $this->load->view('bagian/footer') ?>