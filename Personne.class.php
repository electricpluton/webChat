<?php

 class Personne {
	 
	
	 
	 public function verification ($par1, $par2, $par3, $par4 ) {
		 
		 if ( empty($par1) or empty($par2) or empty($par3) or empty($par4) ) {
			 
			 return false ;
		 }else {
			 return true ;
		 }
	 }
	 
	 public function validation_pseudo ($pseudo) {
		 $pseudo = htmlspecialchars ($pseudo) ;
		 if (strlen ($pseudo) >= 4 ) {
			 return true ;
		 }else {
			 return false ;
		 }
	 }
	 
	 public function validation_mail ($email) {
		 $email = htmlspecialchars ($email);
		 if ( preg_match ("#^[a-z0-9_.-]+@[a-z_.-]{2,}\.[a-z]{2,4}$#", $email) ) {
			 return true ;
		 
		 }else {
			 return false ;
		 }
	 }
	 
	 public function validation_pass ($pass, $pass_confirm) {
		 $pass = htmlspecialchars ($pass);
		 $pass_confirm = htmlspecialchars ($pass_confirm);
		 if ($pass == $pass_confirm and strlen($pass)>=6 ){
			 return true ;
		 }else {
			 return false ;
		 }
	 }
	 
	
}

