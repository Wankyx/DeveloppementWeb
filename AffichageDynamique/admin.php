<?php 

	$username = $_GET['username'];
	$password = $_GET['password'];
	$isAdmin = false;
	if(empty($username) || empty($password))
	{
		header("Location: index.php");	
	}

	try 
	{
		$bdd = new PDO("mysql:host=localhost;dbname=afficheurdynamique;charset=utf8", "root", "");
	}catch(Exception $error)
	{
		die("Impossibe d'acceder a la base de données ". $error->getMessage());
	}

	$request = $bdd->query('SELECT * FROM administration_identifiant');

	while($data = $request->fetch())
	{
		if($username == $data["username"] && $password = $data["password"])
		{
			$isAdmin = true;
			break;
		}
	}

	$request->closeCursor();

	if(!$isAdmin)
	{
		header("Location: index.php");
	}
?>

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
	 				 	<li><a class="menu" href="index.php" title="Se déconnecter" >Se déconnecter</a></li>
					 </ul>
				</nav>
			</div>
		</header>

		<section id="sendmsg">
			<div>
				<form method="post" action="sendmessage.php">

					<ol>
						<li>
							<input type="date" name="date" id="date_post">
						</li>
						<li>
							<textarea placeholder="Votre message:" id="msg" rows="4" maxlenght="254" cols="50" name="message"></textarea>
						</li>

						<li>
							<input type="submit" value="Envoyer">
						</li>
					</ol>
 				</form>
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