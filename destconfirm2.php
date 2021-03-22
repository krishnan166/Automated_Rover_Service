<?php
include('dbconnect.php');
session_start();
$Balance=$_SESSION['var'];
$rfid = $_SESSION['varname'];
$Nam=$_SESSION['va'];
$Slotno=$_SESSION['varna'];
$statusslot=$_SESSION['varnam'];

//echo $Balance;
//echo $rfid;
function update1(){
	
	//	session_start();
		$id=$_SESSION['va'];
		$Station_no=1;
		$Slot_no = 2;
		$Balance=$Balance-5;
		$status = 2;
		if($Balance==0){
			echo "no balance";
		}
		$sql="UPDATE athulya1 set `Balance`=". $Balance ." WHERE `username`='$id'";
		mysqli_query($con_key, $sql);
		
		$sql="UPDATE athulya1 set `Station_No`=". $Station_no ." WHERE `username`='$id'";
		mysqli_query($con_key, $sql);
		$sql="UPDATE athulya1 set `Slot_No`=". $Slot_no ." WHERE `username`='$id'";
		mysqli_query($con_key, $sql);
		$sql="UPDATE athulya1 set `status`=". $status ." WHERE `username`='$id'";
		mysqli_query($con_key, $sql);
		echo "hi";
		
			  }
              
//echo $rfid;
?>
<html>
<body>
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
  background-image:url('A.jpg');
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
  box-shadow:5px 10px 10px 5px rgba(0.8,0.8,0.8,0.8);
}

.middle {
  margin-right: 300px;
  margin-left: 400px;
  margin-top:150px;

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
</style>
<div class="grid-container">
<div class="header">
<div id="av1">
<div class="middle">
		<form>
		<h5>Name    :<input type="button" id="username"  value="<?php echo $Nam; ?>" /></h5>
		<h5>Balance :<input type="button" id="balance"  value="<?php echo $Balance; ?>" /></h5>
		<h5>  RFID    :<input type="button" id="rfid"  value="<?php echo $rfid; ?>" />
		</form>
<h6> Destination booked</h6>
</body>
</html>



