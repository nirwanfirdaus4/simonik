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
      <li class="breadcrumb-item"><a href="<?php echo base_url('anggota/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url('anggota/Proker/index_proker/'.$ses_proker.'/'.$id_sie) ?>">Jobdesk</a></li>
      <li class="breadcrumb-item active">Detail</li>
    </ul>
  </div>
  <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
            <div class="col-lg-6">
                <div class="drills-chart block">
                <div class="title"><strong>Detail Jobdesk</strong></div>
                <div class="table-responsive">
                    <table class="table">   
                        <tbody>
                            <tr>
                                <th>Jobdesk</th>
                                <td>:</td>
                                <td><?php echo $data[0]['nama_jobdesk']; ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <td>:</td>
                                <td><?php echo $data[0]['startline']; ?></td>
                            </tr>
                            <tr>
                                <th>Deadline</th>
                                <td>:</td>
                                <td><?php echo $data[0]['deadline']; ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td><?php echo $data[0]['status_jobdesk']; ?></td>
                            </tr>
                            <tr>
                                <th>Terakhir Edit</th>
                                <td>:</td>
                                <?php 
                                $query_nama= $this->db->query('SELECT * FROM tb_user');
                                foreach ($query_nama->result() as $key) {
                                  if ($key->id_user == $data[0]['id_user']) {
                                    $convert_nama = $key->nama_user;
                                  }
                                }
                                ?>
                                <td><?php echo $convert_nama; ?></td>
                            </tr>
                            <tr>
                                <th>File Laporan</th>
                                <td>:</td>
                                <td><?php echo ($data[0]['file_laporan'] != '' ? "<a target='blank' href='" . base_url('upload/berkas_laporan/' . $data[0]['file_laporan']) . "'>".$data[0]['file_laporan']. "</a>" : "Tidak ada file laporan"); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
              </div>
              <div class="col-lg-6">
              <div class="title"><strong>Ubah Status</strong></div>
                <form action="<?php echo base_url('anggota/Data_jobdesk/update_status/'.$data[0]['id_jobdesk'].'/'.$ses_proker.'/'.$id_sie) ?>" method="post">
                <?php if ($this->session->flashdata('msg_update')) : ?>
                  <div style="color: #ff6666;">
                  <?php echo $this->session->flashdata('msg_update') ?>  
                  </div>
                <?php endif; ?>
                <input type="hidden" name="id_jobdesk" value="<?php echo $data[0]['id_jobdesk']  ?>">
                  <div class="stats-2-block block d-flex">
                    <select name="status_jobdesk" class="form-control">
                    <!-- <?php 
                    // $id_jobdesk = $this->session->userdata("ses_nav_sie");
                    // echo $id_jobdesk;
                      // $query = $this->load->db->query("SELECT * FROM tb_jobdesk where id_jobdesk=$id_new");
                      // foreach ($query->result() as $row_query){ ?> -->
                        <option value="Belum Dikerjakan"<?php echo ('Belum Dikerjakan' == $data[0]['status_jobdesk'] ? 'selected="selected"' : ''); ?>>Belum Dikerjakan</option>
                        <option value="Progres"<?php echo ('Progres' == $data[0]['status_jobdesk'] ? 'selected="selected"' : ''); ?>>Progres</option>
                        <option value="Sudah Dikerjakan"<?php echo ('Sudah Dikerjakan' == $data[0]['status_jobdesk'] ? 'selected="selected"' : ''); ?>>Sudah Dikerjakan</option>
                        <!-- <option value="Progres">Progress</option> -->
                        <!-- <option value="Sudah Dikerjakan">Sudah Dikerjakan</option> -->
                      
                    </select>
                    <input type="submit" value="Ubah" class="btn btn_dewe_color" style="margin-left:10px;">
                  </div>
                </form>
                <form action="<?php echo base_url('anggota/Data_jobdesk/upload/'.$data[0]['id_jobdesk'].'/'.$ses_proker.'/'.$id_sie) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_jobdesk" value="<?php echo $data[0]['id_jobdesk']  ?>">
                <?php if ($this->session->flashdata('msg')) : ?>
                  <div style="color: #ff6666;">
                  <?php echo $this->session->flashdata('msg') ?>  
                  </div>
                <?php endif; ?>
                  <div class="title"><strong>Upload Berkas</strong></div>
                    <div class="stats-3-block block d-flex">
                      <div class="form-group">
                        <label class="form-control-label"></label><label style="font-size:12px; padding-left:5px;">(Format PDF maks 300Kb)</label><br>
                        <input type="file" name="berkas"><input type="submit" value="Ubah" class="btn btn_dewe_color" style="margin-top:15px;">
                      </div>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </section>

  <?php $this->load->view('bagian/footer') ?>