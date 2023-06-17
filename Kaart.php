<?php
session_start();
$user = $_SESSION["user"];
include('headergeb.php');

if($user == "") {
		echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
    
?>	
</div>			
<div class = "container">
<h9>Kaart</h9>
<div class = "overlay">
<div id="" style="overflow:scroll; height:800px;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d19102.46446581271!2d6.62342665!3d53.23921694999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1snl!2snl!4v1686997564420!5m2!1snl!2snl" width="900" height="450" style="border:0;position: absolute;left:10%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</body>
</html>
