<?php
	try{
		$bdd=new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root','');
	}
	catch (Exception $e){
		die('Erreur: ' . $e->getmsg());
	}

//---------------VERIFICATION DES INFORMATIONS------------//

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
// var_dump($pseudo);
// var_dump($firstname);
// var_dump($lastname);
// var_dump($mail);
// var_dump($pass_hache);

	$req = $bdd->prepare('INSERT INTO membres(lastname,firstname,pseudo,mail,mdp) VALUES(:lastname,:firstname,:pseudo,:mail,:mdp )');
	$req->execute(array(
			'lastname'=>$lastname,
			'firstname'=>$firstname,
			'pseudo'=>$pseudo,
			'mail'=>$mail,
			'mdp'=>$pass_hache));

	$reponse= $bdd->prepare('SELECT id,pseudo FROM membres WHERE pseudo=:pseudo');
	$reponse-> execute(array(
		'pseudo'=>$pseudo));

	 $informationsMembre=$reponse->fetch();
}else {
	echo 'Une erreur est survenu.';
}
