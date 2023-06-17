<?php
class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('Mensa.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      
   }  		
?>
<div style="position: absolute;top:1vw;left: 1vw; ">	
<img src="logo.png" ></div>

</div>
<div class = "container" style="position: absolute;top:6%;left: 25%; text-align:left;">

<h9>Registreren</h9>
<br><br>

<p>wachtwoord moet bestaan uit minimaal 8, maximaal 16 karakters; minimaal 1 hoofdletter, 1 cijfer en 1 teken uit de reeks @#\-_$%^&+=§!\?</p>
<form action = "" method ="POST">
<table style="width:40%">
  <tr>
    <td>Gebruikersnaam</td>
    <td><input type="text" name="user" required/></td>
  </tr>
  <tr>
    <td>Wachtwoord</td>
	<td><input type="password" name="ww" required/></td></tr> 
  <tr>
    <td>Herhaal wachtwoord</td>
	<td><input type="password" name="ww2" required/>
	<input type="submit" name="OK" value="Registreer" />
	</td>
	  </tr>
</table> </p><br><br>
</form>



<?php

if(isset($_POST['OK'])){
$naam = htmlspecialchars($_POST["user"]);
$ww = htmlspecialchars($_POST["ww"]);
$ww2 = htmlspecialchars($_POST["ww2"]);
$user = strtoupper($naam);     

if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,16}$/',$ww)) {
?><p style = "color:red; font-size:16;"><?php
   echo 'Het wachtwoord voldoet niet aan de eisen';die;
}
else
{
if ($ww != $ww2){
?><p style = "color:red; font-size:16;"><?php
	echo "wachtwoorden komen niet overeen, probeer opnieuw";
	die;
}}

// array for JSON response
$response = array();
 

 $sql = "SELECT * FROM Personen"; 
	$ret = $db->query($sql);
	
	$response = array();
	
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
		echo $row["Naam"];
        if($row["Naam"] == $user){
			?>
<p style = "color:red; font-size:16;">
<?php
			echo "Gebruikersnaam bestaat al, kies een andere!";
			die;
		}    
}
$wachtwoord= password_hash($ww, PASSWORD_DEFAULT);
$sql =<<<EOF
		INSERT INTO `Personen` (`Naam`,`Wachtwoord`) 
		VALUES ('$user','$wachtwoord');
EOF;
	
	$ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   }
   echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
?>


