<?php
function chaptersCall(){
	$bdd=dbConnect();
	$chapters= $bdd->query('SELECT id,titre,textchap,date_format(date_edition,"%d.%m.%y")as date_fr FROM chapitres ORDER BY date_edition  DESC LIMIT 0,2');	
	return $chapters;
}
function billsCall(){
		$bdd=dbConnect();
	$rep= $bdd->query('SELECT id_billets,billetitre,commbillet,date_ecrit FROM billets ORDER BY date_ecrit  DESC LIMIT 0,2');
	return $rep;
}
