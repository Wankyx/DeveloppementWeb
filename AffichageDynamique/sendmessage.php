<?php 
	
	$date = $_POST["date"];
	$message = $_POST["message"];

	try 
	{
		$bdd = new PDO("mysql:host=localhost;dbname=afficheurdynamique;charset=utf8", "root", "");
	}
	catch(Exception $errror)
	{
		die("Impossibe d'acceder a la base de données ". $error->getMessage());
	}

	if(empty($date) || empty($message))
	{
		header("Location: admin.php?username=admin&password=admin");
	}

	$query = $bdd->prepare("INSERT INTO message(date, message) VALUES(?, ?)");
	$query->execute(array($date, $message));
	header("Location: admin.php?username=admin&password=admin");

?>