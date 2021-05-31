<?php
include('dbconnect.php');
session_start();
$Balance=$_SESSION['var'];
$rfid = $_SESSION['varname'];
$Slotno=$_SESSION['varna'];
$statusslot=$_SESSION['varnam'];
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<body>
<meta http-equiv="refresh" content="30">
<script type="text/javascript">     
var status1 = "0"; 
var status2 = "0";
var status3 = "0";
var status4 = "0";
var col1="#ffffff";           
function read()
{
	var request;
	if(window.XMLHttpRequest)
		{
		request=new XMLHttpRequest();
		}
	else if(window.ActiveXObject)
		{
		request=new ActiveXObject("Microsoft.XMLHTTP");
		}	
		request.open("GET","http://api.thingspeak.com/channels/999068/feeds/last.json?api_key=SI1WWS26YWILCY44",false);
		request.send();	
		var str=request.responseText;
		console.log("response: "+str);
		if(str.length>0)
		{		
			var res = str.split(":");
			var res1=res[5].split('"');
			console.log(res1);
			
			results = res1[1].split("$");
			console.log(results);                                                        
        	var res2=res[6].split('"');
			console.log(res2);
			results1 = res2[1].split("$");
			console.log(results1);
            var res3=res[7].split('"');
			console.log(res3);
			results2 = res3[1].split("$");
			console.log(results2);
            var res4=res[8].split('"');
			console.log(res4);
			results3 = res4[1].split("$");
			console.log(results3);
            var res5=res[9].split('"');
			console.log(res5);
			results4 = res5[1].split("$");
			console.log(results);                                                        
        	var res6=res[10].split('"');
			console.log(res6);
			results5 = res6[1].split("$");
			console.log(results5);
            var res7=res[11].split('"');
			console.log(res7);
			results6 = res7[1].split("$");
			console.log(results6);
      		var res8=res[12].split('"');
			console.log(res8);
			results7 = res8[1].split("$");
			console.log(results7);   
            console.log(3);
		}
status1=results[0];
status2=results1[0];
status3 = results2[0];
status4 = results3[0];
status5 = results4[0];
status6 = results5[0];
status7 = results6[0];
status8 = results7[0];
if(status3 == "0" && status4 == "0")
{
	if (status1=="0"&&status2=="0")
	{	
		document.getElementById("av1").style.backgroundColor="green";
		document.getElementById("av2").style.backgroundColor="green";
	}
	else if (status1=="1"&&status2=="0")
	{
	document.getElementById("av1").style.backgroundColor="blue";
	document.getElementById("av2").style.backgroundColor="green";			
	}
	else if (status1=="0"&&status2=="1")
	{
	document.getElementById("av1").style.backgroundColor="green";
	document.getElementById("av2").style.backgroundColor="blue";
	}	
	else if (status1=="1"&&status2=="1")
	{
	document.getElementById("av1").style.backgroundColor="blue";
	document.getElementById("av2").style.backgroundColor="blue";
	}	
	}
    else if(status3 != "0" && status4 == "0"){
	if (status1=="0"&&status2=="0")
	{
	document.getElementById("av1").style.backgroundColor="red";
	document.getElementById("av2").style.backgroundColor="green";
	}
	else if (status1=="1"&&status2=="0")
	{
	document.getElementById("av1").style.backgroundColor="red";
    document.getElementById("av2").style.backgroundColor="green";
	}
	else if (status1=="0"&&status2=="1")
	{
	document.getElementById("av1").style.backgroundColor="red";
	document.getElementById("av2").style.backgroundColor="blue";
	}	
	else if (status1=="1"&&status2=="1")
	{
	document.getElementById("av1").style.backgroundColor="red";
	document.getElementById("av2").style.backgroundColor="blue";
	}	
	}
	else if(status3 == "0" && status4 != "0"){
	if (status1=="0"&&status2=="0")
	{
	document.getElementById("av1").style.backgroundColor="green";
	document.getElementById("av2").style.backgroundColor="red";
	}
	else if (status1=="1"&&status2=="0")
	{
	document.getElementById("av1").style.backgroundColor="blue";
	document.getElementById("av2").style.backgroundColor="red";
	}
	else if (status1=="0"&&status2=="1")
	{
	document.getElementById("av1").style.backgroundColor="green";
	document.getElementById("av2").style.backgroundColor="red";
	}	
	else if (status1=="1"&&status2=="1")
	{
	document.getElementById("av1").style.backgroundColor="blue";
	document.getElementById("av2").style.backgroundColor="red";
	}	
	}	
    else if(status3 != "0" && status4 != "0")
	{
	document.getElementById("av1").style.backgroundColor="red";
	document.getElementById("av2").style.backgroundColor="red";
	}
	else
	{
	document.getElementById("av1").style.backgroundColor="yellow";
	document.getElementById("av2").style.backgroundColor="yellow";
	}
	}
	document.getElementById("demo").innerHTML = col1;
	
	function writessourceslot1()
	{
    if (status3 != "0" )
	{
        	alert("Already booked ...... ");
            
    }    	
	else if(status1 == "1")
	{
            alert("vehicle is not there.. cannot book as source  ....");
    }
    else {
	    var r = confirm("confirm!");
  		if (r == true)
		{
		window.open("cofirmed1.php")
		alert("Hi There! Source slot 1 booked successfully!");
		var sentmsg= '<?php echo $rfid?>'+"0";
	   	var request1;
	if(window.XMLHttpRequest)
		{
		request1=new XMLHttpRequest();
        }
	else if(window.ActiveXObject)
		{
		request1=new ActiveXObject("Microsoft.XMLHTTP");
        }
    	request1.open("POST","https://api.thingspeak.com/update?api_key=1K3XWZ01FGWB0455&field1="+status1+"&field2="+status2+"&field3="+sentmsg+"&field4="+status4+"&field5="+status5+"&field6="+status6+"&field7="+status7+"&field8="+status8,false);
		request1.send();
  		}
  	else 
	  {
   		alert("cancelled");
  	  }
      }
	  }
  function writessourceslot2()
	{ 
        if (status4 != "0" )
		{
        alert("Already booked ...... ");
        }    
		else if(status2 == "1")
		{
            alert("vehilcle is not there.. cant book as source  ....");
    	}
        else {
		var r = confirm("confirm!");	
  	if (r == true) {
	window.open("cofirmed2.php")
    alert("Hi There! Source slot 2 booked successfully!");
	var sentmsg= '<?php echo $rfid?>'+"0";
	var request1;
	if(window.XMLHttpRequest)
	{
		request1=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		request1=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
		request1.open("POST","https://api.thingspeak.com/update?api_key=1K3XWZ01FGWB0455&field1="+status1+"&field2="+status2+"&field3="+status3+"&field4="+sentmsg+"&field5="+status5+"&field6="+status6+"&field7="+status7+"&field8="+status8,false);
		request1.send();
  	}
  	else 
	{
   		alert("cancelled");
  	}
    }
  }
  function writesdestslot1()
	{
  	if (status3 != "0" ){
    alert("Already booked ...... ");        
    }    
    else if(status1 != "1")
	{
    alert("vehilcle is there cant book as destination ....");
    }
    else  
	{
	var r = confirm("confirm!");	
  	if (r == true) {
	window.open("destconfirm1.php")
	alert("Hi There! Destination slot 1 booked successfully!");
	var sentmsg= '<?php echo $rfid?>'+"1";
	var request1;
	if(window.XMLHttpRequest)
	{
		request1=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		request1=new ActiveXObject("Microsoft.XMLHTTP");
	}
	request1.open("POST","https://api.thingspeak.com/update?api_key=1K3XWZ01FGWB0455&field1="+status1+"&field2="+status2+"&field3="+sentmsg+"&field4="+status4+"&field5="+status5+"&field6="+status6+"&field7="+status7+"&field8="+status8,false);
	request1.send();
	}
  	else 
	{
   	alert("cancelled");
  	}
    }
}
  function writesdestslot2()
	{
    if (status4 != "0" ){
    alert("Already booked ...... ");        
    }    
    else if(status2 != "1")
	{
    alert("vehilcle is there cant book as destination ....");
    }
    else  
	{
	var r = confirm("confirm!");	
  	if (r == true) {
	window.open("destconfirm2.php")
    alert("Hi There! Destination slot 2 booked successfully!");
	var sentmsg= '<?php echo $rfid?>'+"1";
	var request1;
	if(window.XMLHttpRequest)
	{
		request1=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		request1=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
		request1.open("POST","https://api.thingspeak.com/update?api_key=1K3XWZ01FGWB0455&field1="+status1+"&field2="+status2+"&field3="+status3+"&field4="+sentmsg+"&field5="+status5+"&field6="+status6+"&field7="+status7+"&field8="+status8,false);
		request1.send();
   }
  	else {
   	alert("cancelled");
  	}	
    }
 	}
  	function writescancelslot1()
	{
	var r = confirm("confirm!");	
  	if (r == true) {
	window.open("cancel1.php")
    alert("Hi There! booking of slot1 is Cancelled!");
	var sentmsg= "0";
	var request1;
	if(window.XMLHttpRequest)
	{
		request1=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		request1=new ActiveXObject("Microsoft.XMLHTTP");
	}
	request1.open("POST","https://api.thingspeak.com/update?api_key=1K3XWZ01FGWB0455&field1="+status1+"&field2="+status2+"&field3="+sentmsg+"&field4="+status4+"&field5="+status5+"&field6="+status6+"&field7="+status7+"&field8="+status8,false);
	request1.send();
  }
  	else 
  	{
   	alert("cancelled");
  	}	
  }
  	function writescancelslot2()
	{
	var r = confirm("confirm!");	
  	if (r == true) {
	window.open("cancel1.php")
    alert("Hi There! booking of slot2 is Cancelled!");
	var sentmsg= "0";
	var request1;
	if(window.XMLHttpRequest)
	{
		request1=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		request1=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
		request1.open("POST","https://api.thingspeak.com/update?api_key=1K3XWZ01FGWB0455&field1="+status1+"&field2="+status2+"&field3="+status3+"&field4="+sentmsg+"&field5="+status5+"&field6="+status6+"&field7="+status7+"&field8="+status8,false);
		request1.send();
		window.location.href = "confirmed1.php";
	
  }
  else 
  {
   alert("cancelled");
  }	
  }
  document.getElementId("cal").innerHTML = read();

</script>
</head>
<style>
#av1 {
	width: 100px;
	height: 20px;

	color: white;
}
#av2 {
	width: 100px;
	height: 20px;
	
	color: white;
}

* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  color:"red";
  background-image:url('img_b.png');
	background-size: cover;
  background-repeat: repeat-x repeat-y;
}

