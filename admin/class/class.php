<?php 


require_once("DataBase.php");
require_once("user.php");
require_once("ctrl.php");
require_once("agent.php");
require_once("client.php");

  $client = new client();

  $user = new user();
  $agent = new agent();
  $controle = new ctrl();
  $db= new Database(); 



?>