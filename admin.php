<?php 
	
	/* la partie pour gerer le site en question
	 * comme operation on aura la suppresion d'un membre et
	 * l'ajout d'un nouvel administrateur  */
	
	
	 if (!empty($_POST['identifiant']) AND !empty($_POST['pass_admin']) ) {
		 
		 include_once ('connection_sql.php');
		 $identifiant_admin = htmlspecialchars ($_POST['identifiant']);
		 $pass_admin = sha1 (htmlspecialchars($_POST['pass_admin']));
		 
		 $req = $bdd ->prepare ('SELECT nom, identifiant, passAdmin FROM administrateur 
									WHERE identifiant =:identifiant and passAdmin =:pass');
		 
		  $req ->execute (array (
									'identifiant' =>     $identifiant_admin,
									'pass'        => 	 $pass_admin ))or die ($req ->errorInfo());
		   $donne = $req ->fetch ();
		   
		   if ($donne['identifiant'] == $identifiant_admin  and $donne['passAdmin'] == $pass_admin) {
			   session_start ();
			   $_SESSION['nom_admin'] = $donne['nom'] ;
			   header ('Location:acceder_administration.php');
		  
		   }else {

			   echo '<div style ="text-align:center;margin-top:50px">Identifiant ou mot de passe incorrect !!! <br />
					 <a href ="admin.php">Revenir pour se logger</a><br /> </div>';
		   } 
	
	 
	} else {
	?>
			<link rel ="stylesheet" href ="style.css" />
			<p class ="centrer">
				Aucun champ ne doit être vide !!! <br /> <br />
				Entrer votre identifiant et mot de passe pour accéder au portail d' administration</p>
			
			<form method ="post" >
				
				<label for ="identifiant" class ="position">Identifiant : </label>
				<input type ="text" id ="identifiant" name ="identifiant" />
				<br />
				
				<label for ="pass_admin" class ="position">Mot de passe : </label>
				<input type ="password" id ="pass_admin" name ="pass_admin" />
				<br />
				
				<span class ="position" ></span>
				<input type ="submit" value ="se connecter" />
				
			</form>
			<form action ="index.php">
				<span class ="position" ></span>
				<input type ="submit" value ="Revenir à l'accueil" />
			</form>
	<?php
	}
	?>
