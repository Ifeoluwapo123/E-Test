$(document).ready(()=>{

	var time =document.getElementById('time').textContent;

	var hours = time.substr(0, time.indexOf('-'));

	var x = time.substr(time.indexOf('-')+1, time.length);
	
	var minutes = x.substr(0, time.indexOf('-'));

	var seconds = x.substr(time.indexOf('-')+1, time.length);


	var number = parseInt(sessionStorage.getItem('size'));
    
    setInterval(function butnSelected(){

    	for (var i = 1; i < number+1; i++) {
		    butn = sessionStorage.getItem('data'+i);
		    if(butn === null){
		       $('#'+i+'.buttons').css("background-color", "#FF6347");
		    }else{
		       $('#'+i+'.buttons').css("background-color", "#00f6AC");
		    }
        }

    }, 1000);

	$('#show1').on('click', ()=>{
		$('#foot').fadeIn();
		$('#show').fadeIn();
		$('#show1').hide();
	});

	$('#show').on('click', ()=>{
		$('#foot').fadeOut();
		$('#show').hide();
		$('#show1').show();
	});

	$(document).on('click','.buttons', function(){
		var vid = $(this).attr('id');
		exam = document.getElementById('examination').textContent;
		$.ajax({
			type: 'POST',
    		url: 'E_test.php', 
    		data:$.param({'q_id': vid+"@"+exam}),

    		success: function(data){
    			res = JSON.parse(data);
 
    			document.getElementById("questions").innerHTML=
			            "<span>("+res[6]+")</span> "+res[0];

			    document.getElementById("option1").innerHTML=
			            "<input type='radio' id='1' class='detail' name='opt'/> "+res[1];

			    document.getElementById("option2").innerHTML=
			            "<input type='radio' id='2' class='detail' name='opt'/> "+res[2];

			    document.getElementById("option3").innerHTML=
			            "<input type='radio' id='3' class='detail' name='opt'/> "+res[3];

			    document.getElementById("option4").innerHTML=
			            "<input type='radio' id='4' class='detail' name='opt'/> "+res[4];

			    result = sessionStorage.getItem('data'+res[6]);
			   
				if(result == undefined){
					document.getElementById(result[0]).checked = false;
				}else{
					document.getElementById(result[0]).checked = true;
				}
                
    		},
    		error: function(){
    			alert('error');
    		} 
		});
	});


    $(document).on('change','.detail', function(){
		var vid = $(this).attr('id');
		storage = [vid, res[6]];
		sessionStorage.setItem('data'+res[6], storage);
	});

	var number = parseInt(sessionStorage.getItem('size'));
    

	$('#submit').on('click', function(){
		exam = document.getElementById('examination').textContent;
		myname = document.getElementById('my-name').textContent;
		res = [];
		for (var i = 1; i < number+1 ; i++) {
			res[i] = sessionStorage.getItem('data'+i);
		}

		$.ajax({
			type: 'POST',
    		url: 'score.php', 
    		data:$.param({'res':  res,
    					  'exam': exam,
    					  'name': myname 
    					}),

    		success: function(data){
    			alert(data);
    			for (var i = 1; i < number+1 ; i++) {
			    	res[i] = sessionStorage.removeItem('data'+i);
			    	sessionStorage.removeItem('size');
				}
				setTimeout(
					window.location.assign("http://localhost/E-Test/logout.php"), 1000);
    		},

    		error: function(){
    			alert('error');
    		}
		});
	});

    $('#clickme').on('click', function(){

    	//window.location.assign("http://localhost/E-Test/E_test.php");
  		$('#next').show();
  		$('#prev').show();
  		$('#submit').show();
     

    	setInterval(function timerCountdown(){
		    $('#time').html(hours+":"+minutes+":"+seconds);

			if(hours == "00" && minutes == "00" && seconds == "01"){
				$('#time').html("00:00:01");
				setTimeout($('#time').html("00:00:00"),1000);
				result();
			}

			if(seconds ==='00'){
				minute = parseInt(minutes);
				hour = parseInt(hours);

				if(minute == 0 && hour == 0){
					second = parseInt(seconds);
					seconds = "0"+second.toString();
				}else{
					second = parseInt(seconds)+60;
					second--;
					seconds = second.toString();
				}

				if(minute == 0){
				   
				   if(hour == 0){
				   		minute = minute + 0;
				   	    hour = hour + 0;
				   }
				   else{
					   	minute=minute+60;
					   	hour--;
					   	minute--;
				   }
				   
				}else{
					minute--;
				}
				
				if(hour < 10){
					hours = "0"+hour.toString();
					
				}else{
					hours = hour.toString();
				}
				if(minute < 10){
					minutes = "0"+minute.toString();
				}
				else{
					minutes = minute.toString();
				}
				
			}else if(seconds !=='00'){
				second = parseInt(seconds);
				second--;
				if(second < 10){
				    seconds = "0"+second.toString();
				}else{
					seconds = second.toString();
				}
			}
		
	    }, 1000);

    });

    
	

	function result(){
		res = [];
		for (var i = 1; i < number+1 ; i++) {
			res[i] = sessionStorage.getItem('data'+i);
		}

		$.ajax({
			type: 'POST',
    		url: 'score.php', 
    		data:$.param({'res': res,
    					  'exam': exam
    					}),
    		success: function(data){
    			alert(data);

    			for (var i = 1; i < number+1 ; i++) {
			    	res[i] = sessionStorage.removeItem('data'+i);
				}
				sessionStorage.removeItem('save');
				setTimeout(
					window.location.assign("http://localhost/E-Test/logout.php"), 1000);
    		},

    		error: function(){
    			alert('error');
    		}
		});
	}

	$('#clicked').on('click', function(){
		window.location.reload(false);
    });
    	
});