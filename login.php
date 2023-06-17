<?php
// Start the session
session_start();

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Mensa</title>
<link rel="apple-touch-icon" href="logo.png">
<link rel="shortcut icon" href="logo.png">
<link rel="stylesheet" type="text/css" href="stylessl.css">
<style>

button {
  background-color: #88CFBE;
  border:1px solid #88CFBE;
  border-radius: 10px;
  color: black;
  padding: 5px 5px;
  text-align: center;
  font-size: 20px;
  cursor: pointer;
  height:auto;
  width: 25%;
}	
input[type=submit] {
  background-color: Orange;
  border: 1px solid #ffffff;
  color: #ffffff;
  border-radius: 10px;
  text-align: center;
  text-decoration: none;
  font-size: 1.5vw;
  cursor: pointer;
  width: 100%;
  
  display: block;
	}
.button {
  background-color: Orange;
  border: none;
  color: #333;
  width: 500px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:500px;
}
input {
	font-size:14px;
	border: 1px solid #bebebe;
}	
a {
	color: Orange;
}
h9 {
	color: Orange;
}
@media screen and (max-width: 600px) {
p {
	font-size:4vw;
}
h9 {
	font-size:6vw;
}
a {
	font-size:2.5vw;
}
td {
	font-size:4vw;
}
input {
	font-size:8px;
	border: 1px solid Orange;
}
	.btn-group .button {
  background-color: white;
  border: 1px solid Orange;
  color: #333;
  
  text-align: left;
  text-decoration: none;
  font-size: 3vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
.btn-mail .button{
  background-color: Orange;
  border: none;
  color: #333;
  width: 200px;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 12px;
}
textarea {
	width:200px;
}	
}
</style>  
</head>
<body>

<div style="position: absolute;top:1vw;left: 1vw; ">	
<img src="logo.png" ></div>
</div>

<div class = "container" style="position: absolute;top:30%;left: 2%; text-align:left;">
</div></div>

<div class = "container" style="position: absolute;top:6%;left: 25%; width:70%; text-align:left;">

<h9>Welkom bij de Mensa WebApp</h9>

<p>Hier kun je inloggen voor het gebruik van de app.</p>

<br>

<br>

<form action = "" method ="POST">
 <table style="width:25%"><p>
  <tr>
    <td>Gebruikersnaam</td>
    <td><input type="text" name="user" size="10" required/></td>
  </tr>
  <tr>
    <td>Wachtwoord</td>
    <td><input type="password" name="psw" size="10" required/></td></tr>
	<tr><td><br>
	<input type="submit" name="Start" value="Login" />
	</td>
	  </tr>
  </table> </p>
</form>

<form action = "" method ="POST">
<p>Nog niet geregistreerd? Klik hier voor registreren</p>
<input type="submit" name="Reg" value="Registreren" /><br>
</form>
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
if(isset($_POST['Reg'])){
echo "<script type='text/javascript'> document.location = 'user.php'; </script>";
}	
if(isset($_POST['Start'])){
$naam = htmlspecialchars($_POST["user"]);
$psw = htmlspecialchars($_POST["psw"]);
$user = strtoupper($naam);
$_SESSION["user"] = $user;
$response = array();
 

 $sql = "SELECT * FROM Personen WHERE Naam='$user'"; 
	$ret = $db->query($sql);
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
			
			if (password_verify($psw, $row["Wachtwoord"])){ 
  //Password OK
 $_SESSION["user"] = $user;
	echo "<script type='text/javascript'> document.location = 'Algemeen.php'; </script>";
}
else{
?>	<p style = "color:red; font-size:16;"><?php
  echo "Wachtwoord is ongeldig!";
					die;
	}
}
?>	<p style = "color:red; font-size:16;"><?php
			echo "Deze gebruikersnaam bestaat niet!";
			die;
				

}


	




?>