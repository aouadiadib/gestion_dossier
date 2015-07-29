<?php
require_once("DataBase.php");
class user
{

	public function __construct()
	{	
		
	}
	
	
	public function inscription($email,$tel,$entreprise,$login,$pass,$rpass)
	{
		$insert = DataBase::connect()->prepare('insert into user VALUES
		(NULL,:email,:tel,:entreprise,:login,:pass)');
try {		
	$ins = $insert->execute(
	array(
	'email'=>$email,
	'tel'=>$tel,
	'entreprise'=>$entreprise,
	'login'=>$login,
	'pass'=>$pass
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
	}
	
	
	
	
	
	
	
 public function login($login,$pass){
	$result = DataBase::connect()->prepare("SELECT * FROM admin WHERE login= :login AND pass= :pass");
$result->bindParam(':login', $login);
$result->bindParam(':pass', $pass);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {


						
		session_name('SESSION1');
		session_start();
		$_SESSION['l'] =$login; 
		$_SESSION['p'] =$pass;     
		
		header("location:liste_agent.php");
					}
					
					else
							{
								echo "<br><strong>Login ou mot de passe incorrecte</strong>";
								
							}

}


 

 
 public function changer_pass_admin($npass,$login){
	
	
$MODIFIER = DataBase::connect()->prepare('UPDATE admin SET
pass=:pass where login=:login');

try {
  
	$success = $MODIFIER->execute(array(
    'pass'=>$npass,
    'login'=>$login
    
  ));
  }
  catch( Exception $e )
   {
	  
	  echo 'Erreur de requète : ', $e->getMessage();
	
   }
	return true;
 }
	
	public function changer_pass_journaliste($npass,$login){
	
	
$MODIFIER = DataBase::connect()->prepare('UPDATE journaliste SET
pass=:pass where login=:login');

try {
  
	$success = $MODIFIER->execute(array(
    'pass'=>$npass,
    'login'=>$login
    
  ));
  }
  catch( Exception $e )
   {
	  
	  echo 'Erreur de requète : ', $e->getMessage();
	
   }
	return true;
 }
 
 public function changer_pass_media($npass,$login){
	
	
$MODIFIER = DataBase::connect()->prepare('UPDATE responsable_media SET
pass=:pass where login=:login');

try {
  
	$success = $MODIFIER->execute(array(
    'pass'=>$npass,
    'login'=>$login
    
  ));
  }
  catch( Exception $e )
   {
	  
	  echo 'Erreur de requète : ', $e->getMessage();
	
   }
	return true;
 }
 
 
  public function location($link){

  header('Location: '.$link);
 }
 
   public function value_session()
   {
	 session_name('SESSION1');
	 
	 $data = array();
	 $data['pass'] = $_SESSION['p'] ;
	 $data['login'] = $_SESSION['l'] ;
	 
	
	
	 return $data ;
   }
 
 public function get_id()
 {
	 
	 session_name('SESSION1');
	 session_start();
	 
	 $id_user = $_SESSION['id'] ;

	 return $id_user ;
   
 }
 
  public function logout(){

  session_name('SESSION1');
  session_start();
  session_destroy(); 
	header ('location:../index.php');
 }
 
 
 
 public function acceder($log,$id_u)
 {
	 
				session_name('SESSION1');
						
						$_SESSION['l'] =$log; 
						$_SESSION['id'] =$id_u;    
						
						
	 
 }
 
	public function contact($email,$sujet,$texte)
	 {
		
$insert = DataBase::connect()->prepare('insert into contact 
VALUES (NULL,:email,:sujet,:texte)');

try {
  
	$success = $insert->execute(array(
    'email'=>$email,
    'sujet'=>$sujet,
    'texte'=>$texte
  ));
  }
  catch( Exception $e )
   {
	  
	  echo 'Erreur de requète : ', $e->getMessage();
	
   }
	return true;
	 }
 
 
 public function affichage()
	{
	
	if(isset($_GET["message"])) {
		$msg = $_GET["message"];
		if($msg=='delete')
	{
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Supression avec succées</div>";
	} 
	if($msg=='add')
	{
		
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Ajout avec succées</div>";
	}

	if($msg=='update')
		{
			
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Modification avec succées</div>";
			}

	} 	else 
			{
			$message = "";
		}
	
			echo $message ;

	}

	
 }
 
 
 

 
 
?>