<?php
session_start();
$user = $_SESSION["user"];
include('headerprive.php');

if($user == "") {
		echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
    
?>	
</div>			
<div class = "container">
<h9>Berichten</h9>
<div class = "overlay">
<div id="" style="overflow:scroll; height:800px;">
<form method="POST" action="">
	
	
<?php
$sql = "SELECT * FROM `Prive` WHERE `Aan` = '$user' ORDER BY `ID` DESC";
	$ret = $db->query($sql);	
	$send = array(); 	
	$ids = array();
	$ber = array();
	$response["tekst"] = array();
	$response["tel"] = array();
	$id["text"] = array();
	$text["text"] = array();
	$bericht["text"] = array();
	$message["text"] = array();
	$tijd["text"] = array();
	$sender["text"] = array();
	$new["text"] = array();
	$teller["text"] = array();
	$tel=0;
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
        // temp user array
        
        $message["text"] = $row["Bericht"];
		$tijd["text"] = $row["Tijd"];
		$sender["text"] = $row["Afzender"];			
		$id["text"] = $row["ID"];
		$num=$id["text"];
				
		array_push($nummer["tekst"], $id["text"]);
		array_push($ids, $id["text"]);			
		
		$msgdecode = base64_decode($message["text"]);
        $bericht["text"] = str_replace("\\n","\n", $msgdecode); 
        array_push($ber,$bericht["text"]);
        array_push($send,$sender["text"]);
		$send1 = $sender["text"];
  
	
  ?>
  <div style="position: relative;top:1%;left: 5%; width:70%; height:200px; text-align:left; ">  
  <div style="position: absolute;top:1%;left: 25%; width:100%; text-align:left;"> 
  <div style = "text-align:center; line-height: 100%; border-top-left-radius: 25px; border-top-right-radius: 25px; background-color:Orange;">
  <p3>Van:<?php echo $send1 ?><br>
  <?php echo date('d-m-Y_H:i', $tijd["text"]) ?><br>
  </div>
  <textarea name="message"  style="height:100px; width: 100%; border:1px solid Orange; text-align:center; padding:10px; color:black; border-bottom-right-radius: 25px;border-bottom-left-radius: 25px; background: white;" readonly ><?php echo $bericht["text"] ?></textarea> 
  <input type="submit" name="<?php echo "rea" . $tel ?>" style = "width:60%; left: 0%; border-radius: 25px;" value ="Reageren">
  </div></div>
  <br><br>
  <div>
  <?php 		
		$tel++;	
	}
  

for ($i=0; $i <= $tel; $i++){
	$rea = "rea" . $i;
if (isset($_POST["$rea"])) {
	$_SESSION['sender'] = $send[$i];
	$_SESSION['bericht'] = $ber[$i];
	echo "<script type='text/javascript'> document.location = 'Reagerenprive.php'; </script>";
}
}
?>

</form>

</body>
</html>