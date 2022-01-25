
<?php 
	
	if (empty($_SESSION['pseudo'])) {
		header ('Location:deconnection.php');
	}else {
		
	include_once ('connection_sql.php') ; 
	
	$req = $bdd ->query ('SELECT p.pseudo AS auteur, m.commentaire AS commentaire, m.date_commentaire AS date 
							FROM personne AS p, messages AS m 
							WHERE p.id = m.id_personne ORDER BY m.date_commentaire DESC ') ;
							
	while ($donne = $req ->fetch ()) {
		?>
		<p>
			<br /> 
			<?php echo '<strong>' .$donne['auteur']. '</strong> '.' le  ';?> <strong><?php echo $donne['date'] ; ?></strong>
		</p>
		<p>
			<div >
				<?php echo nl2br ( htmlspecialchars ($donne['commentaire']) ); ?> 
			</div>
		</p>
	<?php 
	}
}
	$req ->closeCursor () ;
?> 

