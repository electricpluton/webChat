
<?php

session_start () ;
	
	if (!empty ($_POST['login']) and !empty ($_POST['mot_passe'] ) ) {
		
		$login = htmlspecialchars ($_POST['login']);
		$password =  htmlspecialchars ($_POST['mot_passe']) ;
		if ($login == 'jeton' and $password == 'connection') {
			header('Location:admin.php');
		} else {
		
		$password = sha1($password);
		include_once ('connection_sql.php');
	
		$req = $bdd ->prepare ('SELECT pseudo,pass FROM personne 
								WHERE pseudo =:pseudo AND pass =:pass ') ;
							
		$req ->execute (array ( 
							'pseudo' =>  $login ,
							'pass'   =>  $password ) ) or die (print_r($req ->errorInfo() ));
		$donne = $req ->fetch () ;
		if ( $donne['pseudo'] == $login and $donne['pass'] == $password )  {
			$_SESSION['pseudo'] = $login ;
			$_SESSION['pass'] = $password ;
			header ('Location:forum.php');
		
		}else {
		
			echo '<br /> <div style ="text-align:center;margin-top:50px">Pseudo ou mot de passe incorrect !!! <br />
				<a class ="centrer" href ="login.php">Retourner pour se connecter</a> </div> <br />';

		} 
	}


	}else {
	?>
<!DOCTYPE html>

<html>
	
	<meta charset ="utf-8" />
	<title>Connection</title>
	<link rel ="stylesheet" href ="style.css" />
	
	<body>
		<div>
			<p class ="center"> Aucun champ ne doit être vide !!! <br /></p> <br />
			<form  method ="post">
				<label for ="login" class ="position">Pseudo : </label>
				<input type ="text" id ="login" name ="login" />
				<br /> <br />
				
				<label for ="mot_passe" class ="position" >Mot de passe : </label>
				<input type ="password" id ="mot_passe" name ="mot_passe" />
				<br /> <br />
				
				<label for ="connection_automatique" class ="position">Connection automatique</label>
				<input type ="checkbox" id ="connection_automatique" name ="connection_automatique" />
				<br /> <br />
				
				<span class ="position" ></span>
				<input type ="submit" value ="connection" />
			</form>
			
			<form action ="index.php">
				<span class ="position" ></span>
				<input type ="submit" value ="retour" />
			</form>
		</div>
	</body>
</html>
	<?php
 }

?>
