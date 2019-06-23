<!DOCTYPE html>
<html>
<head>
	<title>SIMONIK || Sistem Informasi Monitoring Kegiatan dan Evaluasi</title>
    <link href="<?php echo base_url('assets/css/nirwan/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/css/nirwan/style.css'); ?>" rel="stylesheet" type="text/css">
    <link rel='shortcut icon' type='image/png' href="<?php echo base_url('assets/img/favicon.png') ?>" />
</head>
<body style="background-color:#2b3137;" >

<section>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<p class="start_login_text orkney">simonik</p>
				<p class="orkney desc_login">Memudahkan monitoring dan evaluasi kinerja tim anda untuk memberikan hasil yang maksimal pada setiap program kerja di OKI POLINEMA.</p>
			</div>				
			<div class="col-lg-1">
				
			</div>
			<div class="col-lg-5">
			<div class="content_login" style="background-color: white;">
				
						<div class="form_space">			
						<form enctype="multipart/form-data" method="post" class="" action="<?php echo base_url('Login_user/aksi_login') ?>">
							<div class="form-group">
								<!-- <b><p align="left" class="LoginText">Login</p></b> -->
								<center><img class="img_login" src="<?php echo base_url('assets/img/Simonik.png') ?>"></center>
								<p class="welcome orkney">Selamat datang, silahkan isikan username dan password untuk masuk ke akun anda.</p>
								<input type="text" name="username" placeholder="Username" class="form-control form_conf" autocomplete="off">
								<input type="password" name="password" placeholder="Password" class="form-control form_conf">
							</div>
								<!-- <p align="right" class="orkney forgot_password">Lupa password?</p> -->
								<center><button type="submit" class="btn btn-success btn_conf">Login</button></center>
						</form>
							
						</div>
						<hr>						
				
			</div>
			</div>
		</div>
	</div>
</section>


</body>
</html>