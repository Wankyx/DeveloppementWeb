
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Afficheur Dynamique : Accueil</title>
		<link rel="stylesheet" href="index.css" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> 
	</head>
	<body>
		<header>
			<div class="wrapper">
				 <h1>Affichage Dynamique .</h1>
				 <nav>
					 <ul>
					 	<li><a class="menu" href="meteo.php" title="Allez consulter les information météo">Méteo</a></li>
					 	<li><a class="menu" href="information.php" title="Allez consulter les message">Message</a></li>
	 				 	<li><a class="menu" href="index.php" title="Se déconnecter" >Accueil</a></li>
					 </ul>
				</nav>
			</div>
		</header>

 		<section id="message">
 			<h2>LES MESSAGE DE LA VIE SCOLAIRE</h2>
 			<div>

			 	 <?php 
			 	 	try 
			 	 	{
			 	 		$bdd = new PDO("mysql:host=localhost;dbname=afficheurdynamique;charset=utf8", "root", "");
			 	 	}catch(Exception $error)
			 	 	{
						die("Impossibe d'acceder a la base de données ". $error->getMessage());
			 	 	}

			 	 	$request = $bdd->query("SELECT * FROM message ORDER BY ID DESC");

			 	 	while($data = $request->fetch())
			 	 	{
			 	 		echo '<p> <em style="color:red;text-decoration:italic;">', $data["date"], "</em> : ", $data["message"], "</p>"; 
			 	 	}

			 	 	$request->closeCursor();
			 	 ?>
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
</html