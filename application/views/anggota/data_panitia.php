<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
      <li class="breadcrumb-item active">Panitia</li>
    </ul>
  </div> 
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Data Panitia</strong></div>
      <a href="<?php echo base_url('anggota/Data_panitia/tambahData/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Tahun Periode</th>
              <th>Nama Anggota</th>
              <th>Nama Sie</th>
              <th>Jenis Sie</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($panitia as $key) { ?>

              <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Hapus</h4>
                    </div>
                    <div class="modal-body">
                      <p>Ingin hapus data?</p>
                      <a href="<?php echo base_url('anggota/Data_panitia/do_delete/' . $key['id_panitia'].'/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?>" title="Hapus Data"><button type="button" class="btn btn-primary" style="margin-left: 170px;">Hapus <i class="fa fa-trash"></i></button></a>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>   

              <tr>
                <td><?php echo $no++ ?></td>
                <?php 
                  $periode = $this->db->query("SELECT * FROM tb_periode");
                 ?>
                 <?php
                foreach($periode->result() as $row_periode)  {
                  if ($row_periode->id_periode==$key['id_periode']) { ?>                    
                    <td><?php echo $row_periode->th_periode; ?></td>
                <?php }
                } ?>

                <?php
                $user = $this->db->query("SELECT * FROM tb_user");
                ?>

                <?php
                foreach($user->result() as $row_user)  {
                  if ($row_user->id_user==$key['id_user']) { ?>                    
                    <td><?php echo $row_user->nama_user; ?></td>
                <?php }
                } ?>

                <?php
                $sie = $this->db->query("SELECT * FROM tb_sie");
                ?>
                <?php
                foreach($sie->result() as $row_sie)  {
                  if ($row_sie->id_sie==$key['id_sie']) { ?>                    
                    <td><?php echo $row_sie->nama_sie; ?></td>
                <?php }
                } ?>
                <td><?php echo $key['jenis_panitia'] ?></td>
                <td>
                  <a href="<?php echo base_url('anggota/Data_panitia/edit/' .$key['id_panitia'].'/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
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