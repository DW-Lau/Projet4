<?php
function oneChap(){
		try{
			$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
		}
		catch (Exception $e){
			die('Erreur: ' . $e->getmsg());
		}


	$idPage=$_GET['id']; //Creation of a variable  to get id of the page.
	$reponse=$bdd->prepare('SELECT id,titre,textchap FROM chapitres WHERE id=:id ');
	$reponse->execute(array(
		'id'=>$idPage,
		 ));
	$donnees = $reponse->fetch();
}