.header {
  grid-area: header;
  padding: 30px;
  text-align: center;
  font-size: 30px;
}

/* The grid container */
.grid-container {
  display: grid;
  grid-template-areas: 
    'header header header header header header' 
    'left left middle middle right right' 
    'footer footer footer footer footer footer';
  grid-column-gap: 30px;
} 

.left,
.middle,
.right {
  width:500px;
  height: 250px; 
  box-shadow:0 5px 10px 0 rgba(0,0,0,0.8);
}


.left {
  grid-area: left;
  margin-right: 150px;
  margin-left: 50px;
  background-color:"grey";
}
.right {
  grid-area: right;
  margin-right: 50px;
  margin-left: 150px;

}

@media (max-width: 500px) {
  .grid-container  {
    grid-template-areas: 
      'header header header header header header' 
      'left left left left left left' 
      'middle middle middle middle middle middle' 
      'right right right right right right' 
      'footer footer footer footer footer footer';
  }
}
.smt
{
	width:30%;
	height:30px;
	margin-top:4%;
	background-color:blue;
	color:white;
	float:right;
	margin-right:10%;
	border-radius:5px;
	border:none;
	box-shadow: 0 0px 10px 0 rgba(0,0,0,0.3);
}
.smtl
{
	width:30%;
	height:30px;
	margin-top:4%;
	background-color:yellow;
	color:black;
	float:right;
	margin-right:19%;
	border-radius:5px;
	border:none;
	box-shadow: 0 0px 10px 0 rgba(0,0,0,0.3);
}
</style>
</head>
<p id="cal"></p>

	  <title>AUTOMATED ROVER SERVICE</title>
	  <center>
