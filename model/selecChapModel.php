<?php
function listChap(){	
	$bdd=dbConnect();
	$reponse= $bdd->query('SELECT id,titre,SUBSTR(textchap, 1, 100)as textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres  ');//Selection of the first 100 characters 
	return $reponse;

}
