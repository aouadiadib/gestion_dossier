<?php 
require_once('class/class.php');
$id = $_GET['id'];

$demande->supprimer_demande($id);
$link='liste_demande.php?message=delete';
$user->location($link);

?>