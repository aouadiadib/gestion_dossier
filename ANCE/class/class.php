<?php 


require_once("DataBase.php");
require_once("user.php");
require_once("ctrl.php");
require_once("demande.php");
require_once("support.php");
require_once("client.php");
require_once("reclamation.php");
require_once("certificat.php");

  $user = new user();
  $demande = new demande();
  $reclamation = new reclamation();
  $support = new support();
  $client = new client();
  $controle = new ctrl();
  $certificat = new certificat();
  $db= new Database(); 



?>