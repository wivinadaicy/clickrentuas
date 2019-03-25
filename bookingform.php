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
                      <input type="date" id="tanggalPinjam" name="tanggalPinjam" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                    <div class="row">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label class="font-weight-bold text-form">Start</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          
                        <select name="waktuMulai" id="waktuMulai" class="form-control" onchange="cekselesai()" >
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
                          <select name="selesai" id="selesai" class="form-control" disabled>

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
                            <option value="R-1">Laboratory</option>
                            <option value="R-2">Meeting Room</option>
                          </select>
                        </div>
                  </div>
                    
                  <div class="col-md-6 col-lg-3 align-self-end">
                    <button class="btn btn-primary btn-block text-white btn btn-outline-white-primary">Check Availabilty</button>
                  </div>
                    
                  <div class="col-12" id="ruang">
                    <div class="container bg-primary" id="lab">
                      
                    </div>
                    <div class="container bg-primary" id="meet">
                      
                    </div>
                  </div>
                  <!--<section class="rowtab" id="tabruang">
                    <div class="col-md-12">
							        <div class="tabs">
                        <ul class="nav nav-tabs">
                          <li class="active" id="tlab">
                            <a href="#lab" data-toggle="tab"><strong>Laboratories</strong></a>
                          </li>
                          <li id="tmeet">
                            <a href="#meet" data-toggle="tab"><strong>Meeting Rooms</strong></a>
                          </li>
                        </ul>
                      <div class="tab-content">
                        <div id="lab" class="tab-pane active">
                          <p>Laboratories</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                        </div>
                        <div id="meet" class="tab-pane">
                          <p>Meeting Rooms</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                        </div>
                      </div>
                    </div>
						      </div>
                </section>-->
                    
                </div>
              </form>
            </div>
          </div>
        </div>
        
    
    </section>
		
		<!-- Theme Base, Components and Settings -->

    <script>

function cekselesai(){
	$(document).ready(function(){
  var mulai2 = $('#waktuMulai').children("option:selected").val();
  if($('#waktuMulai').val()=="x"){
        $('#selesai').prop('disabled',true);
      }
	$.ajax({
		type:"post",
		url:"cekComboJam.php",
		dataType: "JSON",
		data: {mulai:mulai2},
		success: function(respond){
      if($('#waktuMulai').val()=="x"){
        $('#selesai').prop('disabled',true);
      }else{
        $('#selesai').empty();
        $('#selesai').prop("disabled",false);
      }
        
      $('#selesai').empty();
      $('#selesai').append(respond);

      
		}
	});
});
}
</script>