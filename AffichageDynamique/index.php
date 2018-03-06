<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Afficheur Dynamique : Accueil</title>
		<link rel="stylesheet" href="index.css" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
	</head>

	<body>
		<script>
			function connect()
			{
				document.getElementById("modal").style.top = "0px";
			}
			function closemodal()
			{
				document.getElementById("modal").style.top = "-500px";
			}
		</script>

		<div id="modal">
			<h3>Se connecter</h3>

			<div>
				<form method="get" action="admin.php">
					<label for="nom-utilisateur">Identifiant : </label><br>
					<input type="text" id="nom-utilisateur" name="username">
				 	<br>
					<label for="mot-de-passe">Mot de passe : </label><br>
					<input type="text" id="mot-de-passe" name="password">
					<br>
					<input type="submit" value="Se connecter">

				</form>
				<img onclick="closemodal()" src="pictures/close.png" alt="fermer" width="68" height="68">
			</div>
		</div>

		<header>
			<div class="wrapper">
				 <h1>Affichage Dynamique .</h1>
				 <nav>
					 <ul>
					 	<li><a class="menu" href="meteo.php" title="Allez consulter les information météo">Méteo</a></li>
					 	<li><a class="menu" href="information.php" title="Allez consulter les message">Message</a></li>
	 				 	<li><a class="menu" href="#" title="Se connecter" onclick="connect()">Se connecter</a></li>
					 </ul>
				</nav>
			</div>
		</header>

		<section id="animation_pictures">
			<div class="slider">
				<div class="slides">
					<div class="slide"><img class="slide_picture" src="pictures/1.jpg" alt="1"></div>
					<div class="slide"><img class="slide_picture" src="pictures/2.jpg" alt="2"></div>
					<div class="slide"><img class="slide_picture" src="pictures/3.jpg" alt="3"></div>
				</div>
			</div>
		</section>

		<section id="PresentationProjet">
			<div class="wrapper">
				<ol>
					<li>
						<div class="present1">
							<div>
								<h2>Le Projet</h2>
								<p>
									Le projet consiste, a faciliter
									la consultation des événements 
									concernant la vie scolaire .
								</p>
							</div>
						</div>
					</li>
					<li id="p2">
						<div class="present2">
							<div>
								<h2>Participant</h2>
								<p>
									Les pariticpant a se projet sont,
									Samuel Biczo et Hamdoud Jounayd
								</p>
							</div>
						</div>
					</li>
				</ol>
			</div>
		</section>

		<footer>

			<div class="social_network">
				<h4>RÉSEAUX SOCIAUX</h4>
				<ol>
						<li>
							<a target="_blank" href="https://fr-fr.facebook.com/Lycée-Colbert-Tourcoing-officiel-265187623499450/" title="Allez sur ma chaine"><img src="pictures/facebook-flat.png" alt="YOUTUBE"></a>
						</li>
						<li>
							<a target="_blank" href="https://twitter.com/lyceecolbert?ref_src=twsrc%5Etfw&ref_url=http%3A%2F%2Fwww.lyceecolbert-tg.org%2F" title="Allez sur mon twiiter"><img src="pictures/twiiter.png" alt="TWIITER"></a>
						</li>
						<li>
							<a target="_blank" href="http://www.lyceecolbert-tg.org/" title="Allez sur le server discord"><img src="pictures/logo_colbert.png" alt="COLBERT"></a>
						</li>
						<li>
							<a target="_blank" href="https://www.youtube.com/watch?v=dN6-kfaZ84g" title="Vidéo grand lille TV"><img src="pictures/youtube-flat.png" alt="YOUTUBE"></a>
						</li>

				</ol>
			</div>

		</footer>

	</body>
	
</html>