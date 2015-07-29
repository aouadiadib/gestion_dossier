<?php 


class reclamation 
{


public function liste_reclamation()
	{
		$select = DataBase::connect()->query("select * from reclamation as r 
			inner join client as c 
			on c.id_client=r.id_client
		   ORDER BY r.id_reclamation DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_reclamation= $donnees->id_reclamation;
			$date=$donnees->date;
			$sujet= $donnees->sujet;
			$texte= $donnees->texte;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;

			echo "<tr>";
			echo "<td>";
			echo $id_reclamation;
			echo "</td>";
			echo "<td>";
			echo $date;
			echo "</td>";
			echo "<td>";
			echo $nom." ".$prenom;
			echo "</td>";
			echo "<td>";
			echo $sujet;
			echo "</td>";

			echo "<td>";
			echo "<a href='consulter_reclamation.php?id=$id_reclamation'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_reclamation.php?id=$id_reclamation'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer la réclamation:   ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}


	public function ajouter_reclamation($client,$sujet,$texte,$date)
	{
		$insert = DataBase::connect()->prepare('insert into reclamation VALUES
		(NULL,:sujet,:date,:texte,:client)');
try {		
	$ins = $insert->execute(
	array(
	'sujet'=>$sujet,
	'date'=>$date,
	'texte'=>$texte,
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


	public function supprimer_reclamtion($id)
	{
		$delete = DataBase::connect()->query("delete from reclamation where id_reclamation = '$id'");
		if($delete)
		{
			return true;
		}
	}



}