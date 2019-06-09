            <?php if ($this->session->userdata('ses_id_type_user') == 1) { ?>

              <nav id="sidebar">
                <!-- Sidebar Header-->
                <?php
                $id_user = $this->session->userdata('ses_id_type_user');
                $query=$this->db->query("SELECT * FROM tb_user where id_user =$id_user");
                ?>
                <div class="sidebar-header d-flex align-items-center">

                  <div class="title">
                    <?php
                    $nama=$this->session->userdata('ses_nama');
                    $ukm=$this->session->userdata('ses_ukm');
                    $utype=$this->session->userdata('ses_id_type_user');

                    $query_ukm=$this->db->query("SELECT * FROM tb_ukm");
                    $query_utype=$this->db->query("SELECT * FROM tb_type_user");
                    foreach ($query_ukm->result() as $key) {
                      if ($ukm==$key->id_ukm) {
                        $ukm_fix=$key->nama_ukm;
                      }
                    }
                    foreach ($query_utype->result() as $key_2) {
                      if ($utype==$key_2->id_type_user) {
                        $utype_fix=$key_2->nama_type_user;
                      }
                    }
                    ?>
                    <h1 class="h5"><?php echo $nama; ?></h1>
                    <p><?php echo $ukm_fix.' / '. $utype_fix; ?></p>
                  </div>
                </div>
                <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
                <ul class="list-unstyled">
                  <li><a href="<?php echo base_url('superadmin/Data_ukm/') ?>"> <i class="icon-grid"></i>Data UKM </a></li>

                  <li><a href="<?php echo base_url('superadmin/Data_periode/') ?>"> <i class="fa fa-bar-chart"></i>Data Periode </a></li>
                  <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Data User </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                      <?php
                      $query=$this->db->query("SELECT * FROM tb_ukm");;
                      foreach($query->result() as $row_ukm)  { 
                        $ukm_id=$row_ukm->id_ukm;
                        ?>                    
                        <li><a href="<?php echo base_url('superadmin/Data_user/detail/' . $ukm_id) ?>"><?php echo $row_ukm->nama_ukm; ?></a></li>
                        <?php
                      } ?> 
                    </ul>
                  </li>
                  <li style=" visibility: hidden;"><a href="<?php echo base_url('superadmin/Data_periode/') ?>"> end </a></li>

                </nav>

              <?php  }elseif ($this->session->userdata('ses_id_type_user') == 2) { ?>
                <nav id="sidebar">
                  <!-- Sidebar Header-->
                  <div class="sidebar-header d-flex align-items-center">

                    <div class="title">
                      <?php
                      $nama=$this->session->userdata('ses_nama');
                      $ukm=$this->session->userdata('ses_ukm');
                      $utype=$this->session->userdata('ses_id_type_user');

                      $query_ukm=$this->db->query("SELECT * FROM tb_ukm");
                      $query_utype=$this->db->query("SELECT * FROM tb_type_user");
                      foreach ($query_ukm->result() as $key) {
                        if ($ukm==$key->id_ukm) {
                          $ukm_fix=$key->nama_ukm;
                        }
                      }
                      foreach ($query_utype->result() as $key_2) {
                        if ($utype==$key_2->id_type_user) {
                          $utype_fix=$key_2->nama_type_user;
                        }
                      }
                      ?>
                      <h1 class="h5"><?php echo $nama; ?></h1>
                      <p><?php echo $ukm_fix.' / '. $utype_fix; ?></p>
                    </div>
                  </div>
                  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
                  <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('admin/Welcome') ?>"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="<?php echo base_url('admin/Data_user/') ?>"> <i class="fa fa-user"></i>Data Anggota </a></li>
                    <li><a href="<?php echo base_url('admin/Data_bidang/') ?>"> <i class="icon-grid"></i>Data Bidang </a></li> <li><a href="<?php echo base_url('admin/Data_proker/') ?>"> <i class="fa fa-bar-chart"></i>Data Program Kerja </a></li>
                    <li><a href="<?php echo base_url('admin/Data_sie/') ?>"> <i class="fa fa-wpforms"></i>Data Sie </a></li>
<!--                 <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>
                <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
              </ul><span class="heading">Extras</span>
              <ul class="list-unstyled">
                <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
              </ul> -->
            </nav>               
          <?php  }elseif ($this->session->userdata('ses_id_type_user') == 3) { ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">

                <div class="title">
                  <?php
                  $nama=$this->session->userdata('ses_nama');
                  $ukm=$this->session->userdata('ses_ukm');
                  $utype=$this->session->userdata('ses_id_type_user');

                  $query_ukm=$this->db->query("SELECT * FROM tb_ukm");
                  $query_utype=$this->db->query("SELECT * FROM tb_type_user");
                  foreach ($query_ukm->result() as $key) {
                    if ($ukm==$key->id_ukm) {
                      $ukm_fix=$key->nama_ukm;
                    }
                  }
                  foreach ($query_utype->result() as $key_2) {
                    if ($utype==$key_2->id_type_user) {
                      $utype_fix=$key_2->nama_type_user;
                    }
                  }
                  ?>
                  <h1 class="h5"><?php echo $nama; ?></h1>
                  <p><?php echo $ukm_fix.' / '. $utype_fix; ?></p>
                </div>
              </div>
              <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('bph/Welcome') ?>"> <i class="icon-home"></i>Home </a></li>
                <li><a href="<?php echo base_url('bph/Data_proker/') ?>"> <i class="fa fa-bar-chart"></i>Data Program Kerja </a></li>
                <li><a href="<?php echo base_url('bph/Data_referensi/') ?>"> <i class="fa fa-file"></i>Data Referensi </a></li>
<!--                 <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>
                <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
              </ul><span class="heading">Extras</span>
              <ul class="list-unstyled">
                <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
              </ul> -->
            </nav>               
          <?php  }elseif($this->session->userdata('ses_id_type_user') == 4) { ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">

                <div class="title">
                  <?php
                  $nama=$this->session->userdata('ses_nama');
                  $ukm=$this->session->userdata('ses_ukm');
                  $utype=$this->session->userdata('ses_id_type_user');

                  $query_ukm=$this->db->query("SELECT * FROM tb_ukm");
                  $query_utype=$this->db->query("SELECT * FROM tb_type_user");
                  foreach ($query_ukm->result() as $key) {
                    if ($ukm==$key->id_ukm) {
                      $ukm_fix=$key->nama_ukm;
                    }
                  }
                  foreach ($query_utype->result() as $key_2) {
                    if ($utype==$key_2->id_type_user) {
                      $utype_fix=$key_2->nama_type_user;
                    }
                  }
                  ?>
                  <h1 class="h5"><?php echo $nama; ?></h1>
                  <p><?php echo $ukm_fix.' / '. $utype_fix; ?></p>
                </div>
              </div>
              <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('admin/Welcome') ?>"> <i class="icon-home"></i>Anggota </a></li>
                <li><a href="<?php echo base_url('admin/Data_user/') ?>"> <i class="fa fa-user"></i>Data Anggota </a></li>
                <li><a href="<?php echo base_url('admin/Data_periode/') ?>"> <i class="fa fa-bar-chart"></i>Data Program Kerja </a></li>
                <li><a href="<?php echo base_url('admin/Data_user/') ?>"> <i class="fa fa-bar-file"></i>Data Referensi </a></li>
<!--                 <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>
                <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
              </ul><span class="heading">Extras</span>
              <ul class="list-unstyled">
                <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
                <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
              </ul> -->
            </nav>               
          <?php  }elseif($this->session->userdata('ses_nav_proker') == 1) { 
            $ses_nav=$this->session->userdata('ses_nav_proker');
            ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">

                <div class="title">
                  <?php
                  $nama=$this->session->userdata('ses_nama');
                  $ukm=$this->session->userdata('ses_ukm');
                  $utype=$this->session->userdata('ses_id_type_user');

                  $query_ukm=$this->db->query("SELECT * FROM tb_ukm");
                  $query_utype=$this->db->query("SELECT * FROM tb_type_user");
                  foreach ($query_ukm->result() as $key) {
                    if ($ukm==$key->id_ukm) {
                      $ukm_fix=$key->nama_ukm;
                    }
                  }
                  foreach ($query_utype->result() as $key_2) {
                    if ($utype==$key_2->id_type_user) {
                      $utype_fix=$key_2->nama_type_user;
                    }
                  }
                  ?>
                  <h1 class="h5"><?php echo $nama; ?></h1>
                  <p><?php echo $ukm_fix.' / '. $utype_fix; ?></p>
                </div>
              </div>
              <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('anggota/Proker/back_index') ?>"> <i class="icon-home"></i>Home </a></li>
                <li><a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Data Jobdesk </a>
                  <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                    <?php 
                    $query=$this->db->query("SELECT * FROM tb_sie");;
                    foreach($query->result() as $row_sie)  { 
                      $sie_id=$row_sie->id_sie;
                      ?>                    
                      <li><a href="<?php echo base_url('anggota/Data_jobdesk/detail/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?>"><?php echo $row_sie->nama_sie; ?></a></li>
                      <?php
                    } ?> 
                  </ul>
                </li>                
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user"></i>Data Panitia </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <?php
                    $query=$this->db->query("SELECT * FROM tb_sie");
                    foreach($query->result() as $row_sie)  { 
                      $sie_id=$row_sie->id_sie;
                      ?>                    
                      <li><a href="<?php echo base_url('anggota/Data_panitia/detail/'.$ses_proker.'/'.$sie_id.'/'.$id_sie) ?>"><?php echo $row_sie->nama_sie; ?></a></li>
                      <?php
                    } ?> 
                  </ul>
                </li>
                <li><a href="<?php echo base_url('anggota/Data_evaluasi/value/'.$ses_proker.'/'.$id_sie.'/'.$ses_nav) ?>"> <i class="icon-padnote"></i>Data Evaluasi </a></li>
                <li><a href="<?php echo base_url('anggota/Data_referensi/periode/'.$ses_proker.'/'.$id_sie.'/'.$ses_nav) ?>"> <i class="fa fa-file"></i>Data Referensi </a></li>
              </ul>
            </nav>             
          <?php  }elseif($this->session->userdata('ses_nav_proker') == 2) { 
            $ses_nav=$this->session->userdata('ses_nav_proker');
            ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">

                <div class="title">
                  <?php
                  $nama=$this->session->userdata('ses_nama');
                  $ukm=$this->session->userdata('ses_ukm');
                  $utype=$this->session->userdata('ses_id_type_user');

                  $query_ukm=$this->db->query("SELECT * FROM tb_ukm");
                  $query_utype=$this->db->query("SELECT * FROM tb_type_user");
                  foreach ($query_ukm->result() as $key) {
                    if ($ukm==$key->id_ukm) {
                      $ukm_fix=$key->nama_ukm;
                    }
                  }
                  foreach ($query_utype->result() as $key_2) {
                    if ($utype==$key_2->id_type_user) {
                      $utype_fix=$key_2->nama_type_user;
                    }
                  }
                  ?>
                  <h1 class="h5"><?php echo $nama; ?></h1>
                  <p><?php echo $ukm_fix.' / '. $utype_fix; ?></p>
                </div>
              </div>
              <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('anggota/Proker/back_index') ?>"> <i class="icon-home"></i>Home </a></li>             
                <li><a href="<?php echo base_url('anggota/Data_anggota/daftar_anggota/'.$ses_proker.'/'.$id_sie) ?>"> <i class="fa fa-user"></i>Data Anggota </a></li>
                <li><a href="<?php echo base_url('anggota/Data_evaluasi/value/'.$ses_proker.'/'.$id_sie.'/'.$ses_nav) ?>"> <i class="fa icon-padnote"></i>Data Evaluasi </a></li>                
                <li><a href="<?php echo base_url('anggota/Data_referensi/periode/'.$ses_proker.'/'.$id_sie.'/'.$ses_nav) ?>"> <i class="fa fa-file"></i>Data Referensi </a></li>
              </ul>
            </nav>             
          <?php  }elseif($this->session->userdata('ses_id_type_user') == 5) { ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <?php
              $nama=$this->session->userdata('ses_nama');
              $ukm=$this->session->userdata('ses_ukm');
              $utype=$this->session->userdata('ses_id_type_user');
              ?>
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Foto</h4>
                    </div>
                    <div class="modal-body">
                      <p>Ubah Foto Profil</p>
                      <form action="<?php echo base_url('anggota/Welcome/ganti_foto') ?> " method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label style="font-size:12px; padding-left:5px;">(Format JPG/JPEG/PNG maks 5MB)</label><br>
                          <input type="file" name="berkas">
                        </div>
                        <div class="form-group space_help_button" style="margin-top: 15%;">       
                          <input type="submit" name="submit" value="Upload" class="btn btn_dewe_color">
                        </div>                        
                      </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>

              <div class="sidebar-header2">
                <?php 
  
                $f_user=$this->session->userdata('ses_id_user');
                $get_foto=$this->db->query("SELECT * FROM tb_user where id_user=$f_user");

                foreach ($get_foto->result() as $getFoto) {
                  $foto=$getFoto->foto_user;
                }

                if ($foto!=null) {
                  $link='upload/foto_user/'.$foto;
                }else{
                  $link='assets/img/avatar-6.jpg';
                }
                 ?>

                <center><div class="avatar2 profil_hover"><img data-toggle="modal" data-target="#myModal" src="<?php echo base_url($link) ?>" title="Ganti Foto" alt="..." class="img-fluid rounded-circle"></div></center>
              </div>
              <div class="sidebar-header">
                <center>
                  <div class="title">
                    <?php

                    $query_ukm=$this->db->query("SELECT * FROM tb_ukm");
                    $query_utype=$this->db->query("SELECT * FROM tb_type_user");
                    foreach ($query_ukm->result() as $key) {
                      if ($ukm==$key->id_ukm) {
                        $ukm_fix=$key->nama_ukm;
                      }
                    }
                    foreach ($query_utype->result() as $key_2) {
                      if ($utype==$key_2->id_type_user) {
                        $utype_fix=$key_2->nama_type_user;
                      }
                    }
                    ?>
                    <h1 class="h5"><?php echo $nama; ?></h1>
                    <p><?php echo $ukm_fix.' / '. $utype_fix; ?></p>
                  </div>
                </center>
              </div>
              
            </nav>  
          <?php }?> 

