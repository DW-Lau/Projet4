<?php
//$idPage=$_GET['id'];

//$reponse=listChap();
//$_GET['id']=listChap($list['id']);
function oneChap(){
		try{
			$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
		}
		catch (Exception $e){
			die('Erreur: ' . $e->getmsg());
		}

	$reponse=$bdd->prepare('SELECT id,titre,textchap FROM chapitres WHERE id=:idPage ');
	 $reponse->execute(array(
		'idPage'=>$_GET['id']
	 	 ));
	return $reponse;
	
}

function getComments(){
		try{
			$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
		}
		catch (Exception $e){
			die('Erreur: ' . $e->getmsg());
		}
	$idPage=$_GET['id'];
	$comments=$bdd->prepare('SELECT id_chap,membre,contenu,date_format(date_poste,"%d.%m.%y")as date_poste_fr FROM commentaires WHERE id_chap=:id_chap ');
	$comments->execute(array(
					'id_chap'=>$idPage
				));
	return $comments;
}