<div class="grid-container">
<div class="header">
<h4>AREA-1 SLOT STATUS</h4>
<button  onclick="read();"> Check </button>
  </div>
  <div class="left">
  <br><br><br>
  <div  id = "av1" >
  <h4>Slot status</h4>
  </div>

            <form align="center" action="" method="POST">
            <br>
            <button type="button"  class="smtl" onclick="writescancelslot1();">SOURCE CANCEL </button>
            <button class="smt" onclick="writessourceslot1();" >SOURCE BOOK</button>   
            <button type="submit" class="smtl" onclick="writescancelslot1();" >DESTINATION CANCEL</button>
            <button class="smt" onclick="writesdestslot1();">DESTINATION BOOK</button>
            </form></div>
  <div  class="right">
  <br><br><br>
  			<div id ="av2" >
  			<h4>Slot status</h4>
  			</div>
            <form align="center" action="" method="POST">
            <br>
            <button type="submit" onclick="writescancelslot2();" class="smtl" >SOURCE CANCEL</button>
            <button class="smt"onclick="writessourceslot2();" >SOURCE BOOK</button> 
            <button type="submit" class="smtl" onclick="writescancelslot2();" >DESTINATION CANCEL</button>
            <button class="smt" onclick="writesdestslot2();" >DESTINATION BOOK</button>
            </form>
</div>
<br><br><br>
<center>
<div class="fo" style="position:absolute;
			left:50%;
			top:99%;
			transform:translate(-55%,-40%);"><i><b><font color="purple">AUTOMATED ROVER SERVICE</b> |All rights reserved@ ATHULYA KRISHNAN</i></font></center></div>


</body>
</html>
