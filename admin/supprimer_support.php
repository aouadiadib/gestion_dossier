<?php 
require_once('class/class.php');
$id = $_GET['id'];

$support->supprimer_support($id);
$link='liste_support.php?message=delete';
$user->location($link);

?>