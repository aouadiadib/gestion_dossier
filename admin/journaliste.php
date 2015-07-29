<?php
require_once("DataBase.php");
class journaliste
{

	public function __construct()
	{	
		
	}
	
	
public function total_journaliste()
	{
		$select = DataBase::connect()->query("select * from journaliste ");
		
		$nbr = $select->rowcount();
		
		return $nbr;

	}
	


	public function ajouter_journaliste($nom,$prenom,$type,$login,$pass)
	{
		$insert = DataBase::connect()->prepare('insert into journaliste VALUES
		(NULL,:nom,:prenom,:type,:login,:pass)');
try {		
	$ins = $insert->execute(
	array(
	'nom'=>$nom,
	'prenom'=>$prenom,
	'type'=>$type,
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
	


public function supprimer_journaliste($id)
	{
		$delete = DataBase::connect()->query("delete from journaliste where id_jour = '$id'");
		if($delete)
		{
			return true;
		}
	}


public function liste_journaliste()
	{
		$select = DataBase::connect()->query("select * from journaliste   ORDER BY id_jour DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_journaliste= $donnees->id_jour;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$type= $donnees->type;
			echo "<tr>";
			echo "<td>";
			echo $id_journaliste;
			echo "</td>";
			echo "<td>";
			echo $nom." ".$prenom;
			echo "</td>";
			echo "<td>";
			echo $type;
			echo "</td>";
			echo "<td>";
			echo "<a href='consulter_journaliste.php?id=$id_journaliste'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_journaliste.php?id=$id_journaliste'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_journaliste.php?id=$id_journaliste'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le Personnel: ".$nom." ".$prenom." ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}
	

public function select_journaliste($id)
	{
		
		$select = DataBase::connect()->query("select * from journaliste   where id_jour=$id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}

	public function select_journaliste_login($login)
	{
		
		$select = DataBase::connect()->query("select * from journaliste where login='$login' ");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}

public function modifier_journaliste($nom,$prenom,$type,$login,$id)
	{
	
		$up = DataBase::connect()->prepare('update  journaliste SET
		nom=:nom,prenom=:prenom,type=:type,login=:login where id_jour=:id');
try {		
	$update = $up->execute(
	array(
	'nom'=>$nom,
	'prenom'=>$prenom,
	'type'=>$type,
	'login'=>$login,
	'id'=>$id
	)
	);
	
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
		
	}





 }
 
 
 

 
 
?>