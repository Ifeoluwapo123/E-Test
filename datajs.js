var xmlHttp = createXmlHttpRequestObject();
let num;

let data = [];
let storage = [];
var b = [];

function createXmlHttpRequestObject() {
	var xmlHttp;
	try { 
	  	xmlHttp = new XMLHttpRequest();  
	}  
	catch(e) {
		var XmlHttpVersions = new Array('MSXML2.XMLHTTP.6.0',     
	                                  	'MSXML2.XMLHTTP.5.0',                             
	                                  	'MSXML2.XMLHTTP.4.0',                      
	                                  	'MSXML2.XMLHTTP.3.0',        
	                                  	'MSXML2.XMLHTTP',                                    
	                                  	'Microsoft.XMLHTTP');   
	
		for (var i=0; i<XmlHttpVersions.length && !xmlHttp; i++){      
		  	try {           
		  		xmlHttp = new ActiveXObject(XmlHttpVersions[i]);      
		    }
		 	catch (e) {}    
		}  
    }  

	if (!xmlHttp)    
		alert("Error creating the XMLHttpRequest object.");  
	else     
		return xmlHttp; 
} 

function process2(){
	
	exam = document.getElementById('examination').textContent;
	num = document.getElementById('number').textContent;
    
    count = 1;
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
		xmlHttp.open("GET", "dataphp.php?count=" +count+"@"+exam, true);   
		xmlHttp.onreadystatechange = handleServerResponse; 
		xmlHttp.send(null);
	}else
		setTimeout('process2()', 1000);
}

function process(){
	
	exam = document.getElementById('examination').textContent;
	num = document.getElementById('number').textContent;
    
    count = 0;
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
		xmlHttp.open("GET", "dataphp.php?count=" +count+"@"+exam, true);   
		xmlHttp.onreadystatechange = handleServerResponse; 
		xmlHttp.send(null);
	}else
		setTimeout('process()', 1000);
}

function handleServerResponse(){
	if(xmlHttp.readyState==4){
		if(xmlHttp.status == 200){
			xmlResponse = xmlHttp.responseXML;
			xmlDocumentElement = xmlResponse.documentElement;
			obj = xmlDocumentElement.firstChild.data;
			data = JSON.parse(obj);
			document.getElementById("questions").innerHTML=
			            "<span>("+data[6]+")</span> "+data[0];

			document.getElementById("option1").innerHTML=
			            "<input type='radio' id='1' name='opt' onchange='set(this.id)'/> "+data[1];

			document.getElementById("option2").innerHTML=
			            "<input type='radio' id='2' name='opt' onchange='set(this.id)'/> "+data[2];

			document.getElementById("option3").innerHTML=
			            "<input type='radio' id='3' name='opt' onchange='set(this.id)'/> "+data[3];

			document.getElementById("option4").innerHTML=
			            "<input type='radio' id='4' name='opt' onchange='set(this.id)'/> "+data[4];

			sessionStorage.setItem('size', num);

			res = sessionStorage.getItem('data'+data[6]);

			if(res == undefined){
				document.getElementById(res[0]).checked = false;
			}else{
				document.getElementById(res[0]).checked = true;
			}

		}else{
			alert('Error accessing the server'+xmlHttp.statusText);
		}
	}	
} 

var count = 1;
function next(){
	if (count < num) {count++;}else{count=1;}
	exam = document.getElementById('examination').textContent;
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
		xmlHttp.open("GET", "dataphp.php?count=" +count+"@"+exam, true);   
		xmlHttp.onreadystatechange = handleServerResponse; 
		xmlHttp.send(null); 
	}else
		setTimeout('process()', 1000);
}

function prev(){
	if (count > 1) {count--;}else{count = num;} 
	exam = document.getElementById('examination').textContent;
    if(xmlHttp.readyState == 4 || xmlHttp.readyState == 0){
		xmlHttp.open("GET", "dataphp.php?count=" +count+"@"+exam, true);   
		xmlHttp.onreadystatechange = handleServerResponse; 
		xmlHttp.send(null); 
	}else
		setTimeout('process()', 1000);
}

function set(id){
	storage = [id, data[6]];
	sessionStorage.setItem('data'+data[6], storage);

}

var number = parseInt(sessionStorage.getItem('size'));

for (var i = 1; i < number+1; i++) {
	result = sessionStorage.getItem('data'+i);
}

function timeCount(){
	setInterval(function timerCountdown(){

		document.getElementById('time').innerHTML = hours+":"+minutes+":"+seconds;

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
}

setInterval(function butnSelected(){
	for (var i = 1; i < number+1; i++) {
	    butn = sessionStorage.getItem('data'+i);
	    if(butn === null){

	    }else{
	     
	    }
    }
}, 2000);