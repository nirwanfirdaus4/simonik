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
                <li><a href="<?php echo base_url('superadmin/Data_user/') ?>"> <i class="fa fa-bar-chart"></i>Data User </a></li>
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
                <li><a href="<?php echo base_url('admin/Data_user/') ?>"> <i class="icon-grid"></i>Data Bidang </a></li>
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
            <?php  }else { ?>
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
            <?php  } ?>



