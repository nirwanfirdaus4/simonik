<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<!DOCTY` html>
<html>
<head> 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script language='JavaScript'>
    var txt="SIMONIK || Sistem Informasi Monitoring Kegiatan dan Evaluasi ";
    var speed=300;
    var refresh=null;
    function action() { document.title=txt;
      txt=txt.substring(1,txt.length)+txt.charAt(0);
      refresh=setTimeout("action()",speed);}action();
    </script>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font.css') ?>">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="<?php echo base_url('assets/https://fonts.googleapis.com/css?family=Muli:300,400,700') ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.default.css') ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/habibie/style_habibie.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/nirwan/style.css') ?>">
    <!-- Favicon-->
    <link rel='shortcut icon' type='image/png' href="<?php echo base_url('assets/img/favicon.png') ?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css') ?>">

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
      <body>
        <header class="header">   
          <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
              <div class="navbar-header">
                <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">SI</strong><strong>MONIK</strong></div>
                  <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
                  <!-- Sidebar Toggle Btn-->
                  <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>
                <?php
                if($this->session->userdata('ses_id_type_user')==5){ ?>
                <?php
                  $semua_notifikasi = $this->db->get_where('tb_notifikasi', array('penerima_notifikasi' => $this->session->userdata('ses_id_user')))->result();
                  $belum_dibaca = $this->db->get_where('tb_notifikasi', array('penerima_notifikasi' => $this->session->userdata('ses_id_user'), 'status_notifikasi' => '0'))->result();
                ?>
                <div class="right-menu list-inline no-margin-bottom">  
                 <div class="list-inline-item dropdown">
                    <a id="navbarDropdownMenuLink2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link tasks-toggle"><i class="fa fa-bell"></i><span class="badge dashbg-3"><?php echo count($belum_dibaca) ?></span></a>
                    <div aria-labelledby="navbarDropdownMenuLink2" class="dropdown-menu tasks-list">
                      <?php foreach($semua_notifikasi as $notifikasi) { 
                        $konten = $notifikasi->konten_notifikasi;
                        $tautan = $notifikasi->tautan_notifikasi;
                        ?>
                      <a style="color: <?php echo ($notifikasi->status_notifikasi=='0' ? 'red' : '') ?>" href="<?php echo $tautan ?>" class="dropdown-item">
                        <div class="content"><strong class="d-block"><?php echo $konten ?></strong><span class="d-block">40% complete</span></div>
                      </a>
                      <a href="#" class="dropdown-item text-center"> <strong>Tandai Semua Sebagai Telah Dilihat</strong></a>
                      <?php } ?>
                    </div>
                  </div>
  
                <?php }?>      
                
                <!-- Log out               -->
                <div class="list-inline-item logout"><a id="logout" href="<?php echo base_url('Login_user/logout') ?>" class="nav-link"> <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a></div>
              </div>
            </div>
          </nav>
        </header>
        <div class="d-flex align-items-stretch">
          <!-- Sidebar Navigation-->
          <?php $this->load->view('bagian/navigation') ?>
