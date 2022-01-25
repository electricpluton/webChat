<!DOCTYPE html>

<html>
	<head>
		
		<meta charset ="utf-8" />
		<title>Inscription</title>
		<link rel ="stylesheet" href ="style.css" />
		
	</head>
	<body>
		
		<form id ="myform" action ="traitement_inscription.php" method ="post">
			
			<label for ="pseudo" class ="position" >Pseudo : </label>
			<input type ="text" id ="pseudo" name ="pseudo" />
			<br /> <br />
			
			<label for ="pass" class ="position" >Mot de passe : </label>
			<input type ="password" id ="pass" name ="pass" />
			<br /> <br />
			
			<label for ="pass_confirm" class ="position" >Mot de passe  (confirmation) : </label>
			<input type ="password" id ="pass_confirm" name ="pass_confirm" />
			<br /> <br >
			
			<label for ="email" class ="position" >Email : </label>
			<input type ="text" id ="email" name ="email" />
			<br /> <br />
			
			<span class ="position" ></span>
			<input type ="submit" value ="Inscrire" />
			
					
		</form>
		<form action ="index.php">
			<span class ="position"></span>
			<input type ="submit" value ="Retour" />
		</form>
	</body>
</html>
