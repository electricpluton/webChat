
<?php 
	
	if ( (!empty ($_POST['pseudo'])) or (!empty ($_POST['pseudo_suppr']) and !empty($_POST['date_commentaire'])) ) {
		
			session_start ();
			include_once ('connection_sql.php');
			
			$req = $bdd ->prepare ('SELECT id FROM personne WHERE pseudo = ?');
			
			if (!empty ($_POST['pseudo'])) {
				$_POST['pseudo'] = htmlspecialchars ($_POST['pseudo']);
				$req ->execute (array ($_POST['pseudo'] ) );
			}
			
			if (!empty ($_POST['pseudo_suppr'])) {
				$_POST['pseudo_suppr'] = htmlspecialchars($_POST['pseudo_suppr']);
				$req ->execute (array ($_POST['pseudo_suppr']));
			}
			$donne = $req ->fetch () ; 
			
			$_SESSION['id_suppression'] = $donne ['id'] ;
			
			$req ->closeCursor ();
			
			if (!empty($_POST['pseudo'])) {
				
				if (!empty($_SESSION['id_suppression'])) {
					
					// on supprime d'abord ses commentaires 
					
					$req = $bdd ->prepare ('DELETE FROM messages WHERE messages.id_personne = ?');
					$req ->execute (array ( $_SESSION ['id_suppression'] )) or die ($req ->errorInfo());
					$req ->closeCursor ();
					
					// on supprime son profil du site 
					
					$req = $bdd ->prepare ('DELETE FROM personne WHERE personne.id = ?');
					$req ->execute (array ($_SESSION['id_suppression'])) or die ($req ->errorInfo());
					$req ->closeCursor ();
					header ('Location:acceder_administration.php');
				} else {
						echo '<div style ="text-align:center; margin-top:55px">La personne  
							<strong> '.$_POST['pseudo'] . '</strong> ' . ' n \' a pas un compte sur ce site <br /><br />
							<a href ="acceder_administration.php">Revenir au pannel administration</a>
							</div>';
				}
			}
			
			if (!empty ($_POST['date_commentaire'])) { 	// j aurai pu ajouter $_POST['pseudo_suppr'] mais c'est pas la peine
				
				$req = $bdd ->prepare ('SELECT date_commentaire FROM messages WHERE date_commentaire = ? AND id_personne = ?');
				$req ->execute (array ($_POST['date_commentaire'], $_SESSION['id_suppression']));
				$donne = $req ->fetch () ;
				
				if (!empty ($donne['date_commentaire']) and !empty($donne['id_personne']) ) {
					
					$date_commentaire = $donne['date_commentaire'];
					$id_personne = $donne['id_personne'];
					$req ->closeCursor ();
					
					$req  = $bdd ->prepare ('DELETE FROM messages WHERE id_personne = ? AND date_commentaire = ?');
					$req ->execute (array ($id_personne, $date_commentaire));
					$req ->closeCursor () ;
					header ('Location:acceder_administration.php');
				
				}else {
					echo ' <div style ="text-align:center; margin-top:50px">La personne <strong>'.$_POST['pseudo_suppr'] .
				' </strong> n \' a pas de commentaire sur ce site pour la date : <strong>' .$_POST['date_commentaire'] . '</strong> 
						<br /> <br /><a href ="acceder_administration.php">Revenir au pannel administration</a>
					</div> ';
				} 
				
			}
			
		
		} else {
			echo ' <div style ="text-align:center; margin-top:50px">Pour une action concernée tous les champs sont obligatoires 
						<br /> <br /><a href ="acceder_administration.php">Revenir au pannel administration</a>
					</div> ';
		}
?>
