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

            <div class="statistic-block block">
              <div class="progress-details d-flex align-items-end justify-content-between">
                <div class="title">

                  <?php

                  $hitung=strlen($key['nama_proker']);
                  if ($hitung<=13) {?>
                    <div class="icon"><i class="icon-user-1"></i></div><strong><?php echo $key['nama_proker']; ?></strong>
                    <?php
                  }else{ 
                    $shrink_text= substr($key['nama_proker'],0,18).'...';
                    ?>
                    <div class="icon"><i class="icon-user-1"></i></div><strong><?php echo $shrink_text; ?></strong>
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
                    // echo "rangkap awal : ".$nilai_rangkap."<br> ditambah ".$nilai."<br>"."bagi dengan ".$bagi."<br>";
                    $nilai_rangkap=$nilai_rangkap+$nilai;
                    // echo "rangkap : ".$nilai_rangkap."<br>";
                  }
                  // $hiya= "<br> hiya ketemu : ".$nilai_rangkap." / ".$bagi;
                  // echo $hiya;
                  $final=$nilai_rangkap/$bagi;
                  // echo "<br> hasil e == ".$final;
                $hit=strlen($final);
                if ($hit<=2) {
                        $print=$final;
                      }else{ 
                        $shrink_text= substr($final,0,2);
                        $print=$shrink_text;
                      }

                // echo "<br> dadi fix :".$print;
                }else{
                  $print=0;
                }
                // else{
                //   $final=0;
                //   // echo $final;
                // }

                // $hit=strlen($final);
                // if ($hit<=2) {
                //         $print=$hitung;
                //       }else{ 
                //         $shrink_text= substr($hitung,0,2);
                //         $print=$shrink_text;
                //       }
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