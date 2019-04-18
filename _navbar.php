
 <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="templateux-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/uph-sistech.png" alt="Logo sistech" height="40" width="40"></a>
        <div class="site-menu-toggle js-site-menu-toggle  ml-auto"  data-aos="fade" data-toggle="collapse" data-target="#templateux-navbar-nav" aria-controls="templateux-navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <!-- END menu-toggle -->

        <div class="collapse navbar-collapse" id="templateux-navbar-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="#section-home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-rooms">Rooms</a></li>
            <li class="nav-item"><a class="nav-link" href="#section-contact">Contact</a></li>
			  <?php
			  
			  if($email==""){
				echo   "<li class='nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0'><a class='nav-link' href='loginuser.php'><span class='pb_rounded-4 px-4 rounded'>Log in</span></a></li>";
			  
			  }else{ 
				$linkProfil = "admin/index.php";
				if($jk=="l"){
					$foto = "images/fotoprofil/male.png";
				}else{
					$foto = "images/fotoprofil/female.png";
				}
				 
				  
 				  echo "<li class='nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0'> <a class='nav-link' href='$linkProfil' style='font-weight:bold'><span class='pb_rounded-4 px-4 rounded'> <img src='$foto' width='30px' style='border-radius: 50%;'>  $nama</span></a></li>";
			  }
			  ?>
          </ul>
        </div>
      </div>
    </nav>