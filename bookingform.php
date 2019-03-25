<section class="section bg-light pb-0"  >
        <div class="container">
         
          <div class="row check-availabilty" id="next">
            <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

              <form action="#">
                <div class="row">
                  <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                    <label class="font-weight-bold text-form">Date</label>
                    <div class="field-icon-wrap">
                      <div class="icon"><span class="icon-calendar"></span></div>
                      <input type="text" id="checkin_date" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                    <div class="row">
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label for="adults" class="font-weight-bold text-form">Start Time</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="" id="adults" class="form-control">
                            <option value="">07.15</option>
                            <option value="">09.15</option>
                            <option value="">10.15</option>
                            <option value="">13.15</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 mb-3 mb-md-0">
                        <label for="children" class="font-weight-bold text-form">Finish Time</label>
                        <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="" id="children" class="form-control">
                            <option value="">08.55</option>
                            <option value="">09.45</option>
                            <option value="">11.55</option>
                            <option value="">14.55</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                    <label class="font-weight-bold text-form">Room</label>
                    <div class="field-icon-wrap">
                          <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                          <select name="ruangan" id="ruangan" class="form-control" onchange="cekRuangan()">
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

        <!-- Vendor -->
		<script src="template/octopus/assets/vendor/jquery/jquery.js"></script>
		<script src="template/octopus/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="template/octopus/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="template/octopus/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="template/octopus/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="template/octopus/assets/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="template/octopus/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="template/octopus/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="template/octopus/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="template/octopus/assets/javascripts/theme.init.js"></script>

<script>
function cekRuangan(){
  $(document).ready(function(){
      var ruang2 = $('#ruangan').children("option:selected").val();

      if(ruang2 == "R-1"){
        $("#ruang").show();
        $("#lab").show();
        $("#meet").hide();
      }
      if(ruang2=="R-2"){
        $("#ruang").show();
        $("#lab").hide();
        $("#meet").show();
      }

  $.ajax({
		type:"post",
		url:"cekRuang.php",
		dataType: "JSON",
		data: {ruang:ruang2},
		success: function(respond){
			if(respond==1){
				$("#berikutnya").hide();
				$("#cekemailnya").html("*Email sudah terdaftar");
			}else{
				$("#berikutnya").show();
				$("#cekemailnya").empty();
				document.getElementById('dua').style.pointerEvents = 'none';
				document.getElementById('tiga').style.pointerEvents = 'none';
				document.getElementById('empat').style.pointerEvents = 'none';
			}
			
		}
	});


    });
}

$(document).ready(function(){
  $("#ruang").hide();
  $("#lab").hide();
  $("#meet").hide();
});
</script>

<script>
function cekRuangan(){
	$(document).ready(function(){
	var ruangan2 = $("#ruangan").val();
	
	$.ajax({
		type:"post",
		url:"cekemailAjax.php",
		dataType: "JSON",
		data: {email:email2},
		success: function(respond){
			if(respond==1){
				$("#berikutnya").hide();
				$("#cekemailnya").html("*Email sudah terdaftar");
			}else{
				$("#berikutnya").show();
				$("#cekemailnya").empty();
				document.getElementById('dua').style.pointerEvents = 'none';
				document.getElementById('tiga').style.pointerEvents = 'none';
				document.getElementById('empat').style.pointerEvents = 'none';
			}
			
		}
	});
});
}

</script>