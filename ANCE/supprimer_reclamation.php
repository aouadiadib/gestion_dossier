<?php 
require_once('class/class.php');
$id = $_GET['id'];

$reclamation->supprimer_reclamation($id);
$link='liste_reclamtion.php?message=delete';
$user->location($link);

?>