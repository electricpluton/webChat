
<?php 
	
	include_once ('connection_sql.php') ;
	
	$req = $bdd ->prepare (' INSERT INTO personne (pseudo,pass,email,date_inscription) 
							 VALUES (:pseudo, :pass, :email, NOW() ) ') ;
	
	$req ->execute ( array (
						'pseudo' => $_POST['pseudo'],
						'pass' 	 => $pass ,
						'email'	 => $_POST['email'] ) ) ;
	
	
	$req ->closeCursor () ;
?> 
<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<link rel ="stylesheet" href ="../style.css" />
	</head>
	
	<body>
		<form action = "login.php" method ="post" >
	
	<span class ="position">Appuyer sur la touche en dessous pour se acceder à l'espace membre</span>
	<br />
	<span class ="position"></span>
	<input type ="submit" value ="se connecter" />
	
</form> 
		
	</body>
</html>
