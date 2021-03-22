<?php
include('dbconnect.php');
$msg="";
$orgpassword="";
$orgusertype="";
if(isset($_POST['login']))
{
	$f=true;
	$i=0;
	$username=$_POST['username'];
	$password=$_POST['pwd'];
	if($username=='' and $password == '')
	{
	    echo "Error";
	    exit();
	}
	$sql="select `password` from athulya1 where `username`='$username'";
	$result=mysqli_query($con_key,$sql);
	while($row=mysqli_fetch_array($result))
	{
	$orgpassword=$row['password'];
	}
	if($orgpassword==$password)
	{ 
	$abc="select `RFID_NO` from athulya1 where `username`='$username'";
	$qwerty="select `Balance` from athulya1 where `username`='$username'";
	$asdf="select `Station_No` from athulya1 where `username`='$username'";
	$xyz="select `Slot_No` from athulya1 where `username`='$username'";
	$mno="select `status` from athulya1 where `username`='$username'";
	$res=mysqli_query($con_key,$abc);
	$q=mysqli_query($con_key,$qwerty);
	$sat=mysqli_query($con_key,$asdf);
	$bat=mysqli_query($con_key,$xyz);
	$hat=mysqli_query($con_key,$mno);
	while($id=mysqli_fetch_array($res))
	{
	$rfid=$id['RFID_NO'];
	}
	while($id=mysqli_fetch_array($q))
	{
		$balance=$id['Balance'];
	}
	while($id=mysqli_fetch_array($sat))
	{
		$station_no=$id['Station_No'];
	}
	while($id=mysqli_fetch_array($bat))
	{
		$slot_no=$id['Slot_No'];
	}
	while($id=mysqli_fetch_array($hat))
	{
		$statusofslot=$id['status'];
	}
	session_start();
	$_SESSION['varname'] = $rfid;	
	$_SESSION['var'] = $balance;
	$_SESSION['varn'] = $station_no;
	$_SESSION['varna'] = $slot_no;
	$_SESSION['varnam'] = $statusofslot;
	$_SESSION['va'] = $username;
	?>	
		<script type="text/javascript">
		window.location='home.php';
		</script>
	
	<?php
	echo "success";
	}
	else
	{
		$msg="incorrect username or password ";
	}
}
?>
		
	<html>
	
	 <head>
	     <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
         <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
         <meta name="HandheldFriendly" content="true">
	  <title>	AUTOMATED ROVER SERVICE		</title>
	 
	 <style>
	 *{
		margin:0;
		padding:0;
		outline:none;
	  }
	 @media only screen and (min-device-width: 400px) {
        body {
            background-image: url('img_a.jpg');
            }
        }

	body
    {   font-size:100%;
    	background-image:url('img_a.jpg');
    	width:100%;
    	height:auto;
		background-size: cover;
        background-repeat: no-repeat;
    }
	.header
{
	font-size: 25px;
	color: white;
	padding-left: 25px;
	padding-top: 20px;
	float: left;
	font-family: sans-serif;
	width:100%;
	height:auto;
}
ul
{
	float: right;
	margin-right: 50px;	

}
ul li
{
	display: inline-block;
	padding: 10px;
	margin-top: 12px;
	cursor: pointer;
	font-family:sans-serif;
    color: white;
}
 
.psubp
{
	width:20%;
	height:15%;
	margin-left:37%;
	margin-top:18%;
	border-radius:8px;
	box-shadow: 0 0px 20px 10px rgba(0,0,0,0.7);
	float:left;
	padding-bottom:4%;	
}
.title
{
	width:70%;
	height:auto;
	padding:10px;
	margin-left:8%;
	margin-top:6%;
	border:none;
	border-radius:5px;
	box-shadow: 0 0px 10px 0 rgba(0,0,0,0.2);
   

}
.content
{
	width:70%;
	height:50px;
	margin-top:4%;
	padding:10px;
	margin-left:8%;
	resize:none;
	border-radius:5px;
	box-shadow: 0 0px 10px 0 rgba(0,0,0,0.1);
	border:none;
}
.smt
{
	width:20%;
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
	width:20%;
	height:30px;
	margin-top:4%;
	background-color:green;
	color:white;
	float:right;
	margin-right:7%;
	border-radius:5px;
	border:none;
	box-shadow: 0 0px 10px 0 rgba(0,0,0,0.3);
}
	a
    {
        color: white;
        text-decoration:none;
    }
	.feed
    {
        width: 100%;
        height: 60vh;;
        background-color: skyblue;
    }
	.bottum
    {
        height: auto;
        width:100%;
		box-shadow:0 0px 10px 0 rgba(0,0,0,0.3);
      background-color: darkred;
    }
   
</style>
<body>
	
	<ul>
		
		<li onclick="window.location.href='#btm'">ABOUT US</li>
		<li onclick="window.location.href='#btm'">CONTACT</li>
		<li onclick="window.location.href='email_index.php'">SIGNUP</li>
		
	</ul>
		
		<h5 class="header"></h5>
		<div class="psubp">
        
        <form align="center" action="" method="POST">
            
            <input type="text" name="username" placeholder="Username" class="title" />
            <input type="password" name="pwd" placeholder="Password" class="title" />
             <button class="smt" ><a href="email_index.php">Signup</a></button>
                        
            <button type="submit" class="smtl" name="login" >Login</button>
            
        </form>
		</div>
		
	  	<center>
		 <h1>
			<font color="white" class="head" style="position:absolute;
			left:50%;
			top:10%;
			transform:translate(-55%,-40%);"> AUTOMATED ROVER SERVICE</font>
				</h1><br><br>
		<div class="bottum" id="btm" style="position:absolute;
				left:55%;
	  			top:150%;
	  			transform:translate(-55%,-40%);">
			<font color="white">
    
        	<div class="about">

           		<h2 class="bhead">About us </h2>

                <p>We provide cycle rental service.</p><p> No tension, no queue and no waiting.</p>
                <p>The customers can contact us 24*7 with the helpline number</p>

            </div>

			<br>
			<h2 class="bhead">Contact us</h2>
			
			<h5 class="contactus">Headquarters:GOVINDPURI,KALKAJI, NEW DELHI<br>Contact num:9495092502
			<br>Email id:automatedrover166@gmail.com</h5>
			<font color:"white">	<i>AUTOMATED ROVER SERVICE</b>    |    All rights reserved@ ATHULYA KRISHNAN</i></font>
			</div>
			 
		</div>

	  </head>
	 </body>
    </html>
