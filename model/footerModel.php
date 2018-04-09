<?php
function footerBill(){
	$bdd=dbConnect();
	$billet= $bdd->query('SELECT id_billets, billetitre, commbillet, date_format(date_ecrit,"%d.%m.%Y - %H.%i")as date_ecrit_fr FROM billets ORDER BY date_ecrit  DESC LIMIT 0 , 1');
	return $billet;
}