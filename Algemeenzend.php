<?php
include('headergeb.php');
		
?>
</div></div>
<div class = "container">
<h9>Bericht verzenden</h9>

<form action = "" method ="POST">

<p>Bericht: 
<br>
<br>
<input type="tekst" name="onderwerp" placeholder="onderwerp" /><br>
<textarea maxlength="500" name="message" style="height:100px;background: transparent;">
</textarea> 
<br> 
<input type="submit" name="OK" value="versturen" />
</p>
<?php
$t = "";
$token = "";
$user = $_SESSION['user'];
if(isset($_POST['OK'])){
$msg = htmlspecialchars($_POST["message"]);
if (!strlen(trim($_POST['message']))){
	
	echo "er is geen bericht getypt!";
	die;
}

$ond = $_POST['onderwerp'];

$t = time();

$msgcode = base64_encode($msg);
$sql2 =<<<EOF
	   INSERT INTO Berichten (`Afzender`, `Onderwerp`, `Bericht`,`Tijd`) 
	   VALUES ('$user','$ond', '$msgcode','$t');
	   
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