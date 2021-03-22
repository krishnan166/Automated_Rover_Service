<?php
include('dbconnect.php');

?>


<html>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<style>
body
{
background-color: lightblue;
}
.logoutLblPos
{
position:fixed;
right:10px;
top:40px;
width:15px;
left:1200px;
}
.column 
{
float: left;
width: 45%;
padding: 15px;
}
.row::after
{
content: "";
clear: both;
display: table;
}
.ul
{
float: right;
margin-right: 50px;	

}
.ul li
{
display: inline-block;
padding: 10px;
margin-top: 12px;
cursor: pointer;
font-family:sans-serif;
color: white;
}
</style>
<head>
	<title>AUTOMATED ROVER SERVICE</title>	  
	 </head>
	 <body>
	 <form align="right" name="form1" method="post" action="index.php">
	 <label class="logoutLblPos">
	 <input name="submit2" type="submit" id="submit2" value="LOG OUT">
	 </label>
	 </form>
	  <center>
		 <h1>
		     		<font color="#00000066"><br><br> AUTOMATED ROVER SERVICE </font>
		</h1>

<marquee>
<h3>
***SWITCH TO CYCLES........SAVE FUEL.......SAVE ENVIRONMENT***
</h3>
</marquee>
<div class="row">
<div class="column">					
  <a href="area1.php">
  <img src="abc.jpg" alt="AREA 1" height="480px" width="640px">
	<h3>STATION-1</h3>
</div>
</a>
<div class="column">
<a href="area2.php">
  <img src="b.jpg" alt="AREA 2" height="480px" width="640px">
	<h3><right> STATION-2 </right></h3>
</a>
</div>
</div>
<center>
<div class="fo"><i><b></br>AUTOMATED ROVER SERVICE</b>    |    All rights reserved@ ATHULYA KRISHNAN </i> </div>
	 </body>
    </html>

</center>

</body>
</html>