<?php
require_once("DataBase.php");
class Article
{

	public function __construct()
	{	
		$this->now = date("Y-m-d");
	}
	
	
	

	

	public function liste_article()
	{
		
		$select = DataBase::connect()->query("select * from article ORDER BY id_article DESC LIMIT 3");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}

public function lister_article()
	{
		
		$select = DataBase::connect()->query("select * from article ORDER BY id_article DESC ");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}
	public function select_article_id($id)
	{
		
		$select = DataBase::connect()->query("select * from article where id_article='$id' ");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}

	public function type_article($type)
	{
		
		$select = DataBase::connect()->query("select * from article where type='$type' ORDER BY id_article DESC ");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;
		
	}

	public function supprimer_article($id)
	{
		$delete = DataBase::connect()->query("delete from article where id_article = '$id'");
		if($delete)
		{
			return true;
		}
	}



public function chercher_article($id,$titre)
	{	
	
	if($titre!=NULL){
		$select = DataBase::connect()->query("select * from article  where (titre like '%$titre%') and (id_jour=$id) ");
		
		if($select->rowcount()>0){
			echo"<br><br><table class='table table-responsive table-bordered table-hover'>";
		echo "<thead>
		<tr>
		<th>ID</th><th>Titre</th><th>Type</th><th></th><th></th><th></th>
		</tr>
		</thead>";
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_article= $donnees->id_article;
			$titre= $donnees->titre;
			$type= $donnees->type;
			
			echo "<tr>";
			echo "<td>";
			echo $id_article;
			echo "</td>";
			echo "<td>";
			echo $titre;
			echo "</td>";
			echo "<td>";
			echo $type;
			echo "</td>";
			echo "<td>";
			echo "<a href='consulter_article.php?id=$id_article'>"; 
			echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='modifier_article.php?id=$id_article'>"; 
			echo " <img src='img/modif.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "<td>";
			echo "<a href='supprimer_article.php?id=$id_article'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le Personnel: ".$titre."  ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
		} else 
		{
			echo "<br><br><center><h4>Aucun resultat</center></h4>";
		}
	
	}

 }
 

 
 public function modifier_article($id,$titre,$texte,$img)
	{
	
		$up = DataBase::connect()->prepare('update  article SET
		titre=:titre,texte=:texte,img=:img where id_article=:id');
try {		
	$update = $up->execute(
	array(
	'titre'=>$titre,
	'texte'=>$texte,
	'img'=>$img,
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



public function select_rss()
	{
		
		$select = DataBase::connect()->query("select * from rss limit 1");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		

		foreach ($liste as $row) {
			$rss = $row["lien"];
		}
		return $rss;
		
		
	}



public function ajouter_newslettre($email)
	{
		$insert = DataBase::connect()->prepare('insert into newslettre VALUES
		(NULL,:email)');
try {		
	$ins = $insert->execute(
	array(
	'email'=>$email
	
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