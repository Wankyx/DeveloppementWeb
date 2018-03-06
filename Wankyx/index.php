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
else
{
	$_SESSION['adminStatus'] = false;
}
?>

<?php
function generate_wallpaper($nb_header)
{
	return rand(0, $nb_header);
}
function generate($number)
{
	echo '
	<div id="present">
		<section id="wallpaper'. $number . '">
		</section>
	</div>';
}
?>
<DOCTYPE html>
<html>
	<head>
		<title>Wankyx - Programming</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css" type="text/css">
	</head>
	<body>
		<script src="app.js" type="text/javascript"></script>
		<header>
			<div class="wrapper">
				<div>
					<h1>Wankyx <span class="point">.</span></h1>
					<p><img src="pictures/logo.jpg" alt="LOGO_WANKYX"></p>
				</div>
			</div>
			<div id="login-form">
				<h2>Formulaire de connexion</h2>

				<form method="POST" action="admin.php">
					<label for="login">Nom d'utilisateur</label>
					<input id="login" type="text" placeholder="Nom d'utilisateur..." name="username" required="required">

					<label for="password">Mot de passe</label>
					<input id="password" type="password" placeholder="Mot de passe..." name="password" required="required">

					<input type="submit" value="Se connecter">
				</form>
				<img src="pictures/close.png" alt="close" onclick="off()">
			</div>


			<div class="menu">
				<nav>
						<ul>
							<li><a href="index.php" title="Allez vers l'accueil">Accueil</a></li>
							<li><a href="biographie.php" title="Lire ma biographie">Biographie</a></li>
							<li><a href="articles.php" title="Lire mes Articles">Articles</a></li>
							<li><a href="#" title="Allez vers le Forum">Forum</a></li>
							<li><a href="contact.php" title="Me contacter">Contacter</a></li>
							<li><a href="#login-form" title="Se connecter" onclick="on()">Se connecter</a>
						</ul>
					</nav>
			</div>
		</header>

		<?php generate(generate_wallpaper(1))?>
		<!--<div id="present">
			<section id="wallpaper">
			</section>
		</div>-->

		<section id="content">

				<ol>
					<li>
						<div class="linux">
							<div>
								<h2>Gnu/Linux</h2>

								<p>
 									Vous êtes passionnez du système d'exploitation Gnu/linux,
 									vous voulez lire des articles, tutoriel sur cette OS .
 									<br>
 									Alors tu est dans le bonne endroits !
 								</p>

							</div>
						</div>
					</li>

					<li>
						<div class="programming">
							<div>
								<h2>Programmation en C</h2>

								<p>
									Vous aimez la programmation en langage C, alors ici,
									tu trouvera des tutoriel, sur ce langage .<br>

									Programmation système, réseaux, SDL, algorithmie .
								</p>
							</div>
						</div>
					</li>
				</ol>

		</section>


		<section id="menu">
			<div>
				<h3>Le forum</h3>

				<ol>
					<li>
						<img src="pictures/forum.png" alt="FORUM">
					</li>
					<li>
						<img src="pictures/talk.png" alt="TALK">
					</li>
					<li>
						<img src="pictures/user.png" alt="TALK">

					</li>
				</ol>

				<p>

					<em>
						Le forum est un endroits ou les membres du site, pourrons discuter
						sur plusieur sujet .

						Alors venez, discuter, avec nous sur le forum, a propos de l'informatique,

						sécurité informatique, programmation informatique, graphisme, ou
						bien discuter de vos passions ou tout simplement rigoler entre nous .
					</em>


				</p>

				<h3>Les articles</h3>

				<ol>
					<li>
						<img src="pictures/write.jpg" alt="FORUM">
					</li>
					<li>
						<img src="pictures/Pensils.png" alt="TALK">
					</li>
					<li>
						<img src="pictures/hacker.jpg" alt="TALK">

					</li>
				</ol>

				<p>

					<em>
						Les articles, seront écrit par moi-même, il peuvent, y contenir
						plusieurs sujet,  tel que la veille technologique, sur les langages
						de programmation, ou bien de sécurité informatique <br>

						C'est articles seront écrit par un amateur donc pas de prétention
						a vouloir faire un travaille de journaliste, spécialiste .<br>

						Donc il se peut qu'il s'y trouve des erreur .
					</em>


				</p>

				<h3>Nous contacter</h3>

				<ol>
					<li>
						<img src="pictures/contact.ico" alt="FORUM">
					</li>
					<li>
						<img src="pictures/report.png" alt="TALK">
					</li>
					<li>
						<img src="pictures/computer.png" alt="TALK">

					</li>
				</ol>

				<p>

					<em>
						Vous pouvez nou contacter, a fin de nous envoyez un mail.
						Pour répondre, a vos question ou vous aidez sur certain sujet, <br>
						ou tout simplement nous signalez une erreur dans les articles ou
						denoncez un membre sur le forum qui n'aurez pas respecter les régle
						de bien séance.
					</em>

				</p>

			</div>
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

	</body>
</html>
