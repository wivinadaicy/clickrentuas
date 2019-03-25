
		$(document).ready(function(){
            $('#nextnya').hide();
			$("select#profesi").change(function(){
				var selectedProfesi= $(this).children("option:selected").val();
                
                
				if(selectedProfesi==3){
					$("#tiga").hide();
                    $("#hm").hide();
                    $("#mahasiswa").hide();
                    $('#nextnya').show();
                }

                if(selectedProfesi==4){
					$("#tiga").show();
                    $("#hm").show();
                    $("#mahasiswa").show();
                    $('#nextnya').hide();
                }
                
            });
            var cobaProfesi = $("#profesi").children("option:selected").val();
            if(cobaProfesi == 4){
                $("#mahasiswa").show();
            }

/*
            $("#kembali").click(function(){
				$("#formEmail").change(function(){
                    var email = $("input[name=email]").val();
                    $('#mail').empty();
                });
                
    
                
                $("#formNama").change(function(){
                    var nama = $("input[name=namalengkap]").val();
                    $('#nama').empty();
                });
                
    
                    var jk = $("input[name=jeniskelamin]:checked").val();
                    if(jk=="l"){
                        $('#jkk').empty();
                    }else{
                        $('#jkk').empty();
                    }
                    
                $("#formTanggallahir").change(function(){
                    var tgllahir = $("input[name=tanggallahir]").val();
                    $('#ttll').empty();
                });
                $("#formAlamat").change(function(){
                    var alamat = $.trim($("#formAlamat").val());
                    $('#almt').empty();
                });
                $("#formNohp").change(function(){
                    var nohp = $("input[name=nohp]").val();
                    $('#nohp').empty();
                });
    
    
                $("#formAngkatan").change(function(){
                    var x = $("input[name=angkatan]").val();
                    $('#angkatan').empty();
                });
                $("#formSemester").change(function(){
                    var y = $("input[name=semester]").val();
                    $('#semester').empty();
                });
                $("#formSks").change(function(){
                    var z = $("input[name=totalsks]").val();
                    $('#sks').empty();
                });
                $("#formIpk").change(function(){
                    var a = $("input[name=ipkterakhir]").val();
                    $('#ipk').empty();
                });
                
            });
            */
		});