<?php 

require_once('class/class.php');
$id = $_GET['id'];
$rep = "reçu";
$certificat->valider_certificat($id,$rep);
$link='liste_certificat.php?message=valide';
$user->location($link);

?>