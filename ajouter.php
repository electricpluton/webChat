
<?php 
	if ( empty ($_POST['pseudo']) or empty ($_POST['pass']) ) {
		
		 header ('Location:acceder_administration.php');
	
	} else {
	
	include_once ('Personne.class.php') ;
	$admin = new Personne () ;
	
	if ( $admin ->verification($_POST['pseudo'], $_POST ['pass'], $_POST['confirm_pass'], $_POST['nom']) ) {
		
		if ( $admin ->validation_pseudo($_POST['pseudo']) and
			 $admin ->validation_pseudo($_POST['nom'] )  and
			 $admin ->validation_pass($_POST['pass'], $_POST['confirm_pass'] ) ) {
				 
				// echo '<br /> <div> Tout est correct .</div>' ;
				 
				 $pass = sha1 ($_POST['pass']) ;
				 
				 include_once ('connection_sql.php');
				 $req = $bdd ->prepare ('INSERT INTO administrateur(nom, identifiant, passAdmin, date_ajout )
										 VALUES (:nom, :identifiant, :passAdmin, NOW() ) ');
				
				$req ->execute (array (
										'nom' 		   => $_POST['nom'],
										'identifiant'  => $_POST['pseudo'],
										'passAdmin'    => $pass )) or die ($req ->errorInfo ());
				
				$req ->closeCursor ();
				 
				header ('Location:acceder_administration.php');
				 
			 } else {
				 
				 echo '<br /> <p>Les informations entrees sont incorrectes : </p> <br />' ;
				
				 if (!$admin ->validation_pseudo ($_POST['pseudo']) ) {
					 echo '<br /><div> le pseudo doit comporter au moins 4 caracteres !</div>' ;
				 }
				 
				 if (!$admin ->validation_pass ($_POST['pass'], $_POST['confirm_pass']) ) {
					 echo '<br /><div> Les deux mots de passe doivent etre identiques ! et doit comporter au moins 6 caracteres </div>' ;
				 }
				 
				 if (!$admin ->validation_mail ($_POST['email']) ) {
					 echo '<br /><div> Votre email est invalide !</div>';
				 } 
				 
			 } 
			
	}else {
		echo ' <p style ="text-align:center; margin-top:30px">
				Aucun champ ne doit etre vide !!! <br /> <br />
				<a href ="acceder_administration.php" >Revenir au pannel administration</a></p>';

	} 
}
?>


