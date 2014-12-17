
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
		    
    clock.setTime(220880);
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

		