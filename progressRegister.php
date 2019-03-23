<!--TAMBAH-->
<script>
    (function( $ ) {

	'use strict';
        
	$(document).on('click', '.insertRegister', function (e) {
    var nama = $("input[name=namalengkap]").val();
     var tgllahir = $("input[name=tanggallahir]").val();
        var email = $("input[name=email]").val();
		var password = $("input[name=katasandi]").val();
		var nohp = $("input[name=nohp]").val();
		var status = $("#profesi").children("option:selected").val();
		var alamat = $.trim($("#formAlamat").val());
        var jk = $("input[name=jeniskelamin]:checked").val();

        if(nama=="" || tgllahir=="" || email=="" || password=="" || nohp=="" || status=="" || alamat=="" || jk==""){
            e.preventDefault();
            $("form").valid();
        }else{
            
             $.post("insertRegister.php", 
             { 
                 namalengkap:nama,
				 tanggallahir:tgllahir,
				 email:email,
				 katasandi:password,
				 nomorhp:nohp,
				 statuspengguna:status,
				 jk:jk,
				 alamat:alamat,
            },
            function(response,status){ 
                 location.reload();

            });
            
            new PNotify({
			title: 'Success!',
			text: 'Data berhasil ditambahkan',
			type: 'success'
		});
        }
		
	});
    
    }).apply( this, [ jQuery ]);
</script>