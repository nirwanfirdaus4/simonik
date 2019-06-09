<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Dashboard </h2>
    </div>
  </div>
  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <?php $no=1; $color=1;?>
        <?php foreach ($array as $key) { 

          switch($color){
            case 1:
            $fix_color='dashtext-1_custom';
            $fix_bg='dashbg-1_custom';
            break;
            case 2:
            $fix_color='dashtext-2_custom';
            $fix_bg='dashbg-2_custom';
            break;
            case 3:
            $fix_color='dashtext-3_custom';
            $fix_bg='dashbg-3_custom';
            break;
            case 4:
            $fix_color='dashtext-4_custom';
            $fix_bg='dashbg-4_custom';
            break;
            case 5:
            $fix_color='dashtext-5_custom';
            $fix_bg='dashbg-5_custom';
            break;
            case 6:
            $fix_color='dashtext-6_custom';
            $fix_bg='dashbg-6_custom';
            break;
            case 7:
            $fix_color='dashtext-7_custom';
            $fix_bg='dashbg-7_custom';
            break;
            default:
            $fix_color='dashtext-1_custom';
            $fix_bg='dashbg-1_custom';
            break;
          }

          ?>           
          <div class="col-md-3 col-sm-6">

            <div class="statistic-block block" style="background-color: #f7f7f5; border: 2px solid; border-radius: 6px;">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">

                  <?php

                  $hitung=strlen($key['nama_proker']);
                  if ($hitung<=13) {?>
                    <div class="icon"><i class="icon-user-1"></i></div><strong style="color: #111"><?php echo $key['nama_proker']; ?></strong>
                    <?php
                  }else{ 
                    $shrink_text= substr($key['nama_proker'],0,18).'...';
                    ?>
                    <div class="icon"><i class="icon-user-1"></i></div><strong style="color: #111"><?php echo $shrink_text; ?></strong>
                  <?php  }

                  ?>                      
                </div>



                <?php 

                $ok=$key['id_proker'];
                $query_get_jobdesk= $this->db->query("SELECT * FROM tb_jobdesk where id_proker=$ok");

                if($query_get_jobdesk->num_rows()>0){

                  $bagi=0;
                  $nilai_rangkap=0;   

                  foreach($query_get_jobdesk->result() as $goal){

                    $bagi++;
                    $status=$goal->status_jobdesk;

                    if($status=='Belum Dikerjakan'){
                      $nilai=0; 
                    }elseif($status=='Progres'){
                      $nilai=50;
                    }else{
                      $nilai=100;
                    }

                    $nilai_rangkap=$nilai_rangkap+$nilai;

                  }

                  $final=$nilai_rangkap/$bagi;
                  // $final=12.34343;
                  $cek_1digit=substr($final,1,1);
                  $cek_2digit=substr($final,2,1);
                  $cek_3digit=substr($final,3,1);

                  $hit=strlen($final);
                  if ($cek_1digit==".") {
                      $print=substr($final,0,1);
                  }elseif($cek_2digit=="."){
                      $print=substr($final,0,2);
                  }elseif($cek_3digit=="."){ 
                      $print=substr($final,0,3);
                  }elseif ($hit<=1) {
                      $print=substr($final,0,1);
                  }elseif ($hit<=2) {
                      $print=substr($final,0,2);
                  }elseif ($hit<=3) {
                      $print=substr($final,0,3);                      
                  }

                }else{
                  $print=0;
                }
                ?>

                <div class="number <?php echo $fix_color ?>"><?php echo $print."%"; ?></div>
              </div>
              <div class="progress progress-template">
                <div role="progressbar" style="width: <?php echo $print ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template <?php echo $fix_bg ?>"></div>
              </div>
            </div>

          </div>
          <?php
          $color++;
          if ($color>7) {
            $color=1;
          } 
        }
        ?>

      </div>
    </div>
  </section>
  <!-- Breadcrumb-->


  <?php $this->load->view('bagian/footer') ?>