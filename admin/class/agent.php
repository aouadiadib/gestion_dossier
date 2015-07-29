<?php 


class agent 
{ 


public function liste_agent()
	{
		$select = DataBase::connect()->query("select * from agent ORDER BY id_agent DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_agent= $donnees->id_agent;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$ncin= $donnees->ncin;
			$tel= $donnees->tel;
			$login= $donnees->login;
			$pass= $donnees->pass;
			$type= $donnees->type;

			echo "<tr>";
			echo "<td>";
			echo $id_agent;
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
			echo "agent ".$type;
			echo "</td>";
			echo "<td>";
			echo $login;
			echo "</td>";
			echo "<td>";
			echo $pass;
			echo "</td>";			
			echo "<td>";
			echo "<a href='modifier_agent.php?id=$id_agent'>"; 
			echo " <img src='img/modif.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_agent.php?id=$id_agent'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le client:   ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
	}


	public function ajouter_agent($ncin,$nom,$prenom,$tel,$type,$login,$pass)
	{	$insert = DataBase::connect()->prepare('insert into agent VALUES
		(NULL,:type,:ncin,:nom,:prenom,:tel,:login,:pass)');
try {		
	$ins = $insert->execute(
	array(
	'type'=>$type,
	'ncin'=>$ncin,
	'nom'=>$nom,
	'prenom'=>$prenom,
	'tel'=>$tel,
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
	
	

public function supprimer_agent($id)
	{
		$delete = DataBase::connect()->query("delete from agent where id_agent = '$id'");
		if($delete)
		{
			return true;
		}
	}


	 public function modifier_agent($id,$ncin,$nom,$prenom,$tel,$login)
	{
	
		$up = DataBase::connect()->prepare('update  agent SET
		ncin=:ncin,nom=:nom,prenom=:prenom,tel=:tel,login=:login where id_agent=:id');
try {		
	$update = $up->execute(
	array(
	'ncin'=>$ncin,
	'nom'=>$nom,
	'prenom'=>$prenom,
	'tel'=>$tel,
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

	public function select_agent($id)
	{
		
		$select = DataBase::connect()->query("select * from agent where id_agent=$id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}

	
}