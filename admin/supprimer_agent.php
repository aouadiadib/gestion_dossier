<?php 
require_once('class/class.php');
$id = $_GET['id'];

$agent->supprimer_agent($id);
$link='liste_agent.php?message=delete';
$user->location($link);

?>