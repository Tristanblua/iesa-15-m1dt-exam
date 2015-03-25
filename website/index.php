<?php
function article($planete) {

	return 
	"<article>
	<img src=\"".$planete->image."\" alt=\"".$planete->name."\">
	<h2>". $planete->name."</h2>
	<ul>
		<li>Rayon : ".$planete->size."</li>
		<li>Distance du soleil : ".$planete->distance."</li>
		<li>Description : ".$planete->description."</li>
	</ul>
	</article>";
}

function nav($planete) {
	return "<li><a href=\"detail.php?planete=" . strtolower($planete->name) . "\">".$planete->name."</a></li>";
}

function displayArticle($planetes) {
	echo "<div class=\"content\">";
	foreach ($planetes as $key => $value) {
		echo "<div class=\"planet\">" . article($value) . "</div>";

	}
	echo "</div>";
}

function displayNav($planetes) {
	echo "<ul>";
	foreach ($planetes as $key => $value) {
		echo nav($value);
	}
	echo "</ul>";
}
$planete = json_decode(file_get_contents('solarsystem.json'));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=640">
	<title>Sauver Guanai</title>
	<link rel="stylesheet" href="desktop.css">
	<link rel="stylesheet" href="mobile.css">
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
	<script>

	if (navigator.geolocation) {
		
		navigator.geolocation.getCurrentPosition( function(req) {
			var centerpos = new google.maps.LatLng(req.coords.latitude, req.coords.longitude);
			var optionsGmaps = {
				center: centerpos,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoom: 15
			};
			
			var map = new google.maps.Map(document.getElementById("map"), optionsGmaps);

			marker = new google.maps.Marker({
				position: centerpos,
				map: map,
				title:"Vous êtes ici"
				
			});

		}, function (error) {
			var info = "Erreur lors de la géolocalisation : ";
			switch(error.code) {
				case error.TIMEOUT:
					info += "Timeout !";
				break;
				case error.PERMISSION_DENIED:
					info += "vous n'avez pas donné la permission";
				break;
				case error.POSITION_UNAVAILABLE:
					info += "La position n'a pas pu être déterminée";
				break;
				case error.UNKNOWN_ERROR:
					info += "Erreur inconnue";
				break;
			} alert(info);
		});

		

	} else {
		alert ('Votre navigateur ne prend pas en compte la geolocalisaiton html5');
	}
	</script>
</head>
<body>
	<header>
		<div class="header">
			<a href="index.php"><img src="images/logo.jpg"></a>
			<h1>Sauver Guanai</h1>
		</div>
	</header>
	
	<nav>
	<?php

		echo displayNav($planete);
	?>
	<!-- <form action="post.php" method="post">
		<input type="text" name="name">
		<input type="submit" value="send">
	</form> -->

	</nav>

	<?php
	echo displayArticle($planete);
	?>

	<footer>
		<p>Vous êtes ici !</p>
		<div id="map" style="width:80%;height:100px;"></div>
	</footer>
	
</body>
</html>