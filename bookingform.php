<head>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>
</head>
<section class="section bg-light pb-0"  >
        <div class="container">
         
          <div class="row check-availabilty" id="next">
            <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

              <form method="post">
                <div class="row">
                  <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                    <label class="font-weight-bold text-form">Date</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="icon-calendar"></span></div>
                      <input type="date" id="tanggalPinjam" name="tanggalPinjam" class="form-control" required min="<?php echo date('Y-m-d', strtotime(date("Y-m-d") . ' +1 day'));?>">
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                    <div class="row">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="font-weight-bold text-form">Start</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          
                        <select name="waktuMulai" id="waktuMulai" class="form-control" onchange="cekwaktuSelesai()" >
                        <option value="x">Pilih</option>

                          <?php
                          $cekAkhir = mysqli_query($koneksi, "SELECT DISTINCT waktu_mulai FROM waktu_jadwal");

                          while($datajamdepan = mysqli_fetch_array($cekAkhir)){
                          ?>
                            
                            <option value="<?php echo $datajamdepan['waktu_mulai'] ?>"> <?php echo $datajamdepan['waktu_mulai'] ?> </option>
                          <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="font-weight-bold text-form">Finish</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="waktuSelesai" id="waktuSelesai" class="form-control" disabled>

                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                    <label class="font-weight-bold text-form">Room</label>
                    <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="ruangan" id="ruangan" class="form-control">
                            <option value="1">Laboratory</option>
                            <option value="2">Meeting Room</option>
                          </select>
                        </div>
                  </div>
                    
                  <div class="col-md-6 col-lg-3 align-self-end">
                    <input class="btn btn-primary btn-block text-white btn btn-outline-white-primary" id="cekavailability" onclick="cekRuangan()" value="Check Availabilty" type="button">
                  </div>
                  <p style="font-size:10px; color:red" id="ceksession"></p>
                  
                 

                  
           <!-- <div class="container" style="margin-top:30px;">
            <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                Rooms Availability
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>Room Name</strong></h4>
                            <h4>
                                <small>Room Description</small>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                                <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong>Room Name</strong></h4>
                            <h4>
                                <small>Room Description</small>
                            </h4>
                        </div>
                    </div>
            </div>
        </div>
</div>-->
                    
                </div>
              </form>
              <div class="row" id="ruangannya">
                  
            
                  </div>
            </div>
          </div>
        </div>
        
    
    </section>
		
		<!-- Theme Base, Components and Settings -->

    <script>

function cekwaktuSelesai(){
	$(document).ready(function(){
  var mulai2 = $('#waktuMulai').children("option:selected").val();
  if($('#waktuMulai').val()=="x"){
        $('#waktuSelesai').prop('disabled',true);
        $('#cekavailability').prop('disabled',true);
      }
	$.ajax({
		type:"post",
		url:"cekComboJam.php",
		dataType: "JSON",
		data: {mulai:mulai2},
		success: function(respond){
      if($('#waktuMulai').val()=="x"){
        $('#waktuSelesai').prop('disabled',true);
        $('#cekavailability').prop('disabled',true);
      }else{
        $('#waktuSelesai').empty();
        $('#waktuSelesai').prop("disabled",false);
        $('#cekavailability').prop('disabled',false);
      }
        
      $('#waktuSelesai').empty();
      $('#waktuSelesai').append(respond);

      
		}
	});
});
}
function tampilRuangan(){
$(document).ready(function(){
  $('#ruangannya').hide();
  $('#cekavailability').prop('disabled',true);
});
}

function cekRuangan(){
	$(document).ready(function(){
  var mulai2 = $('#waktuMulai').children("option:selected").val();
  var selesai2 = $('#waktuSelesai').children("option:selected").val();
  var tanggal2 = $('#tanggalPinjam').val();
  var ruang2 = $('#ruangan').children("option:selected").val();
	$.ajax({
		type:"post",
		url:"cekRuang.php",
    dataType: "json",
		data: {mulai:mulai2, selesai:selesai2, tanggal:tanggal2, ruang:ruang2},
		success: function(response){
      $('#ruangannya').show();
      $('#ruangannya').empty();
      $('#ruangannya').append(response);
		}
	});
});
}

function ceksemua(){
  var mulai2 = $('#waktuMulai').children("option:selected").val();
  var selesai2 = $('#waktuSelesai').children("option:selected").val();
  var tanggal2 = $('#tanggalPinjam').val();
  var ruang2 = $('#ruangan').children("option:selected").val();

  if(tanggal2==""){
    $('#cekavailability').prop('disabled',true);
  }else{
    $('#cekavailability').prop('disabled',false);
  }
}

</script>

<input type="hidden" name="ses" id="ses" value ="<?php echo $email?>">

<script>
function cekSes(){
  var ses = $("#ses").val();

  if($("#ses").val()!=""){
    $("#cekavailability").show();
    $("#ceksession").empty();
  }else{
    $("#cekavailability").hide();
    $("#ceksession").html("*Anda harus log in terlebih dahulu untuk membooking ruangan");
  }
}

window.onload = function() {
  cekSes();
  ceksemua();
};
</script>
