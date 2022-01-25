
<?php 
	
	include_once ('Personne.class.php') ;
	$visiteur = new Personne () ;
	
	if ( $visiteur ->verification($_POST['pseudo'], $_POST ['pass'], $_POST['pass_confirm'], $_POST['email']) ) {
		
		if ( $visiteur ->validation_pseudo($_POST['pseudo']) and
			 $visiteur ->validation_mail($_POST['email'] )  and
			 $visiteur ->validation_pass($_POST['pass'], $_POST['pass_confirm'] ) ) {
				 
				// echo '<br /> <div> Tout est correct .</div>' ;
				 
				 $pass = sha1 ($_POST['pass']) ;
				 
				 include_once ('insertion_inscription.php');
				 
				
				 
			 } else {
				 
				 echo '<br /> <p>Les informations entrees sont incorrectes : </p> <br />' ;
				
				 if (!$visiteur ->validation_pseudo ($_POST['pseudo']) ) {
					 echo '<br /><div> le pseudo doit comporter au moins 4 caracteres !</div>' ;
				 }
				 
				 if (!$visiteur ->validation_pass ($_POST['pass'], $_POST['pass_confirm']) ) {
					 echo '<br /><div> Les deux mots de passe doivent etre identiques ! et doit comporter au moins 6 caracteres </div>' ;
				 }
				 
				 if (!$visiteur ->validation_mail ($_POST['email']) ) {
					 echo '<br /><div> Votre email est invalide !</div>';
				 } 
				 
			 } 
			
	}else {
		echo '<br /> <div> Aucun champ ne doit etre vide !!! </div>';
	}
?>
<br /> <br />
<p>
	<a href ="inscription.php" >Retour au formulaire d'inscription</a>
</p>
