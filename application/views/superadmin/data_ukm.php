<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
      <div class="title"><strong>Data UKM</strong></div>
      <button type="button" class="btn btn_dewe" data-toggle="modal" data-target="#modalAdd" >Tambah Data</button>
      <div class="table-responsive"> 
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID UKM</th>
              <th>Nama UKM</th>
              <th>Aksi</th>
            </tr> 
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>  
    </div>
  </div>
</div>

  <div id="modalAdd" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-title" align="center">
          <h2>ADD NEW MEMBER</h2>
        </div>
        <div class="modal-body">
          <!-- <input type="text" name="tanggal" class="tanggal form-control ins" placeholder="Date" id="DateOrder"><br> -->
          <input type="text" class="form-control ins" placeholder="Member ID..." id="nama_ukm"><br>
          <!-- <input type="hidden" id="rowId" val="0"> -->
        </div>
        <div class="modal-footer">
          <input id="submitForm" type="button" value="Add" class="btn btn-success" onclick="uploadData('addnew');">
        </div>
      </div>
    </div>
  </div>

<!-- MODAL ADD -->
<div class="modal fade" id="modalAdd2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header header_modal">
          <center><p class="modal_header_text">Tambah UKM</p></center>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control ins" placeholder="Nama UKM..." id="nama_ukm"><br>
        </div>
        <div class="modal-footer">
          <button type="button" id="submitForm" class="btn btn_dewe" onclick="uploadData('addnew');">Tambahkan</button>
        </div>
      </div>
      
    </div>
  </div>
<div id="editModal" class="modal fade">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header header_modal">
          <center><p class="modal_header_text">Tambah UKM</p></center>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control ins" placeholder="Nama UKM..." id="nama_ukm1"><br>
        </div>
        <div class="modal-footer">
          <button type="button" id="submitForm1" class="btn btn_dewe" onclick="updateRow('update');">Tambahkan</button>
        </div>
      </div>
    </div>
  </div>  


<?php $this->load->view('bagian/footer') ?>

<script type="text/javascript">  
  $(document).ready(function(){
    displayData(0,50); /*start,limit*/
    
    $('#addnew').on('click', function(){
      $('#inputModal').modal('show');
    });

    $('#edit').on('click', function(){
      $('#editModal').modal('show');
    });
  });
  
    function displayData(start,limit){
    $.ajax({
      url: '<?php echo site_url('Ajax')?>',
      method: 'POST',
      dataType: 'text',
      data: {
        key: 'getData',
        start: start,
        limit: limit
      }, success: function (response) {
        if(response != 'limitMax'){
          $('tbody').append(response);
          start += limit;
          displayData(start,limit);
        }else {
          $(".table").DataTable({
            responsive: true
          }); //ANEH MAKSIMAL
        }
      }
    });
  }

  function uploadData(data){
    // var DateOrder = $('#DateOrder');
    var nama_ukm = $('#nama_ukm');

    if(cekInsert(nama_ukm)){
      $.ajax({
        url: '<?php echo site_url('Ajax')?>',
        method: 'POST',
        dataType: 'text',
        data: {
          key: data,
          nama_ukm: nama_ukm.val()
        }, success: function (response) {
          //alert(response);
          $(".table").DataTable().destroy();
          $('tbody').empty();
          $("#modalAdd").modal('hide');
          $('#modalAdd').on('hidden.bs.modal', function(){
              $('.ins').val("");
          });
          displayData(0,50);
        }
      });
    }

  }  

    //KETIKA ANDA KLIK TOMBOL EDIT
  function edit(row){
    $.ajax({
      url: 'ajax1.php',
      method: 'POST',
      dataType: 'json',
      data: {
        key: 'selectRow',
        data: row
      }, success: function (response) {
        // $('#rowId').val(response.id);
        // $('#rev_id1').val(response.rev_id1);
        $('#member_id1').val(response.member_id1);
        // $('#DateOrder1').val(response.DateOrder1);
        $('#checkIn1').val(response.checkIn1);
        $('#checkOut1').val(response.checkOut1);
        $('#tables1').val(response.tables1);
        $('#editModal').modal('show');
        // $('#submitForm1').attr('value', 'Update').attr('onclick',"updateRow('update')");
      }
    });
  } 

  function dels(row){
      $.ajax({
        url: '<?php echo site_url('Ajax')?>',
        method: 'POST',
        dataType: 'text',
        data: {
          key: 'delete',
          data: row
        }, success: function (response) {
          // alert(response);
          $(".table").DataTable().destroy();
          $('tbody').empty();
          displayData(0,50);
        }
      });
    }





  function cekInsert(input){
    if(input.val() == ''){
      input.css('border', '1px solid red');
      return false;
    } else {
      input.css('border', '');
      return true;
    }
  }

</script>
