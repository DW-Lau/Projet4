<?php
	try{
		$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
	}
	catch (Exception $e){
		die('Erreur: ' . $e->getmsg());
	}

$lastname = htmlspecialchars($_POST['lastname']);
$firstname= htmlspecialchars($_POST['firstname']);
$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
$mdp=$_POST['mdp'];//MOT DE PASSE
$mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
$mail = $_POST['mail'];//ADRESSE MAIL
//
if ($mdp==$mdp1) {


}else{
	echo "les 2 mots de passe ne sont pas correspondant.";
}

/*MAIL*/
if ( preg_match ("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) ) {

}else{
	echo "Votre mail ne correspond pas à la norme...";
}

//This condition will check if  all inuput are well filled.
if ( isset($lastname)&& isset($firstname)&&isset($pseudo)&&($mdp==true)&&($mail== true) ) {
	$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
var_dump($pseudo);
var_dump($firstname);
var_dump($lastname);
var_dump($mail);
var_dump($pass_hache);

	$req = $bdd->prepare('INSERT INTO membres(lastname,firstname,pseudo,mail,mdp) VALUES(:lastname,:firstname,:pseudo,:mail,:mdp )');
	$req->execute(array(
			'lastname'=>$lastname,
			'firstname'=>$firstname,
			'pseudo'=>$pseudo,
			'mail'=>$mail,
			'mdp'=>$pass_hache));
}else {
	echo 'Une erreur est survenu.'
}

	// 	// if ($_POST['pseudo']&& $^_POST['mdp1'] sont dans la bdd) {
	// 			//alors on vérifie que les 2 correspondent entres eux.
	// 			//SINON, on renvoie vers la page login avec un message d'erreur.
	
	// 		if (preg_match("#^[a-zA-Z0-9]?#", $_POST['pseudo']) ){
	// 			if (isset($_POST['mail'])) {
	// 				if (preg_match("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
	// 					if ($_POST['mdp']==$_POST['mdp1']) {
	// 						if((preg_match("#^[a-zA-Z0-9]?#", $_POST['mdp']))){
										
	// 							$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

	// 							

	// 							$req->execute(array(
	// 								'lastname'=>$_POST['lastname'],
	// 								'firstname'=>$_POST['firstname'],
	// 								'pseudo'=> $_POST['pseudo'],
	// 								'mail'=>$_POST['mail'],
	// 								'mdp'=>$pass_hache
	// 							));
	// 							// var_dump($_POST['pseudo']);
	// 							// var_dump($_POST['firstname']);
	// 							// var_dump($_POST['lastname']);
	// 							// var_dump($_POST['mail']);
	// 							$reponse= $bdd->query('SELECT lastname,firstname,pseudo,mail,signature,date_entree FROM membres');
	//  								var_dump($reponse['pseudo']);
	//  								echo htmlspecialchars($reponse['pseudo'])."!";
	// 	}
		//End of first and last name condition.

	

	// 						//---------------VERIFICATION DES INFORMATIONS------------//


