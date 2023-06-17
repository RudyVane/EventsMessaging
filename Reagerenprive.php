<?php
include('headerprive.php');
		
?>

			</div>	</div>
<div class = "container" style="position: absolute;top:6%;left: 30%; text-align:left;">
<h9>Reactie sturen</h9>




<form action = "" method ="POST">
<br><br><br>
<p>
<?php

$ber = $_SESSION['bericht'];
$send = $_SESSION['sender'];
$mes = "(" . $send . ":" . $ber . ")" . PHP_EOL . $user;

echo "Oorspronkelijk bericht: ". $ber;
?>
<br>
</p>
<textarea name="message" style="height:100px;background: transparent;">

</textarea> 
<br> 
<input type="submit" name="OK" value="versturen" />
</p>


<?php
$t = "";
$token = "";
$user = $_SESSION['user'];
if(isset($_POST['OK'])){
$msg = $mes . ":" . htmlspecialchars($_POST["message"]);	
if (!strlen(trim($_POST['message']))){
	
	echo "er is geen bericht getypt!";
	die;
}

$t = time();
	
$msgcode = base64_encode($msg);
$sql2 =<<<EOF
	   INSERT INTO Prive (`Afzender`, `Aan`, `Bericht`,`Tijd`) 
	   VALUES ('$user', '$send', '$msgcode','$t');
	   
EOF;
	$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   }
 die;
   echo "<script type='text/javascript'> document.location = 'Prive.php'; </script>";
}
	?>
	

</div>
</body>
</html>