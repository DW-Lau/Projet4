<?php

function getBills(){
		$bdd=dbConnect();
	$rep= $bdd->query('SELECT id_billets,billetitre,commbillet,date_ecrit FROM billets ORDER BY date_ecrit DESC');
	return $rep;
}
