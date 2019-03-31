<html>
    <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        
        <style>
            body{padding-top:30px;}

            .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

            small {
                    display: block;
                    line-height: 1.428571429;
                    color: #999;
            }
            
            
            
        </style>
        
    </head>
<div id="lihatprofil" class="modal-block modal-block-sm mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Profile Data</h2>
		</header>
		<div class="panel-body">
			<div class="modal-wrapper">
				<div class="modal-text">
    <div class="container">
    <div class="row">
        
        <div class="col-xs-9 col-sm-4 col-md-4">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-7">
                        <h4><b><?php echo $nama ?></b></h4>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo $email ?>
                            <br />
                            <i class="glyphicon glyphicon-map-marker"></i><?php echo $alamat ?>
                            <br />
                            <i class="glyphicon glyphicon-earphone"></i><?php echo $nohp ?>
                            <br />
                            <i class="glyphicon glyphicon-briefcase"></i>IPK
                            <br />
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
					 
				</div>
			</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-primary modal-dismiss">Ok</button>
				</div>
			</div>
		</footer>
	</section>
</div>
</html>