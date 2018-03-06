<?php
if(!session_start())
{
	$file = fopen("session.txt", "a+");

	if($file)
		exit;
	$data_content = 'La session n\' pas pus être ouverte ';
	$data_content += date("j/n/Y .");
	fprintf($file, $data_content);
	fclose($file);

	exit;
}
?>
<DOCTYPE html>
<html>
	<head>
		<title>Wankyx - Articles</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css" type="text/css">
	</head>
	<body>
		<header>
			<div class="wrapper">
				<div>
					<h1>Wankyx <span class="point">.</span></h1>
					<p><img src="pictures/logo.jpg" alt="LOGO_WANKYX"></p>
				</div>
			</div>
			<?php
				if(!$_SESSION['adminStatus'])
				{
					echo '		<script src="app.js" type="text/javascript"></script>
	<div id="login-form">
							<h2>Formulaire de connexion</h2>

							<form method="POST" action="admin.php">
								<label for="login">Nom d\'utilisateur</label>
								<input id="login" type="text" placeholder="Nom d\'utilisateur..." name="username" required="required">

								<label for="password">Mot de passe</label>
								<input id="password" type="password" placeholder="Mot de passe..." name="password" required="required">

								<input type="submit" value="Se connecter">
							</form>
							<img src="pictures/close.png" alt="close" onclick="off()">
						</div>';
				}
			?>

			<div class="menu">
				<nav>
						<ul>
							<?php
							if($_SESSION['adminStatus'])
								echo '<li><a href="admin.php" title="Allez vers l\'accueil">Accueil</a></li>';
							else
								echo '<li><a href="index.php" title="Allez vers l\'accueil">Accueil</a></li>';
							?>
							<li><a href="biographie.php" title="Lire ma biographie">Biographie</a></li>
							<li><a href="articles.php" title="Lire mes Articles">Articles</a></li>
							<li><a href="#" title="Allez vers le Forum">Forum</a></li>
							<li><a href="contact.php" title="Me contacter">Contacter</a></li>
							<?php if($_SESSION['adminStatus'])
											echo '<li><a href="#login-form" title="Se déconnecter" >Se déconnecter</a>';
										else
											echo '<li><a href="#login-form" title="Se connecter" onclick="on()">Se connecter</a>';
							?>
						</ul>
					</nav>
			</div>
		</header>

		<div>
			<section class="biographie">
					<h2>qui je suis !</h2>

					<p><em>Comment tu t'appelles ?</em></p>
			</section>
		</div>

    <footer>
			<div class="social_network">
				<h4>RÉSEAUX SOCIAUX</h4>
				<ol>
						<li>
							<a target="_blank" href="https://www.facebook.com/wankyx.dev.3" title="Allez sur ma chaine"><img src="pictures/facebook-flat.png" alt="YOUTUBE"></a>
						</li>
						<li>
							<a target="_blank" href="https://twitter.com/WankyxMuslim" title="Allez sur mon twiiter"><img src="pictures/twiiter.png" alt="TWIITER"></a>
						</li>
						<li>
							<a target="_blank" href="https://discordapp.com/invite/zKP68B" title="Allez sur le server discord"><img src="pictures/discord.png" alt="DISCORD"></a>
						</li>
						<li>
							<a target="_blank" href="https://www.youtube.com/channel/UCznD5UC7i2S8yZf2rbk077Q?view_as=subscriber" title="Allez sur mon YouTube"><img src="pictures/youtube-flat.png" alt="YOUTUBE"></a>
						</li>

				</ol>
			</div>

		</footer>
</html>
