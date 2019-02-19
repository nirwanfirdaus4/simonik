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
          <div style="background-color: #7c36e2;">
            <div class="box_space">
              <p class="box_title">Safari Dakwah</p>
              <p class="box_subtitle0">Sie Pubdekdok</p>                       
              <!-- <p class="box_subtitle">Muh. Agung Cahya</p>                        -->
            </div>   
            <div style="background-color: #ecf0f1;">
              <div class="box_space2">
                <p class="box_content_place">
                  <p>&nbsp;<span class="fa fa-map-marker" style="font-size:19px"> Desa Purworejo</p>
                    <p><span class="fa fa-calendar" style="font-size:19px"> 20 Juni 2018</p>
                    </p>
                  </div><hr class="hr">   
                  <div class="box_space3">         
                    <p align="right" class="icon_file"><i class="fa fa-address-book-o space_icon" style="font-size:19px"></i><i class="fa fa-folder-o" style="font-size:19px"></i></p>
                  </div>
                </div>                              
              </div>
            </div>
            <div class="col-lg-4">
              <div style="background-color: #bb414d;">
                <div class="box_space">
                  <a href="<?php echo base_url('anggota/Proker'); ?>"><p class="box_title">Polinema Bersholawat</p></a>
                  <p class="box_subtitle0">Ketua Pelaksana</p>                       
                  <!-- <p class="box_subtitle">Muh. Agung Cahya</p>                        -->
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
              </div>
              <div class="col-lg-4">
                <div style="background-color: #009788;">
                  <div class="box_space">
                    <p class="box_title">Kajian Tahsin</p>
                    <p class="box_subtitle0">Sie Acara</p>                       
                    <!-- <p class="box_subtitle">Muh. Agung Cahya</p>                        -->
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
                </div>
              </div>        
            </div>

          </div>

        </div>

        <?php $this->load->view('bagian/footer') ?>