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
/*ganti*/		
        var id = $("input[name=idmahasiswa]").val();
        var idpengguna = $("input[name=idpengguna]").val();
        var namaprodi = $("input[name=namaprodi]").val();
        var angkatan = $("input[name=angkatan]").val(); //text
		var semester = $("input[name=semester]").val();
		var sks = $("input[name=totalsks]").val();
        var ipk = $("input[name=ipk]").val();
        var idx = $("input[name=idx]").val();
		
		
        if(id=="" || idpengguna=="" || namaprodi=="" || angkatan=="" || semester=="" || sks=="" || ipk==""){
            e.preventDefault();
			$("form").valid();
        }else{
             $.post("mahasiswa/insertMahasiswa.php", //ganti
             { 
				 idmahasiswa:id,
                 idpengguna:idpengguna,
				 namaprodi:namaprodi,
				 angkatan:angkatan,
				 semester:semester,
				 totalsks:sks,
				 ipk:ipk,
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
		var id = $("input[name=idmahasiswa]").val();
        var idpengguna = $("input[name=idpengguna]").val();
        var namaprodi = $("input[name=namaprodi]").val();
        var angkatan = $("input[name=angkatan]").val(); //text
		var semester = $("input[name=semester]").val();
		var sks = $("input[name=totalsks]").val();
        var ipk = $("input[name=ipk]").val();
        var idx = $("input[name=idx]").val();
		
        
        if(id=="" || idpengguna=="" || namaprodi=="" || angkatan=="" || semester=="" || sks=="" || ipk==""){
            e.preventDefault();
			alert('Periksa kembali data yang dimasukkan!');
        }else{
             $.post("mahasiswa/updateMahasiswa.php", 
             {
				 idmahasiswa:id,
                 idpengguna:idpengguna,
				 namaprodi:namaprodi,
				 angkatan:angkatan,
				 semester:semester,
				 totalsks:sks,
				 ipk:ipk,
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