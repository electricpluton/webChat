
<?php 
	if (!empty ($_POST['message']) ){
		
		session_start () ;
		$_POST['message'] = htmlspecialchars($_POST['message']) ;
		
		include_once ('connection_sql.php');
		
		// on recupere l'id de notre visiteur ce qui va servir id_personne dans la table messages
	
		$req = $bdd ->prepare ('SELECT id FROM personne WHERE pseudo = ? ');
	
		$req ->execute (array ($_SESSION['pseudo']) ) ;
		$donne = $req ->fetch ();
		$_SESSION['id_personne'] = $donne ['id'] ;
	
		$req ->closeCursor ();
		
		// on insere le post dans la base de donnee
		
		$req = $bdd ->prepare ('INSERT INTO messages (id_personne, commentaire, date_commentaire)
								VALUES (:id_personne, :commentaire, NOW()) ');
		$req ->execute (array (
							'id_personne' => $_SESSION['id_personne'],
							'commentaire' => $_POST['message'] ) )  or die (print_r($req ->errorInfo()) );
		
		$req ->closeCursor () ;
		header ('Location:forum.php');
		
	}else {
		
		header('Location: forum.php');
		 
	}
	
	
	
	
	
	
?>
