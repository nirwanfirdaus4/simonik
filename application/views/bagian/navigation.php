            <?php if ($this->session->userdata('ses_id_type_user') == 1) { ?>

              <nav id="sidebar">
                <!-- Sidebar Header-->
                <div class="sidebar-header d-flex align-items-center">
                  <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
                  <div class="title">
                    <?php $nama=$this->session->userdata('ses_nama');?>
                    <h1 class="h5"><?php echo $nama; ?></h1>
                    <p>Web Designer</p>
                  </div>
                </div>
                <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
                <ul class="list-unstyled">
                  <li><a href="<?php echo base_url('Welcome') ?>"> <i class="icon-home"></i>Home </a></li>
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
                    <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="title">
                      <?php $nama=$this->session->userdata('ses_nama');?>                              
                      <h1 class="h5"><?php echo $nama; ?></h1>
                      <p>Web Designer</p>
                    </div>
                  </div>
                  <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
                  <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('admin/Welcome') ?>"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="<?php echo base_url('admin/Data_bidang/') ?>"> <i class="icon-grid"></i>Data Bidang </a></li>
                    <li><a href="<?php echo base_url('admin/Data_user/') ?>"> <i class="icon-grid"></i>Data Anggota </a></li>
                    <li><a href="<?php echo base_url('admin/Data_proker/') ?>"> <i class="fa fa-bar-chart"></i>Data Program Kerja </a></li>
                    <li><a href="<?php echo base_url('admin/Data_user/') ?>"> <i class="fa fa-bar-chart"></i>Data Referensi </a></li>
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
          <?php  }elseif ($this->session->userdata('ses_id_type_user') == 6) { ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                  <?php $nama=$this->session->userdata('ses_nama');?>                              
                  <h1 class="h5"><?php echo $nama; ?></h1>
                  <p>Web Designer</p>
                </div>
              </div>
              <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('bph/Welcome') ?>"> <i class="icon-home"></i>Home </a></li>
                <li><a href="<?php echo base_url('bph/Data_proker/') ?>"> <i class="fa fa-bar-chart"></i>Data Program Kerja </a></li>
                <li><a href="<?php echo base_url('bph/Data_referensi/') ?>"> <i class="fa fa-bar-chart"></i>Data Referensi </a></li>
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
          <?php  }elseif($this->session->userdata('ses_id_type_user') == 7) { ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                  <?php $nama=$this->session->userdata('ses_nama');?>                              
                  <h1 class="h5"><?php echo $nama; ?></h1>
                  <p>Web Designer</p>
                </div>
              </div>
              <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('admin/Welcome') ?>"> <i class="icon-home"></i>Anggota </a></li>
                <li><a href="<?php echo base_url('admin/Data_user/') ?>"> <i class="icon-grid"></i>Data Anggota </a></li>
                <li><a href="<?php echo base_url('admin/Data_periode/') ?>"> <i class="fa fa-bar-chart"></i>Data Program Kerja </a></li>
                <li><a href="<?php echo base_url('admin/Data_user/') ?>"> <i class="fa fa-bar-chart"></i>Data Referensi </a></li>
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

          <?php  }elseif($this->session->userdata('ses_nav_proker') == 1) { ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                  <?php $nama=$this->session->userdata('ses_nama');?>                              
                  <h1 class="h5"><?php echo $nama; ?></h1>
                  <p>Web Designer</p>
                </div>
              </div>
              <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
              <ul class="list-unstyled">
                <li><a href="<?php echo base_url('anggota/Proker/back_index') ?>"> <i class="icon-home"></i>Home </a></li>
                <li><a href="<?php echo base_url('anggota/Data_jobdesk/') ?>"> <i class="icon-grid"></i>Data Jobdesk</a></li>
                <li><a href="<?php echo base_url('anggota/Data_panitia/') ?>"> <i class="fa fa-bar-chart"></i>Data Panitia </a></li>
                <li><a href="<?php echo base_url('anggota/Data_referensi/') ?>"> <i class="fa fa-bar-chart"></i>Data Referensi </a></li>
              </ul>
            </nav>             
          <?php  }elseif($this->session->userdata('ses_id_type_user') == 8) { ?>
            <nav id="sidebar">
              <!-- Sidebar Header-->
              <div class="sidebar-header2">
                <center><div class="avatar2"><img src="<?php echo base_url('assets/img/avatar-6.jpg') ?>" alt="..." class="img-fluid rounded-circle"></div></center>
              </div>
              <div class="sidebar-header">
                <center>
                  <div class="title">
                    <?php $nama=$this->session->userdata('ses_nama');?>                              
                    <h1 class="h5 name_anggota"><?php echo $nama; ?></h1>
                    <p>Web Designer</p>
                  </div>
                </center>
              </div>
              
            </nav>  
          <?php }?> 

