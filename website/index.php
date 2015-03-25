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
	function display($planetes) {
		foreach ($planetes as $key => $value) {
			echo "<div class=\"planet\">" . article($value) . "</div>";

		}
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
</head>
<body>
	<header>
		<div class="header">
			<img src="images/logo.jpg">
			<h1>Sauver Guanai</h1>
		</div>
	</header>

	<nav>
		
	</nav>

	<div class="content">
	<?php
	echo display($planete);
	?>
	</div>

	<footer>
		
	</footer>
	
</body>
</html>