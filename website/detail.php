<?php

function displayArticle($planete) {
	echo "<div class=\"content\">";
	foreach ($planete as $key => $value) {
		echo "<div class=\"planet\">" . article($value) . "</div>";

	}
	echo "</div>";

}

function attribut_exists($attribut, $objet) 
{	
	$array = (array) $objet;
	return array_key_exists($attribut, $array);
}
$planete = json_decode(file_get_contents('solarsystem.json'));
if (!isset($_GET['planete'])) {
	header('location: index.php');
}
if(attribut_exists(strtolower($_GET['planete']), $planete)) {
	$planete = $planete->{strtolower($_GET['planete'])};
} else {
	header('location: index.php?error=404');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Système solaire</title>
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

<section id="main">
	 	<article class="mainArticle">
				<h2><?php echo $planete->name;?></h2>
				<img src="<?php echo $planete->image;?>">
				<ul>
					<li>Rayon : <?php echo $planete->size;?></li>
					<li>Distance : <?php echo $planete->distance;?></li>
				</ul>
			</article>
 	</section>
	
		<footer>
		<p>Vous êtes ici !</p>
		<div id="map" style="width:80%;height:100px;"></div>
	</footer>

</body>
</html>