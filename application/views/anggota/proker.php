<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data Sie </h2>
    </div>
  </div>
  <section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <?php $no=1; $s=0;$hit=0; $color=1;?>
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

          if ($key['id_sie']==$s) {

          }else{ ?>           
            <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">

                      <?php $hit=0; foreach ($convert_sie as $key_sie) { 
                        if ($key_sie['id_sie']==$key['id_sie']) {
                          $nama_sie=$key_sie['nama_sie'];
                        }
                      }
                      ?>          
                      <div class="icon"><i class="icon-user-1"></i></div><strong><?php echo $nama_sie ?></strong>
                    </div>

                    <?php 

                    $table='tb_jobdesk';
                    $f_ukm='id_ukm';
                    $f_proker='id_proker';
                    $f_sie='id_sie';
                    $ukm_id=$this->session->userdata('ses_ukm');
                    $proker_id=$this->session->userdata('ses_id_selected_proker');
                    $sie_id=$key['id_sie'];
                    $query = $this->db->get_where($table,array($f_ukm=>$ukm_id,$f_proker=>$proker_id,$f_sie=>$sie_id));
                    if($query->num_rows()>0)
                    {
                      $jumlah_jobdesk=$query->num_rows();
                    }
                    else
                    {
                      $jumlah_jobdesk=0;
                    }

                    $value_job=$this->db->query("SELECT * FROM tb_jobdesk where id_ukm=$ukm_id AND id_proker=$proker_id AND id_sie=$sie_id");
                    $loop=0; $loop_2=0; $count=0;

                    foreach ($value_job->result() as $result) {

                      if ($jumlah_jobdesk!=0) {
                        if ($loop<$jumlah_jobdesk) {
                          $get_value=$result->status_jobdesk;
                          if ($get_value=='Belum Dikerjakan') {
                            $point=0;
                          }elseif($get_value=='Progres'){
                            $point=50;
                          }else{
                            $point=100;
                          }
                          $value[$loop]=$point;
                        }
                      }else{
                        $value[$loop]=0;
                      }


                      $loop++;

                    }

                    foreach ($value_job->result() as $hasil) {
                      if ($loop_2<$jumlah_jobdesk) {
                        $count=$count+$value[$loop_2];
                      }
                      $loop_2++;
                    }

                    $hitung=$count/$jumlah_jobdesk;
                    // echo $count.$jumlah_jobdesk;
                    // $hitung=1.333;
                    $cek_1digit=substr($hitung,1,1);
                    $hit=strlen($hitung); 
                      if ($hit<=2) {
                        $print=$hitung;
                      }else{ 

                        if ($hitung==100) {
                          $shrink_text= substr($hitung,0,3);
                          $print=$shrink_text;
                        }elseif($cek_1digit=="."){
                          $print=substr($hitung,0,1);
                        }else{
                          $shrink_text= substr($hitung,0,2);
                          $print=$shrink_text;
                        }

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
          }
          $s=$key['id_sie'];
          $hit++;
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