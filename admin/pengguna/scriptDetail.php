<?php
session_start();
$emailx = $_SESSION['email'];
$passwordx =$_SESSION['password'];
$namax = $_SESSION['nama'];
$jkx = $_SESSION['jk'];
$idx = $_SESSION['id'];
$alamatx = $_SESSION['alamat'];
$nohpx = $_SESSION['no_hp'];
$statusx= $_SESSION['status'];

?>
<!--TAMBAH-->
<input type="text" name="idx" id="idx" value="<?php echo $idx?>" hidden>
<script>
    (function( $ ) {

	'use strict';
        
	$(document).on('click', '.tambah', function (e) {
		var id = $("input[name=idpengguna]").val();
    var nama = $("input[name=namalengkap]").val();
     var tgllahir = $("input[name=tanggallahir]").val();
		var email = $("input[name=email]").val();
		var password = $("input[name=katasandi]").val();
		var nohp = $("input[name=nomorhp]").val();
		var status = $("#statuspengguna").children("option:selected").val();
		var alamat = $.trim($("#alamat").val());
		var jk = $("input[name=jeniskelamin]:checked").val();
		var idx = $("input[name=idx]").val();
		
		
        if(id=="" || nama=="" || tgllahir=="" || email=="" || password=="" || nohp=="" || status=="" || alamat=="" || jk==""){
            e.preventDefault();
			$("form").valid();
        }else{
             $.post("pengguna/insert.php", 
             { 
				 idpengguna:id,
                 namalengkap:nama,
				 tanggallahir:tgllahir,
				 email:email,
				 katasandi:password,
				 nomorhp:nohp,
				 statuspengguna:status,
				 jk:jk,
				 alamat:alamat,
				 idx:idx,
            },
            function(response,status){ 
                 location.reload();

            });
            
            $.magnificPopup.close();
            
            new PNotify({
			title: 'Success!',
			text: 'Data berhasil ditambahkan',
			type: 'success'
		});
        }
		
	});
    
    }).apply( this, [ jQuery ]);
</script>


<!--EDIT-->
<script>
    (function( $ ) {

	'use strict';
        
	$(document).on('click', '.edit', function (e) {
		var id = $("input[name=idpengguna]").val();
		var nama = $("input[name=namalengkap]").val();
		var tgllahir = $("input[name=tanggallahir]").val();
		var email = $("input[name=email]").val();
		var password = $("input[name=katasandi]").val();
		var nohp = $("input[name=nomorhp]").val();
		var status = $("#statuspengguna").children("option:selected").val();
		var alamat = $.trim($("#alamat").val());
		var jk = $("input[name=jeniskelamin]:checked").val();
		var idx = $("input[name=idx]").val();
		
        if(id=="" || nama=="" || tgllahir=="" || email=="" || password=="" || nohp=="" || status=="" || alamat=="" || jk==""){
            e.preventDefault();
			alert('Periksa kembali data yang dimasukkan!');
        }else{
             $.post("pengguna/update.php", 
             {
				 idpengguna:id,
                 namalengkap:nama,
				 tanggallahir:tgllahir,
				 email:email,
				 katasandi:password,
				 nomorhp:nohp,
				 statuspengguna:status,
				 jk:jk,
				 alamat:alamat,
				 idx:idx,
            },
            function(response,status){ 
                 location.reload();

            });
            
            $.magnificPopup.close();
            
            new PNotify({
			title: 'Success!',
			text: 'Data berhasil diedit',
			type: 'success'
		});
        }
		
	});
    
    }).apply( this, [ jQuery ]);
</script>

<script>
	$(".batal").click(function(){
  		location.reload();
	});
</script>