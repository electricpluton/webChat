<?php session_start ();
	if (!empty ($_SESSION['nom_admin'])) {
		
?>

		<link rel ="stylesheet" href ="style.css" />
		<header style ="text-align:right; margin-top:20px; padding-right:50px">
			<?php  echo '<div> Salut <strong> '. $_SESSION['nom_admin'] . '</strong> '. ' et Bienvenue !!!  </div> '; ?>
		</header>
		<div id ="admin">
			<p> Entrer les informations pour ajouter un nouvel administrateur :</p>
			<form action ="ajouter.php" method ="post">
				
				<label for ="nom" class ="position">Nom : </label>
				<input type ="text" id ="nom" name ="nom" />
				<br /> 
				
				<label for ="pseudo" class ="position">Pseudo : </label>
				<input type ="text" name ="pseudo" id ="pseudo" />
				<br />
				
				<label for ="pass" class ="position" >Mot de passe : </label>
				<input type ="password" id ="pass" name ="pass" />
				<br />
				
				<label for ="confirm_pass" class ="position" >Confirmer mot de passe :</label>
				<input type ="password" id ="confirm_pass" name ="confirm_pass" />
				<br />
				
				<span class ="position"></span>
				<input type ="submit" value ="Ajouter" />
				
			</form>
			<form action ="deconnection.php">
					<span class ="position"></span>
					<input type ="submit" value ="se deconnecter" />
				</form>
		</div>

		<section id ="operation" >
			
			<div id ="bannir">
				<p>Enter les informations pour bannir un membre </p>
				<form action ="supprimer.php" method ="post">
					<label class ="position" for ="pseudo">Pseudo du membre : </label>
					<input type ="text" id ="pseudo" name ="pseudo" />
					<br />
					
					<span class ="position"></span>
					<input type ="submit" value ="Bannir" />
					
				</form>
			</div>
			<div >
				<p style ="padding-top:15px">Entrer les informations pour supprimer des commentaires : </p>
				<form method ="post" action ="supprimer.php">
					<label class ="position"  for ="pseudo">Entrer son pseudo : </label>
					<input type ="text" id ="pseudo" name ="pseudo_suppr" />
					<br />
					
					<label class ="position" for ="date_commentaire">date du commentaire : </label>
					<input type ="text" id ="date_commentaire" name ="date_commentaire" />
					<br />
					
					<span class ="position"></span>
					<input type ="submit" value ="Suppression commentaires" />
				</form>
				
			</div>

		</section>
<?php 
	}else {
			header ('Location:admin.php');
		}
		?>
