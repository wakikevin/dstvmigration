// JavaScript Document
$(document).ready(function(){

	var clock;

	clock = $('.clock').FlipClock({
        clockFace: 'DailyCounter',
        autoStart: false,
        callbacks: {
        	stop: function() {
        		$('.message').html('The clock has stopped!')
        	}
        }
    });
		    
    var ldate  = new Date(2014,11,31); 
     //var launchDate = new Date(ldate.getFullYear(), ldate.getMonth(), ldate.getDate());
     var today= new Date();
      
    clock.setTime(daysBetween(today,ldate));
    clock.setCountdown(true);
    clock.start();

    $("select").change(function () { 
       var str = ""; 
       str = $(this).find("option:selected").text(); 
       $(this).parent().find(".out").text(str);
    });

    $("select").each(function(index, el){
        var str = ""; 
        str = $(this).find("option").first().text(); 
        $(this).parent().find(".out").text(str);
    })

});//end doc.ready

//function to redirect
function redirect(url){
	window.location.href = BASE_URL + '/' +url;
}

var daysBetween = function( date1, date2 ) {
  //Get 1 day in milliseconds
  var one_day=1000;

  // Convert both dates to milliseconds
  var date1_ms = date1.getTime();
  var date2_ms = date2.getTime();

  // Calculate the difference in milliseconds
  var difference_ms = date2_ms - date1_ms;
  //console.log(difference_ms);
    //console.log(Math.round(difference_ms/one_day));
    
  // Convert back to days and return
  //return Math.round(difference_ms/one_day);
  return Math.round(((difference_ms/one_day) + 86400)); 
}