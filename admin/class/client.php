<?php 


class client 
{ 


public function liste_client()
	{
		$select = DataBase::connect()->query("select * from client   ORDER BY id_client DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_client= $donnees->id_client;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$ncin= $donnees->ncin;
			$tel= $donnees->tel;
			
			echo "<tr>";
			echo "<td>";
			echo $id_client;
			echo "</td>";
			echo "<td>";
			echo $ncin;
			echo "</td>";
			echo "<td>";
			echo $nom;
			echo "</td>";
			echo "<td>";
			echo $prenom;
			echo "</td>";			
			echo "<td>";
			echo $tel;
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_client.php?id=$id_client'>"; 
			echo " <img src='img/modif.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_client.php?id=$id_client'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le client:   ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}


	public function ajouter_client($ncin,$nom,$prenom,$tel)
	{
		$insert = DataBase::connect()->prepare('insert into client VALUES
		(NULL,:ncin,:nom,:prenom,:tel)');
try {		
	$ins = $insert->execute(
	array(
	'ncin'=>$ncin,
	'nom'=>$nom,
	'prenom'=>$prenom,
	'tel'=>$tel
	
	)
	);
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
	}
	
	

public function supprimer_client($id)
	{
		$delete = DataBase::connect()->query("delete from client where id_client = '$id'");
		if($delete)
		{
			return true;
		}
	}


	 public function modifier_client($id,$ncin,$nom,$prenom,$tel)
	{
	
		$up = DataBase::connect()->prepare('update  client SET
		ncin=:ncin,nom=:nom,prenom=:prenom,tel=:tel where id_client=:id');
try {		
	$update = $up->execute(
	array(
	'ncin'=>$ncin,
	'nom'=>$nom,
	'prenom'=>$prenom,
	'tel'=>$tel,
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

	public function select_client($id)
	{
		
		$select = DataBase::connect()->query("select * from client where id_client='$id'");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}

	public function option_client()
	{
		$select = DataBase::connect()->query("select * from client   ORDER BY id_client DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_client= $donnees->id_client;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$ncin= $donnees->ncin;
			$tel= $donnees->tel;
			
			echo "<option value=$id_client>";
			echo $nom." ".$prenom;
			echo "</option>";
			
		}
	}

}