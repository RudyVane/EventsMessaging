<?php
include('headergeb.php');
		
?>

			</div>	</div>
<div class = "container">
<h9>Reactie sturen</h9>

<form action = "" method ="POST">

<?php

$ber = $_SESSION['bericht'];
$send = $_SESSION['sender'];
$ond = $_SESSION['onderwerp'];
if (strpos($ond, 'RE:') !== false) {
$onderwerp = $ond;
$mes = $ber . PHP_EOL . $user;

}
else{
$onderwerp = "RE: " . $ond;	
$mes = "(" . $send . ":" . $ber . ")" . PHP_EOL . $user;

}
echo "Oorspronkelijk bericht: ". $ber;
?>
<br>
<input type="tekst" name="onderwerp" value="<?php echo $onderwerp ?>" /><br>
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
	   INSERT INTO Berichten (`Afzender`, `Onderwerp`, `Bericht`,`Tijd`) 
	   VALUES ('$user', '$onderwerp', '$msgcode','$t');
	   
EOF;
	$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   }
 
   echo "<script type='text/javascript'> document.location = 'Algemeen.php'; </script>";
}
	?>
	

</div>
</body>
</html>