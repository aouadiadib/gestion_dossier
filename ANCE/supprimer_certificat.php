<?php 
require_once('class/class.php');
$id = $_GET['id'];

$certificat->supprimer_certificat($id);
$link='liste_certificat.php?message=delete';
$user->location($link);

?>