<?php
$username = $_POST['username'];
$email = $_POST['email'];
$me = "wankyxprogramming@gmail.com";
$message = $_POST['textarea'];
$header = '$email';

if(!empty($username) && !empty($email) && !empty($message))
{
  if(mail($me, 'Contact', $message, $header))
    header('location: index.php');
  else
    echo '<script>alert("[!] Impossibiliter d\'envoi ...")</script>';
}
echo '<script>alert("Une erreur est survenue lors de l\'envoi du mail")</script>';
 ?>
