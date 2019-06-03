 <footer class="footer">
  <div class="footer__block block_helpFooter no-margin-bottom">
    <div class="container-fluid text-center"> 
      <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
      <p class="no-margin-bottom">2019 &copy; Simonik OKI POLINEMA</p>
    </div>
  </div>
</footer>
</div>
</div>
<!-- JavaScript files-->
<script src="<?php echo base_url ('assets/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url ('assets/vendor/popper.js/umd/popper.min.js"')?>"> </script>
<script src="<?php echo base_url ('assets/vendor/bootstrap/js/bootstrap.min.js"')?>"></script>
<script src="<?php echo base_url ('assets/vendor/jquery.cookie/jquery.cookie.js"')?>"> </script>
<script src="<?php echo base_url ('assets/vendor/chart.js/Chart.min.js')?>"></script>
<script src="<?php echo base_url ('assets/vendor/jquery-validation/jquery.validate.min.js')?>"></script>
<script src="<?php echo base_url ('assets/js/charts-home.js')?>"></script>
<script src="<?php echo base_url ('assets/js/front.js')?>"></script>
<script src="<?php echo base_url ('assets/js/dropzone.js')?>"></script>
<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script src="<?php echo base_url ('assets/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url ('assets/js/dataTables.bootstrap4.min.js')?>"></script>


<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );

  function onHover(value) {
    var values=value;

    if (values==1) {
      var nilai = 20;
      document.getElementById("rate").value = nilai;
      document.getElementById("star_1").setAttribute('class','fa fa-star primary');
      document.getElementById("star_2").setAttribute('class','fa fa-star primary0');
      document.getElementById("star_3").setAttribute('class','fa fa-star primary0');
      document.getElementById("star_4").setAttribute('class','fa fa-star primary0');
      document.getElementById("star_5").setAttribute('class','fa fa-star primary0');
    }else if(values==2){
      var nilai = 40;
      document.getElementById("rate").value = nilai;
      document.getElementById("star_1").setAttribute('class','fa fa-star primary');
      document.getElementById("star_2").setAttribute('class','fa fa-star primary');
      document.getElementById("star_3").setAttribute('class','fa fa-star primary0');
      document.getElementById("star_4").setAttribute('class','fa fa-star primary0');
      document.getElementById("star_5").setAttribute('class','fa fa-star primary0');
    }else if(values==3){
      var nilai = 60;
      document.getElementById("rate").value = nilai;
      document.getElementById("star_1").setAttribute('class','fa fa-star primary');
      document.getElementById("star_2").setAttribute('class','fa fa-star primary');
      document.getElementById("star_3").setAttribute('class','fa fa-star primary');
      document.getElementById("star_4").setAttribute('class','fa fa-star primary0');
      document.getElementById("star_5").setAttribute('class','fa fa-star primary0');
    }else if(values==4){
      var nilai = 80;
      document.getElementById("rate").value = nilai;
      document.getElementById("star_1").setAttribute('class','fa fa-star primary');
      document.getElementById("star_2").setAttribute('class','fa fa-star primary');
      document.getElementById("star_3").setAttribute('class','fa fa-star primary');      
      document.getElementById("star_4").setAttribute('class','fa fa-star primary');      
      document.getElementById("star_5").setAttribute('class','fa fa-star primary0');      
    }else if(values==5){
      var nilai = 100;
      document.getElementById("rate").value = nilai;
      document.getElementById("star_1").setAttribute('class','fa fa-star primary');
      document.getElementById("star_2").setAttribute('class','fa fa-star primary');
      document.getElementById("star_3").setAttribute('class','fa fa-star primary');      
      document.getElementById("star_4").setAttribute('class','fa fa-star primary');      
      document.getElementById("star_5").setAttribute('class','fa fa-star primary');      
    }
  }

</script>
<script type="application/x-javascript">

tinymce.init({selector:'#TypeHere'});

</script>
<script type="text/javascript">
      $('#notifikasi').slideDown('slow').delay(1500).slideUp('fast');
</script>
</body>
</html>