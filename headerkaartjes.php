<?php
session_start();
$user = $_SESSION["user"];
if($user == "") {
		echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
else{
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
date_default_timezone_set("Europe/Amsterdam");
}
?>
<!DOCTYPE html>
<html lang=”nl”>
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<head>
<link rel="apple-touch-icon" href="logo.png">
<link rel="shortcut icon" href="logo.png">
<link rel="icon" type = "image/png" href="logo.png"/>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title>Mensa</title>
<link rel="stylesheet" type="text/css" href="stylessl.css">
<style>
html, body {
	overflow-x: hidden;
}

.mob {
	position: absolute;
	left:40%;
	top:2vw;
}
.overlay {
    position: fixed;
    width:85%;
	margin-top:5%;
	margin-right:5%;
    height: auto;
    left: 20%;
    top: 5vw;
    background: rgba(255,255,255,0.1);
    z-index: 10;
  }
.hamburger {
  display: none;
  cursor: pointer;
}

.hamburger span {
  display: block;
  width: 25px;
  height: 3px;
  margin-bottom: 5px;
  background-color: #333;
}
.menu{
	position: absolute;
	top:12vw;
	left: 1vw;
	text-align:left;
	line-height:0.15;
	font-size:4vw;
	width:100%;
}
.container{
	position: absolute;
	top:5vw;
	left: 40%;
	text-align:left;
	line-height:0.15
	font-size:4vw;
	width:90%;
}

input {
	position: relative;
	font-size:1.5vw;
	border: 1px solid #bebebe;
	width: 25%;
}
input[type=submit] {
  background-color: Orange;
  border: 1px solid #ffffff;
  color: #ffffff;
  border-radius: 10px;
  text-align: center;
  text-decoration: none;
  font-size: 1.25vw;
  cursor: pointer;
  width: 25%;
  
  display: block;
	}
a {
  color: #333;
  width: 100%;
  padding: 1px 1px;
  text-align: center;
  text-decoration: none;
  display: block;
  font-size: 1.5vw;
}

p {
	font-size:1vw;
	color:black;
}
p2 {
	font-size:1vw;
	color:red;
}
p3{
	font-size:0.8vw;
	color:white;
}
h9 {
	font-size:4vw;
	color: Orange;
}

textarea {
	width:500px;
}
@media screen and (max-width: 600px) and (orientation: portrait){
	

.hamburger {
    display: block;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 20;
  }

  .menu {
    display: none;
  }

  .menu.show {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 20;
  }

  .menu.show ul {
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  }

  .menu.show ul li {
    margin-bottom: 10px;
  }	

.overlay {
    position: absolute;
    width:80%;
	margin-right:5%;
    height: auto;
    left: 1%;
    top: 30vw;
    background: rgba(255,255,255,0.1);
    z-index: 10;
  }
.mob {
	position: absolute;
	left:35%;
	margin-top:1vw;
	width:60%;
	text-align:center;
}
p {
	font-size:3vw;
	color:black;
}
p2 {
	font-size:3vw;
	color:red;
}
p3{
	font-size:3vw;
	color:white;
}
h9 {
	font-size:6vw;
	color: Orange;
}
a {
	font-size:2vw;
}

input {
	font-size:14px;
	width: 30%;
	
}
input[type=submit] {
  background-color: Orange;
  border: 1px solid #ffffff;
  color: #ffffff;
  border-radius: 10px;
  text-align: center;
  text-decoration: none;
  font-size: 4vw;
  cursor: pointer;
  width: 40%;
  height:12vw;
  padding: 1px 5px 1px 5px;
  display: inline;
	}
.menu{
	position: absolute;
	top:30vw;
	left: 1vw;
	text-align:left;
	line-height:0.15
	font-size:4vw;
	width:100%;
}

.container{
	position: absolute;
	top:25vw;
	left: 10%;
	text-align:left;
	line-height:0.15;
	font-size:4vw;
	width:90%;
}
textarea {
	width:200px;
}	
}
</style>  

</head>
<body>
<div class="hamburger">
  <span></span>
  <span></span>
  <span></span>
</div>
<script>
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>

<div style="position: absolute;top:1vw;left: 1vw; ">	
<img src="logo.png" ><p>
<?php
$user = $_SESSION["user"];
echo "Ingelogd als: ";
echo $user;
?>
</p></div>
<div class = "menu">
<br>
<form action = "" method ="POST">
		<input type="submit" name="Home" value="Home" /><br>
		<input type="submit" name="Lezen" value="Lezen" /><br>
		<input type="submit" name="Zenden" value="Bericht sturen" /><br>
	
</form>
<script>
const hamburger = document.querySelector('.hamburger');
  const menu = document.querySelector('.menu');
  hamburger.addEventListener("click", () => {
    menu.classList.toggle('show');
  });
</script>
<?php
if(isset($_POST['Home'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'Algemeen.php'; </script>";
}
if(isset($_POST['Lezen'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'Kaartjes.php'; </script>";
}
if(isset($_POST['Zenden'])){
	$_SESSION['user'] = $user;
	echo "<script type='text/javascript'> document.location = 'Kaartjeszend.php'; </script>";
}
?>	

	
				
				