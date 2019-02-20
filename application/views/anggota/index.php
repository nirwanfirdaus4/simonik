<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Program Kerja</h2>
    </div>
  </div>
  <!-- Breadcrumb--> 
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item active"></li>
    </ul>
  </div>

  <div class="container-fluid">
    <div class="content_dashboard space_4">
      <div class="row">
        <div class="col-lg-4">
          <?php $no=1;?>
          <?php foreach ($array as $key) { ?>          
            <div style="background-color: #7c36e2;">
              <div class="box_space"><a class="unline" href="<?php echo base_url('anggota/Proker/index_proker/'.$key['id_proker']) ?>">
                <?php
                $proker = $this->db->query("SELECT * FROM tb_daftar_proker");
                $sie = $this->db->query("SELECT * FROM tb_sie");
                foreach($proker->result() as $row_proker)  {
                 if ($key['id_proker']==$row_proker->id_proker) {
                  $nama_fix=$row_proker->nama_proker;
                } 
              }
              foreach($sie->result() as $row_sie)  {
               if ($key['id_sie']==$row_sie->id_sie) {
                $sie_fix=$row_sie->nama_sie;
              } 
            }
            ?>
            <p class="box_title"><?php echo $nama_fix ?></p>
            <p class="box_subtitle0"><?php echo $sie_fix?></p>   
          </a>                    
        </div>   
        <div style="background-color: #ecf0f1;">
          <div class="box_space2">
            <p class="box_content_place">
              <?php
              $tempat = $this->db->query("SELECT * FROM tb_daftar_proker");
              foreach($tempat->result() as $row_tempat)  {
               if ($key['id_proker']==$row_tempat->id_proker) {
                $tempat_fix=$row_tempat->tempat_proker;
                $tanggal_fix=$row_tempat->tanggal_proker;
              } 
            }                    
            ?>
            <p>&nbsp;<span class="fa fa-map-marker" style="font-size:19px"> <?php echo $tempat_fix ?></p>
              <p><span class="fa fa-calendar" style="font-size:19px"> <?php echo $tanggal_fix ?></p>
              </p>
            </div><hr class="hr">   
            <div class="box_space3">         
              <p align="right" class="icon_file"><i class="fa fa-address-book-o space_icon" style="font-size:19px"></i><i class="fa fa-folder-o" style="font-size:19px"></i></p>
            </div>
          </div>                              
        </div>
      <?php } ?>
    </div>
<!--             <div class="col-lg-4">
              <div style="background-color: #bb414d;">
                <div class="box_space">
                  <a href="<?php echo base_url('anggota/Proker'); ?>"><p class="box_title">Polinema Bersholawat</p></a>
                  <p class="box_subtitle0">Ketua Pelaksana</p>                       
                </div>   
                <div style="background-color: #ecf0f1;">
                  <div class="box_space2">
                    <p class="box_content_place">
                     <p class="">&nbsp;<span class="fa fa-map-marker" style="font-size:19px"> Kampus Polinema</p>
                      <p><span class="fa fa-calendar" style="font-size:19px"> 15 September 2018</p>
                      </p>
                    </div><hr class="hr">   
                    <div class="box_space3">         
                      <p align="right" class="icon_file"><i class="fa fa-address-book-o space_icon" style="font-size:19px"></i><i class="fa fa-folder-o" style="font-size:19px"></i></p>
                    </div>
                  </div>                              
                </div>
              </div> -->
              <!-- <div class="col-lg-4">
                <div style="background-color: #009788;">
                  <div class="box_space">
                    <p class="box_title">Kajian Tahsin</p>
                    <p class="box_subtitle0">Sie Acara</p>                       
                  </div>   
                  <div style="background-color: #ecf0f1;">
                    <div class="box_space2">
                      <p class="box_content_place">
                       <p class="">&nbsp;<span class="fa fa-map-marker" style="font-size:19px"> Masjid Raya Annur Polinema</p>
                        <p><span class="fa fa-calendar" style="font-size:19px"> 27 Juli 2018</p>
                        </p>
                      </div><hr class="hr">   
                      <div class="box_space3">         
                        <p align="right" class="icon_file"><i class="fa fa-address-book-o space_icon" style="font-size:19px"></i><i class="fa fa-folder-o" style="font-size:19px"></i></p>
                      </div>
                    </div>                              
                  </div>
                </div> -->
              </div>        
            </div>

          </div>

        </div>

        <?php $this->load->view('bagian/footer') ?>