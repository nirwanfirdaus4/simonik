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
        $revisi_ukm=$this->session->userdata('ses_ukm');
        $queryPeriode=$this->db->query("SELECT * FROM tb_periode");
        $queryUkm=$this->db->query("SELECT * FROM tb_ukm");
        foreach ($queryPeriode->result() as $keyRevPeriode) {
          if ($keyRevPeriode->id_periode==$revisi_periode) {
            $veriode=$keyRevPeriode->th_periode;
          }
        }
      ?>         
      <h2 class="h5 no-margin-bottom">Data Proker Bidang Syi'ar <?php echo $veriode; ?></h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('bph/Welcome') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data Program Kerja</li>
    </ul>
  </div>
  <div class="container-fluid">
    <div class="content_dashboard space_4">
      <div class="row">
        <?php $no=1; $p=0; $a_color=1; ?>

        <?php foreach ($array as $key) {
        
        switch($a_color){
          case 1:
            $warna=$color1;
            break;
          case 2:
            $warna=$color2;
            break;
          case 3:
            $warna=$color3;
            break;
          case 4:
            $warna=$color4;
            break;
          case 5:
            $warna=$color5;
            break;
          case 6:
            $warna=$color6;
            break;
          case 7:
            $warna=$color7;
            break;
          case 8:
            $warna=$color8;
            break;
          case 9:
            $warna=$color9;
            break;
          default:
            $warna=$color10;
            break;
        }

          if ($key['id_proker']==$p) {
              // KARENA id_proker dan id_sie tidak mungkin 0
          }else{ ?>             
           <div class="col-lg-4">      
            <div style="background-color: <?php echo $warna; ?>; border-right: 1px solid #bdc3c7; border-left: 1px solid #bdc3c7; border-bottom: 1px solid;">
              <div class="box_space"><a class="unline" href="<?php echo base_url('bph/Data_proker/index_proker/'.$key['id_proker']) ?>">

              <?php
                $bidang = $this->db->query("SELECT * FROM tb_bidang");
                foreach ($bidang->result() as $row_bidang) {
                   if ($key['id_bidang']==$row_bidang->id_bidang) {
                      $fix_bidang=$row_bidang->nama_bidang;
                   }
                }                
            $hitung=strlen($key['nama_proker']);
            if ($hitung<=13) {?>
              <p class="box_title"><?php echo $key['nama_proker']; ?></p>              
              <p class="box_subtitle0"><?php echo $fix_bidang;?></p>
            <?php }elseif ($hitung>=14 && $hitung<=16) { ?>
              <p class="box_title"><?php echo $key['nama_proker']; ?></p>              
              <p class="box_subtitle1"><?php echo $fix_bidang;?></p>
            <?php }elseif ($hitung>=17 && $hitung<=18) { ?>
              <p class="box_title2"><?php echo $key['nama_proker']; ?></p>
              <p class="box_subtitle2"><?php echo $fix_bidang;?></p>
            <?php }else{ 
              $shrink_text= substr($key['nama_proker'],0,18).'...';
                
              ?>
              <p class="box_title2"><?php echo $shrink_text; ?></p>
              <p class="box_subtitle3"><?php echo $fix_bidang;?></p>
              <?php  }

              ?>

          </a>                    
        </div>   
        <div style="background-color: #fff; ">
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
            <p>&nbsp;<span class="fa fa-map-marker" style="font-size:19px"></span> <?php echo "&nbsp;".$tempat_fix ?></p>
              <p><span class="fa fa-calendar" style="font-size:19px"></span> <?php echo "&nbsp;".$tanggal_fix ?></p>
              </p>
            </div><hr style="border-color: #bdc3c7; margin-top: 8%;" class="hr">   
            <div class="box_space3">         
              <p align="center"> </p>
            </div>
          </div>                              
        </div>
      </div>
      <?php
    }
    $p=$key['id_proker'];
    $a_color++;
    if ($a_color>10) {
      $a_color=1;
    }else{

    }
  } ?>    
              </div>        
            </div>

          </div>

 </div>

 <?php $this->load->view('bagian/footer') ?>