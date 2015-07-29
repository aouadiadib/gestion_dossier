<?php 


class demande 
{ 




public function liste_demande()
	{
		$select = DataBase::connect()->query("select * from demande as d inner join client as c on c.id_client=d.id_client   ORDER BY d.id_demande DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_demande= $donnees->id_demande;
			$date= $donnees->date;
			$type= $donnees->type;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$etat= $donnees->etat;
			
			echo "<tr>";
			echo "<td>";
			echo $id_demande;
			echo "</td>";
			echo "<td>";
			echo $date;
			echo "</td>";
			echo "<td>";
			echo $nom." ".$prenom;
			echo "</td>";			
			echo "<td>";
			echo $type;
			echo "</td>";
			echo "</td>";			
			echo "<td>";
			echo $etat;
			echo "</td>";			
			echo "<td>";
			echo "<a href='consulter_demande.php?id=$id_demande'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";			
			echo "<td>";
			echo "<a href='supprimer_demande.php?id=$id_demande'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le Personnel:   ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}


	public function ajouter_demande($client,$type,$date,$etat)
	{
		$insert = DataBase::connect()->prepare('insert into demande VALUES
		(NULL,:type,:date,:etat,NULL,:client)');
try {		
	$ins = $insert->execute(
	array(
	'type'=>$type,
	'date'=>$date,
	'etat'=>$etat,
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
	
	public function supprimer_demande($id)
	{
		$delete = DataBase::connect()->query("delete from demande where id_demande = '$id'");
		if($delete)
		{
			return true;
		}
	}


		public function select_demande($id)
	{
		
		$select = DataBase::connect()->query("select * from demande where id_demande=$id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}

	


}