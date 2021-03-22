
<?php
include('dbconnect.php');

?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<p id="demo"></p>
<script type="text/javascript">
	var status;
	var col;
     window.onload=function(){ 
    window.setTimeout("redirect()", 20000);};
    function redirect() {
    document.cartCheckout.submit();
}
            
            
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

		if(str.length>0){
					
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
                               
             document.cookie="rest =1";
       
                        document.getElementById("slot1").value= results[0];
                        document.getElementById("slot2").value= results1[0];
						status=results1[0];
						//document.write(status);
						if (status=="1")
						{
						col = red;
						}
						else
						{
						col = yellow;
						}
						<?php $abc = "<script>document.write(col)</script>"?>		
						
                     //   document.getElementById("rfid").value= results2[0];

			}

		//	$("#se").append(results[0])
                //        $("#se").append(results[1])
		//	$("#se").append('<div class="userphoto"><img src="bot.png"/></div>')

	}
        setInterval("read()",500);

		

		
		
</script>
<?php echo $abc ?>
</head>
<style>
 {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  color:"red";
  background-image:url('img_d1.jpg');
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
 
  width:250px;
  height: 200px; 
  box-shadow:0 5px 10px 0 rgba(0,0,0,1.0);
}


.left {
  grid-area: left;
  margin-right: 150px;
  margin-left: 60px;
  background-color:"grey";
}
.right {
  grid-area: right;
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
<body>

	  <title>AUTOMATED ROVER SERVICE</title>
	  <center>
<div class="grid-container">
  <div class="header">
    <h4>AREA-1 SLOT STATUS</h4>
              <input type="text" name="slot1" id="slot1"/>
            <input type="text" name="slot2" id="slot2"/>
  </div>

  <div class="left">
  <br><br><br>
  <table id="table_id">
			
            <tr><td ><button type="button">Availability Status1</td></tr></table>
            <form align="center" action="" method="POST">
            <br><br>
            <button type="submit" class="smtl" >CANCEL</button>
            <button class="smt" >BOOK</button> 
            </form></div>
  <div class="right">
  <br>
  <br><br>
  <table id="table_id">
            <tr><td bgcolor= "<?php echo $abc ?>"> <font color="white">Availability Status 2</font></td></tr></table>
            <form align="center" action="" method="POST">
            <br><br>
            <button type="submit" class="smtl" >CANCEL</button>
            <button class="smt" >BOOK</button> 
  
            </form>
</div>
<br><br><br>
  <center>
<div class="fo" style="position:absolute;
			left:50%;
			top:99%;
			transform:translate(-55%,-40%);"><i><b><font color="purple">AUTOMATED ROVER SERVICE</b>    |    All rights reserved@ ATHULYA KRISHNAN</i></font></center></div>


</body>
</html>
