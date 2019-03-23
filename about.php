      <section class="py-5 bg-light" id="section-about">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5 w3-content w3-section" data-aos="fade-up">

  <img class="mySlides w3-animate-fading img-fluid rounded" src="images/uph9.png" style="width:100%">
  <img class="mySlides w3-animate-fading img-fluid rounded" src="images/uph7.png" style="width:100%">
  <img class="mySlides w3-animate-fading img-fluid rounded" src="images/uph5.jpg" style="width:100%">
  <img class="mySlides w3-animate-fading img-fluid rounded" src="images/uph3.jpg" style="width:100%">
              
            </div>
            <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
              <h4 class="heading mb-4">About Click <span class="text-danger">&amp;</span> Rent</h4>
              <p class="mb-5">EST. 2019, provided by SISTech UPH for UPH's family. This website was made to make sure UPH's family become easier to book a computer laboratory or a meeting room.</p>
              
            </div>
            
          </div>
        </div>
      </section>
      <script>
            var myIndex = 0;
            carousel();

            function carousel() {
              var i;
              var x = document.getElementsByClassName("mySlides");
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              myIndex++;
              if (myIndex > x.length) {myIndex = 1}    
              x[myIndex-1].style.display = "block";  
              setTimeout(carousel, 7000);    
            }
      </script>
