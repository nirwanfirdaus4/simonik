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
  <div class="container-fluid" style="margin-top: 7%;">

  </div>

  <div class="container-fluid">
    <div class="content_dashboard space_4">
      <div class="row">
        <?php $no=1; $p=0; $s=0; $a_color=1; $modal=0; ?>

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

          if ($key['id_proker']==$p && $key['id_sie']==$s) {
              // KARENA id_proker dan id_sie tidak mungkin 0
          }else{ ?>             

            <div class="modal fade" id="myModal<?php echo $modal ?>" role="dialog">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Anggota Sie</h4>
                  </div>
                  <div class="modal-body">
                    <?php
                    $user=$key['id_user'];
                    $query_cekAnggota=$this->db->query("SELECT * FROM tb_user");

                    $b_proker=$key['id_proker'];
                    $b_sie=$key['id_sie'];

                    $query_printAnggota=$this->db->query("SELECT * FROM tb_panitia_proker where id_proker=$b_proker AND id_sie=$b_sie");

                    foreach ($query_printAnggota->result() as $key_printAnggota) {
                    ?>
                    <div class="before_loch">
                    <img width="25%" src="<?php echo base_url('assets/img/icon-anggota.png') ?>">                        
                    <div class="loch">

                    <?php
                    $c_anggota=$key_printAnggota->id_user;
                    foreach ($query_cekAnggota->result() as $key_cekAnggota) {

                      if ($c_anggota==$key_cekAnggota->id_user) {
                        $nama_user=$key_cekAnggota->nama_user;
                        $jenis_panitia=$key_printAnggota->jenis_panitia;
                      }
                    }
                    ?>
                      <p class="loch_text"><?php echo $nama_user; ?></p>                                               
                      <i><p class="loch_text2"><?php echo $jenis_panitia; ?></p></i>                        
                    </div>
                  </div>
                  <?php } ?>

                  </div>
                  <div class="modal-footer">

                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="myFiles<?php echo $modal ?>" role="dialog">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">File Sie</h4>
                  </div>
                  <div class="modal-body">
                    <?php
                    // $user=$key['id_user'];

                    $b_proker=$key['id_proker'];
                    $b_sie=$key['id_sie'];

                    $query_convertNamaJobdesk=$this->db->query("SELECT * FROM tb_jobdesk");

                    $query_printNamaSie=$this->db->query("SELECT * FROM tb_sie where id_sie=$b_sie");
                    $query_printFile=$this->db->query("SELECT * FROM tb_file_backup where id_proker=$b_proker AND id_sie=$b_sie");

                    foreach ($query_printFile->result() as $key_printFile) {
                    ?>
                    <div class="before_loch2">
                    <img width="25%" src="<?php echo base_url('assets/img/icon-anggota.png') ?>">                        
                    <div class="loch">

                    <?php

                    foreach ($query_printNamaSie->result() as $keyNamaSie) {
                      $namaSie=$keyNamaSie->nama_sie;
                    }

                    $file=$key_printFile->file_laporan;
                    if ($file==null) {
                      $file="Belum ada file laporan";
                      $link=0;
                      // Document_91559486889.pdf untuk idjobdesk 9 d hubungi pemateri 
                    }else{
                      $link=1;
                    }

                    foreach ($query_convertNamaJobdesk->result() as $keyNamaJobdesk) {

                      if ($keyNamaJobdesk->id_jobdesk==$key_printFile->id_jobdesk) {
                        $convertNamaJobdesk=$keyNamaJobdesk->nama_jobdesk;
                      }

                    }                    

                    ?>
                      <p class="loch_text"><?php echo $convertNamaJobdesk." :" ?></p>                                               
                      
                      <?php 

                      if ($link!=0) { ?>
                          <i> <a target='blank' href="<?php base_url('upload/berkas_laporan/' . $file)?>"><p class="loch_text2"><?php echo $file; ?></p></a></i>
                      <?php }else{ ?>
                          <i><p class="loch_text2"><?php echo $file; ?></p></i>
                      <?php }

                       ?>
                    </div>
                  </div>
                  <?php } ?>

                  </div>
                  <div class="modal-footer">

                  </div>
                </div>
              </div>
            </div>


            <div class="col-lg-4">      
              <div style="background-color: <?php echo $warna; ?>;border-right: 1px solid #bdc3c7; border-left: 1px solid #bdc3c7; border-bottom: 1px solid;">
                <div class="box_space"><a class="unline" href="<?php echo base_url('anggota/Proker/index_proker/'.$key['id_proker'].'/'.$key['id_sie']) ?>">
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
              <?php

              $hitung=strlen($nama_fix);
              if ($hitung<=13) {?>
                <p class="box_title"><?php echo $nama_fix; ?></p>              
                <p class="box_subtitle0"><?php echo $sie_fix;?></p>
              <?php }elseif ($hitung>=14 && $hitung<=16) { ?>
                <p class="box_title"><?php echo $nama_fix; ?></p>              
                <p class="box_subtitle1"><?php echo $sie_fix;?></p>
              <?php }elseif ($hitung>=17 && $hitung<=18) { ?>
                <p class="box_title2"><?php echo $nama_fix; ?></p>
                <p class="box_subtitle2"><?php echo $sie_fix;?></p>
              <?php }else{ 
                $shrink_text= substr($nama_fix,0,18).'...';
                ?>
                <p class="box_title2"><?php echo $shrink_text; ?></p>
                <p class="box_subtitle3"><?php echo $sie_fix;?></p>
              <?php  }

              ?>

            </a>                    
          </div>   
          <div style="background-color: #fff;">
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
          </div><hr style="border-color: #bdc3c7;" class="hr">   
          <div class="box_space3">         
            <p align="right" class="icon_file"><i class="fa fa-address-book-o space_icon" style="font-size:19px" data-toggle="modal" data-target="#myModal<?php echo $modal ?>"></i><i class="fa fa-folder-o" style="font-size:19px" data-toggle="modal" data-target="#myFiles<?php echo $modal ?>"></i></p>
          </div>
        </div>                              
      </div>
    </div>
    <?php
    $modal++;
  }
  $p=$key['id_proker'];
  $s=$key['id_sie'];
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