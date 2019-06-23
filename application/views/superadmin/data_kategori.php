<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <?php 
        $revisi_periode=$this->session->userdata('ses_periode');
        $queryPeriode=$this->db->query("SELECT * FROM tb_periode");
        foreach ($queryPeriode->result() as $keyRevPeriode) {
          if ($keyRevPeriode->id_periode==$revisi_periode) {
            $veriode=$keyRevPeriode->th_periode;
          }
        }

      ?>      
      <h2 class="h5 no-margin-bottom">Data Kategori <?php echo $veriode; ?></h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('superadmin/Data_kategori/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Kategori</li>
    </ul>
  </div>

  <div class="col-lg-12">
    <div class="block">
<!--       <div class="title"><strong>Data UKM</strong></div> -->
      <a href="<?php echo base_url('superadmin/Data_kategori/tambahData/') ?> "><button type="button" class="btn btn_dewe space_add">Tambah Data</button></a>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th>Nilai</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>
            <?php $no=1; $modal=0; ?>
            <?php foreach ($array as $key) { ?>
              <!-- MODAL -->
               <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Hapus</h4>
                      </div>
                      <div class="modal-body">
                        <p>Yakin ingin menghapus data?</p>
                        <a href="<?php echo base_url('superadmin/Data_kategori/do_delete/' . $key['id_kategori']) ?>" title="Hapus Data"><button type="button" class="btn btn-danger">Hapus <i class="fa fa-trash"></i></button></a>
                      </div>
                      <div class="modal-footer">

                      </div>
                    </div>
                  </div>
                </div> 

              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $key['nama_kategori'] ?></td>
                <td><?php echo $key['nilai'] ?></td>
                <td>
                  <a href="<?php echo base_url('superadmin/Data_kategori/edit/' . $key['id_kategori']) ?>" title="Edit Data"><button type="button" class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                  <button title="Hapus Data" type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"><i class="fa fa-trash"></i></button>
                  </td>
               </tr>
                            
             <?php $modal++; } ?>
           </tbody>
         </table>
       </div>  
     </div>
   </div>
 </div>



 <?php $this->load->view('bagian/footer') ?>
 <script type="text/javascript">
      $('#notifikasi').delay(5000).slideUp('slow');
    </script>