<?php 


class certificat 
{


public function liste_certificat()
	{
		$select = DataBase::connect()->query("select * from certificat as ce
			inner join client as c 
			on c.id_client=ce.id_client
		   ORDER BY ce.id_certificat DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_certificat= $donnees->id_certificat;
			$date=$donnees->date;
			$nom=$donnees->nom;
			$prenom=$donnees->prenom;
			$etat= $donnees->etat;
		

			echo "<tr>";
			echo "<td>";
			echo $id_certificat;
			echo "</td>";
			echo "<td>";
			echo $date;
			echo "</td>";
			echo "<td>";
			echo $etat;
			echo "</td>";
			echo "<td>";
			echo $nom." ".$prenom;
			echo "</td>";

		
			echo "<td>";
			echo "<a href='valider_certificat.php?id=$id_certificat'  >"; 
			echo " <img src='img/traiter.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}


	public function ajouter_certificat($client,$etat,$date)
	{
		$insert = DataBase::connect()->prepare('insert into certificat VALUES
		(NULL,:etat,:date,:client)');
try {		
	$ins = $insert->execute(
	array(
	'etat'=>$etat,
	'date'=>$date,
	'client'=>$client
	
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
	}


	public function select_reclamtion($id)
	{
		
		$select = DataBase::connect()->query("select * from reclamation as r 
			inner join client as c 
			on c.id_client=r.id_client
			where r.id_reclamation='$id'
		   ORDER BY r.id_reclamation DESC");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}


	public function supprimer_certificat($id)
	{
		$delete = DataBase::connect()->query("delete from certificat where id_certificat = '$id'");
		if($delete)
		{
			return true;
		}
	}

	 public function valider_certificat($id,$rep)
	{
	
		$up = DataBase::connect()->prepare('update  certificat SET
		etat=:rep where id_certificat=:id');
try {		
	$update = $up->execute(
	array(
	'rep'=>$rep,
	
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