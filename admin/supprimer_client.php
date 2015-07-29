<?php 
require_once('class/class.php');
$id = $_GET['id'];

$client->supprimer_client($id);
$link='liste_client.php?message=delete';
$user->location($link);

?>