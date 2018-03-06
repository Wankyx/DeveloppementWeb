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
		<script src="app.js" type="text/javascript"></script>
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
					echo '
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

			<?php

			if($_SESSION['adminStatus'])
			{
				echo '
				  <section id="art" class="articles-upluad">
					<img onclick="upluadClose()" src="pictures/close_red.png" alt="close" style="float: right; padding:2px;" width="32" height="32">
					<form method="post" action="upluad.php">

					<label id="title">Titre de l\'article</label>
					<input required style="margin-left: 17px;" for="title" type="text" placeholder="Le titre de l\'article" name="title"><br>
					<label id="date">Date de parution</label>
					<input for="date" type="text" placeholder="jj/mm/aaaa" name="date" required>
					<br>
					<label id="descriptor">Description</label>&nbsp&nbsp
					<input for="descriptor" type="text" placeholder="Description" name="description" required>
					<br>
					<label id="url-img">Image</label>
					<input for="url-img" type="text" placeholder="URL ou REPERTOIRE" size="80px" name="img" required>


					<textarea rows="4" cols="30" placeholder="Votre texte" name="contents" required></textarea>

					<input type="submit" value="Envoyer" id="articles-id">
					</form>

				</section>';
			}

			?>>

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
							<?php
							if($_SESSION['adminStatus'])
								echo '<li><a href="#art" title="Upluad un articles" onclick="upluad()">Nouvelle Articles</a></li>';
							?>
 							<li><a href="#" title="Allez vers le Forum">Forum</a></li>
							<li><a href="contact.php" title="Me contacter">Contacter</a></li>
							<?php if($_SESSION['adminStatus'])
										{
											echo '<li><a href="index.php" title="Se déconnecter" >Se déconnecter</a>';
										}
										else
											echo '<li><a href="#login-form" title="Se connecter" onclick="on()">Se connecter</a>';
							?>
						</ul>
					</nav>
			</div>
		</header>

		<section class="articles">

			<?php
			try
			{
				$pdoSQL = new PDO('mysql:host=localhost;dbname=wankyx;charset=utf8', 'root', '');
			}catch(Exception $error)
			{
				die("Error SQL PDO : " . $err->getMessage());
		    exit;
			}

			$pdoQuery = $pdoSQL->query('SELECT * FROM articles ORDER BY id DESC');
			$i = 0;
			while($data = $pdoQuery->fetch())
			{
				echo '<article>';
				echo '<h2>'. $data['title'] .'</h2>';
				echo '<p><span>' . $data['date'] .'</span></p>';
				echo '<figure> <img src="'.$data['picture'].'" alt="Image_vitire">
						<figcaption>'. $data['description'] .'</figcaption>';
				echo '<br>';
				echo '<a class="read" href="articles.php?id='. $data['id'].'">LIRE</a>';
				echo '</article>';
 				echo '<hr>';
				$i++;
				if($i == 4)
				{
					break;
				}
			}
			$pdoQuery->closeCursor();
			?>


		<aside style="position: absolute;top:100px;"  class="articles-aside">
				<h2>Les Articles</h2>
				<div>
					<ul class="articles-list">
						<?php

						$pdoQuery = $pdoSQL->query('SELECT id, title FROM articles ORDER BY  id DESC');

						while($data = $pdoQuery->fetch())
						{
							echo '<li> <a href="articles.php?id='. $data['id'] .'">'. $data['title'] .'</a></li>';
						}
						$pdoQuery->closeCursor();
						?>
					</ul>
					<div>
		</aside>
		</section>





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
