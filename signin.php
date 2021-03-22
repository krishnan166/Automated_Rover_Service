<?php
include('dbconnect.php');
$msg="";
$orgpassword="";
if(isset($_POST['signin']))
{
		$username=$_POST['username'];
		$address=$_POST['Address'];
		$place=$_POST['place'];
		$Mobileno=$_POST['Mobileno'];
		$Email=$_POST['Email'];
		$password=$_POST['pwd'];
		$password1=$_POST['pwd1'];
		$RFID_NO="000000000000";
		$Balance="100";
		if($password==$password1)
		{
		$sql="insert into athulya1 values('$username','$address','$place','$Mobileno','$Email','$password','$RFID_NO','$Balance','','','')";
		if(mysqli_query($con_key,$sql))
		{
			$msg="success";
		}
		else
		{
			$msg="failed";
		}
		}
		else
		{
			$msg="Re-enter correct password";
		}
		
}
?>
	<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <head>
	<style>
		.signup
    	{
        width: 100%;
        height: 10%;
        
    	}
		.shead
    	{
        font-family: sans-serif;
        font-size: 30px;
        text-align: center;
		background-color:blue;
		color:white;
        padding-top: 5px;
        padding-bottom:5px; 
    	}
    
		.smt
		{
		width:20%;
		height:30px;
		margin-top:4%;
		background-color:green;
		color:white;
		float:right;
		margin-right:10%;
		border-radius:5px;
		border:none;
		box-shadow: 0 0px 10px 0 rgba(0,0,0,0.3);
		}

    	a
    	{
        color: white;
        text-decoration:none;
		}
    
		.title
		{
		float: left;
		width:60%;
		height:auto;
		padding:10px;
		margin-left:15%;
		margin-top:4%;
		border:none;
		border-radius:5px;
		box-shadow: 0 0px 10px 0 rgba(0,0,0,0.2);
	

		}
    
		.ohead
    	{
        width: 40%;
        height: 30vh;
        border:none;
	    border-radius:5px;
	    box-shadow: 0 0px 10px 0 rgba(0,0,0,0.9);
        padding-left: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
        margin-left: 30%;
        margin-top: 0px;
    	}
	</style>
	  <title>AUTOMATED ROVER SERVICE</title>
	 </head>
	

</head>
<body>
<div class="slideshow-container">
<div class="mySlides fade">
  <img src="16063.jpg" style="width:100%;">  
</div>

<div class="mySlides fade">
  <img src="16064.jpg" style="width:100%;">

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>
		<div class="signup">
        <h5 class="shead">
            SIGN UP  
        </h5>
    </div>
    <div class="ohead"> 	
				<center>
				 <table class="table1">
				  <form align="center" action="" method="POST">
					  <tr><th><input type="text" name="username" placeholder="Username"/></td></tr>
					  </td></tr>
						
        		                  <tr><th><input type="Address" name="Address" placeholder="Address" required />
		     			  </td></tr>  
					  <tr><th><input type="place" name="place" placeholder="place" required />
		     			  </td></tr>  	
					  <tr><th><input type="Mobileno" name="Mobileno" placeholder="Mobile No" required />
		          	          </td></tr>  
					  <tr><th><input type="Email" name="Email" placeholder="Email" required />
                		          </td></tr>
					  </div>
					  <tr><th><input type="password" name="pwd" placeholder="Password" required /> 
					  </td></tr>
					  <tr><th><input type="password" name="pwd1" placeholder="Re-enter Password" required />
				          </td></tr>
					  <button type="submit" class="smt" name="signin" >SIGN UP</button>
					  
					  <tr><th colspan="2"><?php echo $msg; ?></th></tr>
				  
				 <button class="smt" name="login"><a href="index.php">LOGIN</a></button>	
				
				 </form>
				 </table>
	</div>
	
	</center>
	 </body>
    </html>

