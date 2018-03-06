<?php
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
$structure = $articles_title;

// Pour créer une stucture imbriquée, le paramètre $recursive
// doit être spécifié.

if (!mkdir($structure, 0777, true)) {
    die('Echec lors de la création des répertoires...');
    exit;
}

header('Location: articles.php');
?>
