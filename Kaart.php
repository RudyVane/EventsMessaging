<?php
session_start();
$user = $_SESSION["user"];
include('headerprive.php');

if($user == "") {
		echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kaart van Groningen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
</div>			
<div class = "container">
<h9>Kaart van Groningen</h9>
<div class = "overlay">
    <div id="map"></div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Coördinaten van Groningen
        var latitude = 53.219383;
        var longitude = 6.566502;

        // Kaart object aanmaken
        var map = L.map('map').setView([latitude, longitude], 13);

        // Kaarttegel toevoegen (bijv. OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Markering toevoegen op de locatie
        L.marker([latitude, longitude]).addTo(map);
    </script>
</body>
</html>
