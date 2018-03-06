<?php
include 'bbcode.php';

try
{
  $pdoSQL = new PDO('mysql:host=localhost;dbname=wankyx;charset=utf8', 'root', '');
}catch(Exception $error)
{
  die('PDO error : ' . $error->getMessage());
}

foreach ($_POST as $i => $value) {
    if(empty($_POST[$i]))
    {
      header('Location: articles.php');
    }
}

$articles_title = htmlspecialchars($_POST['title']);
$articles_date = htmlspecialchars($_POST['date']);
$articles_description = htmlspecialchars($_POST['description']);
$articles_img = htmlspecialchars($_POST['img']);
$articles_contents = htmlspecialchars($_POST['contents']);

$request = $pdoSQL->prepare('INSERT INTO articles(title, description, date, contents, picture) VALUES(?, ?, ?, ?, ?)');

$request->execute(array($articles_title, $articles_description, $articles_date, $articles_contents, $articles_img));

// Structure de répertoire désirée
$title = preg_replace('/\s+/', '-', $articles_title);


 
$structure = './articles/'. $title;
$structure = str_replace(' ', '-', $structure);

// Pour créer une stucture imbriquée, le paramètre $recursive
// doit être spécifié.

if (!mkdir($structure, 0777, true)) {
    die('Echec lors de la création des répertoires...');
    exit;
}

$file = fopen( $structure.'/'.$title.'.php', "w+");

if($file == NULL)
{
	die("Echec lors de la création du fichier...");
	exit;
}

fwrite($file, '<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Wankyx Article: '. $articles_title .'</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <h1>'. $articles_title .'</h1>');

fwrite($file, bbcode_to_html($articles_contents));
fwrite($file, '</body></html>');

fclose($file);


/************************************************************/
 
 
$file = fopen($structure.'/style.css', "w+");

if($file == NULL)
{
	die('Echec lors de la création du fichier...');
	exit;
}

fwrite($file, 'body
{
  background-color: #EEE;
  margin: auto;
  width: 800px;
}
h1
{
  text-align: center;
}
');

$bbcode_css = '
@font-face {
font-family: "Lucida Console A";
src: url("../bbcode-fonts/L_10646.TTF");
 }
@font-face
{
  font-family: "Lucida Console B";
  src: url("../bbcode-fonts/LUCON.TTF");
}

.bbcode-left
{
  text-align: left;
}
.bbcode-right
{
  text-align: right;
}
.bbcode-center
{
  text-align: center;
}
.bbcode-justify
{
  text-align: justify;
}
.bbcode-iframe
{
  border: none;
}
.bbcode-blockquote
{
  padding: 5px;
  border-radius: 6px;
  box-shadow: 0 0 5px #111;
  background-color: #FFF;
}
.bbcode-code
{
  background-color: rgb(20, 20, 20);
  color: #006400;
  font-family: "Lucida Console B";
  padding: 5px;
}
';
fwrite($file, $bbcode_css);

fclose($file);



header('Location: articles.php');
?>
