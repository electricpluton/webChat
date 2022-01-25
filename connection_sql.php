
<?php

	try {
		
		$bdd = new PDO ('mysql: host=192.168.1.30; dbname=webChat', 'alban', 'Albelda');
	
	}catch (Exception $e) {
		
		die ('Erreur : ' .$e ->getMessage () ) ;
	}
		
		


