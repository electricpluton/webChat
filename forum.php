
<?php session_start () ; 
	if (empty ($_SESSION['pseudo'] )) {
		header ('Location:login.php');
	
	}else {
?> 

		<!DOCTYPE html>
		<html>
			
			<meta charset ="utf-8" />
			<title>Forum</title>
			<link rel ="stylesheet" href ="style.css" />
			
			<body>
				<header>
					<?php include_once('entete2.php'); ?>
				</header>
				
				<div id ="salutation">
					<?php echo 'Salut <strong> ' .$_SESSION['pseudo'] .'</strong> et Bienvenue !';?>
					
				</div>
				<div id ="affiche_commentaire" >
					<?php include_once ('affiche_commentaire.php') ; ?> 
				</div>
				
				<div id ="commentaire">
					<form method ="post" action ="commentaire_post.php">
					
						<label for="message" class ="position">Votre commentaire : </label>
						<textarea id ="message" name ="message" cols ="60" rows ="12"></textarea>
						<br /> 
					
						<span class ="position"></span>
						<input type ="submit" value ="poster" />
					</form>
				</div>
				<footer class ="footer">
					<?php include_once ('pied_page.php'); ?>
				</footer>
				
			</body>
		</html>
		<?php
			}
			?>
