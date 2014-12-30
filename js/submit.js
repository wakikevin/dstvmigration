// JavaScript Document
$(document).ready(function(e) {
    
	//when user clicks submit button
	$('.submit').click(function(e) {
        
		//get posted data
		var name = document.getElementById('name');
		var email = document.getElementById('email');
		var mobile = document.getElementById('mobile');
		var location = document.getElementById('location');
		
		
		//create validate instance
		var validate = new Validation();
		
		if(validate.validate_name(name)){
			if(validate.validate_email(email)){
				if(validate.validate_telephone(mobile)){
					if(validate.validate_empty(location)){
						
							$.ajax({
								url:BASE_URL+'/submit.php',
								type:'post',
								data:$('#frmDetails').serialize(),
								
									
	
							}).success(function(response){
								////console.log(response);
								var data = JSON.parse(response);
								//console.log(response);
								if(data.code == '000'){
									
									document.getElementById("frmDetails").reset();
									redirect('thank-you.php');
									
								}else if(data.code == '001'){
									$('#notify').addClass('notification error');
									$('#notify').empty().html(data.desc);
									$("#notify").stop().slideDown("slow", function(){
										$('html,body').animate({
												scrollTop: $("#notify").offset() - 0},
											'slow'
										);
									});
									
									$('.disclaimer').css('bottom','10px');
									
								}
							   
	
							}).error(function(response){
								console.log(response)
								})
						
					}else{
					
							
					}
				}else{
					
					mobile.value = "Enter Correct Mobile Number";	
				}
			}else{
				
				email.value = 'Enter Correct Email Address';
					
			}
		}else{
			
			
			name.value = 'Enter Correct Name';
				
		}
    });
});