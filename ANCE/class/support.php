<?php 


class support 
{


public function liste_support()
	{
		$select = DataBase::connect()->query("select * from support as s inner join client as c 
			on s.id_client=c.id_client
		   ORDER BY s.id_support DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_support= $donnees->id_support;
			$marque= $donnees->marque;
			$numero= $donnees->num_s;
			$type= $donnees->type;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			echo "<tr>";
			echo "<td>";
			echo $id_support;
			echo "</td>";
			echo "<td>";
			echo $type;
			echo "</td>";
			echo "<td>";
			echo $marque;
			echo "</td>";
			echo "<td>";
			echo $numero;
			echo "</td>";
			echo "<td>";
			echo $nom." ".$prenom;
			echo "</td>";

			echo "<td>";
			echo "<a href='supprimer_support.php?id=$id_support'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le Support:   ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}

	public function ajouter_support($client,$type,$num,$marque)
	{

		$insert = DataBase::connect()->prepare('insert into support VALUES
		(NULL,:num,:marque,:type,:client)');
try {		
	$ins = $insert->execute(
	array(
	'num'=>$num,
	'marque'=>$marque,
	'type'=>$type,
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


	public function supprimer_support($id)
	{
		$delete = DataBase::connect()->query("delete from support where id_support = '$id'");
		if($delete)
		{
			return true;
		}
	}


	}

