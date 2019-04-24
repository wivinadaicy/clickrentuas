$(document).ready(function() {
   var calendarx = $('#kal').fullCalendar({
    editable:true,
    events: 'load3.php',
    selectable:true,
	selectHelper:true,
    dayClick: function(date, jsEvent, view) { 
        var today = new Date();
        var end = new Date();                
        end.setDate(today.getDate()-1);  

        if(date > today) {
        //window.location.href = "insertLabAdmin.php?tanggal=" + date.format();
        }
    
    },
    dayRender: function (date, cell) {

                    var today = new Date();
                    var end = new Date();                
                    end.setDate(today.getDate()-1);                 


                    if( date < end) {
                    cell.css("background-color", "lightgray");
                    } // this is for previous date 

                    if(date > today) {
                        cell.css("background-color", "white");
                    }


                }
        
   });
  });

  function cekWarnak(){
  
    $.ajax({
        url:"cekWarna2.php",
        dataType: "JSON",
        success: function(respond){
            $('#warkal').empty();
            $('#warkal').append(respond);
        }
    });
  }


