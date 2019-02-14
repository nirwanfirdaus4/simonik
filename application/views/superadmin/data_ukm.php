<?php $this->load->view('bagian/header') ?>
<!-- Sidebar Navigation end-->
<div class="page-content">
  <!-- Page Header-->
  <div class="page-header no-margin-bottom">
    <div class="container-fluid">
      <h2 class="h5 no-margin-bottom">Data UKM</h2>
    </div>
  </div>
  <!-- Breadcrumb-->
  <div class="container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('index.php/') ?>">Home</a></li>
      <li class="breadcrumb-item active">Data UKM</li>
    </ul>
  </div>
  <div class="col-lg-12">
    <div class="block">
      <div class="title"><strong>Compact Table</strong></div>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <!-- <th>Nomer</th> -->
              <th>Nama UKM</th>
              <th>Action</th>
            </tr> 
          </thead>
          <tbody>
            <?php foreach ($array as $key) { ?>
              <tr>
                <td><?php echo $key['nama_ukm'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>  
    </div>
  </div>
</div>

<?php $this->load->view('bagian/footer') ?>