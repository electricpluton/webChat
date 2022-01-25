<?php session_start () ; ?>
<!DOCTYPE html>

<html>
	
	<meta charset ="utf-8" />
	<title>webchat</title>
	<link rel ="stylesheet" href ="style.css" />
	
	<body>
		<header>
			<?php  include_once ('entete.php'); ?>
		</header>
		<p>
			<h1>WebChat</h1>
		</p>
		<div>
			<p class ="centrer">
				Bienvenue sur notre site web de chat en ligne, 
				 Je vous souhaite un agréable moment parmis nous.
			</p>
		</div>
		<div id ="image">
			<img src ="line.jpg" width = 500 height = 250         />
		</div>
		
		<footer class ="footer">
			<?php  include_once ('pied_page.php') ; ?>
		</footer>
	</body>
</html>
