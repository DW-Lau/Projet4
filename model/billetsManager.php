<?php
/**
* 
*/
require_once("manager.php");
class billsCaller extends Manager
{
	
	public function billsCall(){
		$bdd=$this->dbConnect();
		$rep= $bdd->query('SELECT id_billets,billetitre,commbillet,date_ecrit FROM billets ORDER BY date_ecrit  DESC LIMIT 0,2');
		return $rep;
	}
	public function footerBill(){
		$bdd=$this->dbConnect();
		$billet= $bdd->query('SELECT id_billets, billetitre, commbillet, date_format(date_ecrit,"%d.%m.%Y - %H.%i")as date_ecrit_fr FROM billets ORDER BY date_ecrit  DESC LIMIT 0 , 1');
		return $billet;
	}
		public function getBills(){
		$bdd=$this->dbConnect();
		$rep= $bdd->query('SELECT id_billets,billetitre,commbillet,date_ecrit FROM billets ORDER BY date_ecrit DESC');
		return $rep;
	}
	// public function addBills(){
	// 	$bdd=$this->dbConnect();
	// 	$newBills=$bdd->query('INSERT INTO billets ()');
	// }
	// public function getAllBills(){
	// 	$bdd=$this->dbConnect();
	// 	$rep= $bdd->query('SELECT id_billets,billetitre,commbillet,date_ecrit FROM billets ORDER BY date_ecrit DESC');
	// return $rep;
	// }
}
