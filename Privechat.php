<?php
session_start();
$user = $_SESSION["user"];
include('headergeb.php');
		
?>
</div></div>
<div class = "container" style="position: absolute;top:6%;left: 25%; text-align:left;">
<h9>Bericht verzenden</h9>

<form action = "" method ="POST">
<br><br><br><br>
<p>Bericht aan:

<select name="send_to" >
  <option selected="selected">Kies een naam</option>
  <?php
	$i=0;
	$sql6 = "SELECT * FROM Personen ORDER BY `Naam`"; 
	$ret6 = $db->query($sql6);
	if(!$ret) {
      echo $db->lastErrorMsg();
   }
	while($row = $ret6->fetchArray(SQLITE3_ASSOC) ){
		$name = $row['Naam'];		
	?>
      <option value="<?= $i ?>"><?= $name ?></option>
  <?php
    }
	?> 
</select> 
<br>
<br>
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
$z = $_POST['send_to'];
if ($z == "Kies een naam"){
	$z = 1;
}

	$i=0;
   	$name = $x["tekst"][$z-1];

$t = time();

$msgcode = base64_encode($msg);
   $sql2 =<<<EOF
	   INSERT INTO Prive (`Afzender`, `Aan`, `Bericht`,`Tijd`,`Status`) 
	   VALUES ('$user','$name', '$msgcode','$t');
	   
EOF;
	$ret2 = $db->exec($sql2);
   if(!$ret2) {
      echo $db->lastErrorMsg();
   }
   header('Location: Prive.php');
   
}
	?>
	

</div>
</body>
</html>