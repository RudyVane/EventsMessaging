<?php
session_start();
$user = $_SESSION["user"];
include('headerprive.php');
		
?>
</div></div>
<div class = "container">
<h9>Bericht verzenden</h9>

<form action = "" method ="POST">
<br><br><br><br>
<p>Bericht aan:

<select name="send_to" >
  <option selected="selected">Kies een naam</option>
  <?php
	
	$sql6 = "SELECT * FROM Personen ORDER BY `Naam`"; 
	$ret6 = $db->query($sql6);
	if (!$ret6) {
		echo $db->lastErrorMsg();
		}
	$names = [];
	while ($row = $ret6->fetchArray(SQLITE3_ASSOC)) {
    $name = $row['Naam'];
	?>
      <option value="<?= $name ?>"><?= $name ?></option>
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
</form>
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
$aan= $_POST['send_to'];
if ($aan == "Kies een naam"){
	echo "er is geen naam gekozen!";
	die;
}
$t = time();

$msgcode = base64_encode($msg);
   $sql2 =<<<EOF
	   INSERT INTO Prive (`Afzender`, `Aan`, `Bericht`,`Tijd`) 
	   VALUES ('$user','$aan', '$msgcode','$t');
	   
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