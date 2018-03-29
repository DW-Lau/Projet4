<?php

function listChap(){	
	try{
			$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
		}
		catch (Exception $e){
			die('Erreur: ' . $e->getmsg());
		}


	$reponse= $bdd->query('SELECT id,titre,SUBSTR(textchap, 1, 100)as textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres  ');//Selection of the first 100 characters 
	return $reponse;

}
